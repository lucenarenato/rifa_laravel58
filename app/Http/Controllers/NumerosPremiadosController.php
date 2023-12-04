<?php

namespace App\Http\Controllers;

use App\AutoMessage;
use App\Helpers\Helper;
use App\Participant;
use App\Product;
use App\CreateProductimage;
use App\Customer;
use App\Environment;
use App\GanhosAfiliado;
use App\Models\Order;
use App\Models\Participante;
use App\Models\Premio;
use App\Models\Product as ModelsProduct;
use App\Models\Raffle;
use App\Models\NumerosPremiados;
use App\RifaAfiliado;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use QRcode;

class NumerosPremiadosController extends Controller
{
    public function viewBuscarNumero($productId){
        $produto = Product::where("id", "=", $productId)->first();
        return view('buscar-numero', ["productId" => $productId]);
    }

    public function verificarNumero(Request $request, $productId){
    $resultadoBuscaNumero = Product::where("id", "=", $productId)->first();
        
        $listaNumeros = $resultadoBuscaNumero->numbers();

        if (in_array($request->search, $listaNumeros)) {
            return Redirect::back()->with("success", "Cota " . $request->search . " disponível");

        }else{

            $participante = Participante::whereRaw('JSON_CONTAINS(numbers, ?)', ['"'. $request->search . '"'])->first();

            if ($participante->name == "bloqueador") {
                return Redirect::back()->withErrors("Cota bloqueada");

            }else{
                return Redirect::back()->withErrors("Cota já vendida para: " . $participante->name . " " . $participante->telephone);

            }
        }
    }

    public function numerosPremiados($productId)
    {
        $listaNumerosPremiados = NumerosPremiados::where('product_id', '=', $productId)->get();
        
        $rifa = Product::where('id', '=', $productId)->first();

        return view('numeros-premiados', [
            'listaNumerosPremiados' => $listaNumerosPremiados,
            'productId' => $productId,
            "nomeRifa" => $rifa->name
        ]);
    }

    public function bloquearNumerosPremiados(Request $request)
    {
        $request->validate([
            'numeros' => 'required|string'
        ]);

        DB::beginTransaction();
        try {

            // indetificador de bloqueio
            $customer = Customer::where("nome", "=", "bloqueador")->first();
            $prod = ModelsProduct::find($request->productID);

            $statusProduct = DB::table('products')
                ->select('status')
                ->where('products.id', '=', $request->productID)
                ->first();

            if ($statusProduct->status == "Ativo") {

                $disponiveis = $prod->numbers();

                // shuffle($disponiveis);

                $selecionados = explode(",", $request->numeros);

                if (count($disponiveis) < count(explode(",", $request->numeros))) {
                    return Redirect::back()->withErrors('Quantidade indisponível para a rifa selecionada. A quantidade disponível é: ' . count($disponiveis));
                }
                
                foreach ($selecionados as $key => $resultNumber) {
                    if (!in_array($resultNumber, $disponiveis)) {
                        return Redirect::back()->withErrors('Número não pode ser bloquado pois não está disponivel: ' . $resultNumber);
                    }
                };

                $resutlNumbers = $selecionados;
                // Remove os números selecionados da lista de disponíveis
                $disponiveisSemSelecionados = array_diff($disponiveis, $selecionados);

                // salvar disponiveis restantes
                $prod->saveNumbers($disponiveisSemSelecionados);

                foreach ($selecionados as $key => $selecionado) {
                    // salvar premiados
                    $novoNumeroPremiado = new NumerosPremiados;
                    $novoNumeroPremiado->numero = $selecionado;
                    $novoNumeroPremiado->product_id = $request->productID;
                    $novoNumeroPremiado->bloqueado = true;
                    $novoNumeroPremiado->save();
                }    
                    
                $product = DB::table('products')
                    ->select('products.*', 'products_images.name as image')
                    ->join('products_images', 'products.id', 'products_images.product_id')
                    ->where('products.id', '=', $request->productID)
                    ->first();

                // Validando minimo e maximo de compra da rifa
                if (count($resutlNumbers) < $product->minimo) {
                    return Redirect::back()->withErrors('Você precisa comprar no mínimo ' . $product->minimo . ' números');
                }
                if (count($resutlNumbers) > $product->maximo) {
                    return Redirect::back()->withErrors('Você só pode comprar no máximo ' . $product->maximo . ' números');
                }

                // Verifica se algum numero escolhido ja possui reserva (WDM New)
                $verifyReserved = DB::table('raffles')
                    ->select('*')
                    ->where('raffles.product_id', '=', $request->productID)
                    ->whereIn('raffles.number', $resutlNumbers)
                    ->where('raffles.status', '<>', 'Disponível')
                    ->get();

                if ($verifyReserved->count() > 0) {
                    return Redirect::back()->withErrors('Acabaram de reservar um ou mais números escolhidos, por favor escolha outros números :)');
                } else {
                    
                    $participante = DB::table('participant')->insertGetId([
                        'customer_id' => $customer->id,
                        'name' => $customer->nome,
                        'telephone' => $customer->telephone,
                        'email' => '',
                        'cpf' => '',
                        'valor' => 0,
                        'pagos' => count($resutlNumbers),
                        'product_id' => $request->productID,
                        'numbers' => isset($selecionados) ? json_encode($selecionados) : json_encode($resutlNumbers),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                }

                DB::commit();
                 return redirect()->back()->with(['success' => 'Números bloqueados com sucesso!']);

            } elseif ($statusProduct->status == "Agendado") {
                return Redirect::back()->withErrors('Sorteio agendado não é mais possível reservar!');
            } else {
                return Redirect::back()->withErrors('Sorteio finalizado não é mais possível reservar!');
            }
        
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
        }
    }

    public function liberarNumerosPremiados(Request $request, $numeroPremiadoId) {
        $numeroPremiado = NumerosPremiados::find($numeroPremiadoId);

        if ($numeroPremiado) {
            // Salva o número excluído para referência futura
            $numeroExcluido = $numeroPremiado->numero;

            $numeroPremiado->bloqueado = false;

            // Deleta o número premiado
            $numeroPremiado->save();

            // Encontra participantes que possuem o número excluído na lista 'numberscolumn'
            $participante = Participante::whereJsonContains('numbers', $numeroExcluido)
                ->where('name', 'bloqueador')
                ->first();
           
            // Verifica se um participante foi encontrado
            if ($participante) {

                // Realiza ações com os participantes encontrados
                $listaNumeros = $participante->numbers();

                $numeroExcluidoArray = [$numeroExcluido];

                // Realiza ações com os participantes encontrados
                $novaLista = array_diff($listaNumeros, $numeroExcluidoArray);

                $stringFinal = '[';

                if(!empty($novaLista)){
                    foreach ($novaLista as $key => $numero) {
                        $stringFinal .= '"' . $numero . '"' . ',';
                    }
                    $stringFinal .= ']';

                    $participante->numbers = str_replace(',]', ']',$stringFinal) ?? "[]";
                    $participante->save();
                }else{
                    $participante->delete();
                    
                }
                
                $produto = Product::where("id", "=", $numeroPremiado->product_id)->first();
                $produto->numbers();
                $novaListaNumerosProduto = $produto->numbers();
                $novaListaNumerosProduto[] = $numeroExcluido;
                sort($novaListaNumerosProduto);
                
                $produto->saveNumbers($novaListaNumerosProduto);

                return Redirect::back()->with('numero premiado excluido com sucesso.');
            } else {
                // Lida com o caso em que nenhum participante é encontrado
                // Isso pode incluir um redirecionamento ou outras ações conforme necessário
                return Redirect::back()->withErrors('Nenhum participante encontrado com os critérios especificados.');
            }
        }
    }

    public function excluirNumeroPremiado($numeroPremiadoId) {

        
        $numeroPremiado = NumerosPremiados::find($numeroPremiadoId);

        if ($numeroPremiado) {
            // Salva o número excluído para referência futura
            $numeroExcluido = $numeroPremiado->numero;

            // Deleta o número premiado
            $numeroPremiado->delete();

            // Encontra participantes que possuem o número excluído na lista 'numberscolumn'
            $participante = Participante::whereJsonContains('numbers', $numeroExcluido)
                ->where('name', 'bloqueador')
                ->first();

           
            // Verifica se um participante foi encontrado
            if ($participante) {

                // Realiza ações com os participantes encontrados
                $listaNumeros = $participante->numbers();

                $numeroExcluidoArray = [$numeroExcluido];

                // Realiza ações com os participantes encontrados
                $novaLista = array_diff($listaNumeros, $numeroExcluidoArray);

                $stringFinal = '[';

                if(!empty($novaLista)){
                    foreach ($novaLista as $key => $numero) {
                        $stringFinal .= '"' . $numero . '"' . ',';
                    }
                    $stringFinal .= ']';

                    $participante->numbers = str_replace(',]', ']',$stringFinal) ?? "[]";
                    $participante->save();
                }else{
                    $participante->delete();

                }
                
                $produto = Product::where("id", "=", $numeroPremiado->product_id)->first();
                $produto->numbers();
                $novaListaNumerosProduto = $produto->numbers();
                $novaListaNumerosProduto[] = $numeroExcluido;
                sort($novaListaNumerosProduto);
                
                $produto->saveNumbers($novaListaNumerosProduto);
                return Redirect::back()->with('numero premiado excluido com sucesso.');
            } else {
                // Lida com o caso em que nenhum participante é encontrado
                // Isso pode incluir um redirecionamento ou outras ações conforme necessário
                return Redirect::back()->with('numero premiado excluido com sucesso.');
            }
        }
    }
}
