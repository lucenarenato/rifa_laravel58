@extends('layouts.app')

<link rel="manifest" href="/manifest.json">
<script type="text/javascript" src="sw.js"></script>
<style>

</style>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    function isIOS() {
        var ua = navigator.userAgent.toLowerCase();

        //Lista de dispositivos que acessar
        var iosArray = ['iphone', 'ipod'];

        var isApple = false;

        if (ua.includes('iphone') || ua.includes('ipod')) {
            isApple = true
        }

        return isApple;
    }

    function duvidas() {
        window.open('https://api.whatsapp.com/send?phone={{ $user->telephone }}', '_blank');
    }

    function verRifa(route) {
        window.location.href = route
    }
</script>

@section('content')
    <div class="container app-main" id="app-main">

        <div class="row justify-content-center">
            <div class="col-md-6 rifas {{ $config->tema }}">
                <div class="app-title {{ $config->tema }}">
                    <h1>⚡ Prêmios</h1>
                    <div class="app-title-desc {{ $config->tema }}">Escolha sua sorte</div>
                </div>

                {{-- Rifa em destaque --}}
                @foreach ($products->where('favoritar', '=', 1) as $product)
                    <a href="{{ route('product', ['slug' => $product->slug]) }}">
                        <div class="card-rifa-destaque {{ $config->tema }}">
                            <div class="img-rifa-destaque">
                                <img src="/products/{{ $product->imagem()->name }}" alt="" srcset="">
                            </div>
                            <div class="title-rifa-destaque {{ $config->tema }}">
                                <h1>{{ $product->name }}</h1>
                                <p>{{ $product->subname }}</p>
                                <div style="width: 100%;">
                                    {!! $product->status() !!}
                                    @if ($product->draw_date)
                                        <br>
                                        <span class="data-sorteio {{ $config->tema }}" style="font-size: 12px;">
                                            Data do sorteio {{ date('d/m/Y', strtotime($product->draw_date)) }}
                                            {{-- {!! $product->dataSorteio() !!} --}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach

                {{-- Outras Rifas --}}
                @foreach ($products->where('favoritar', '=', 0) as $product)
                    <a href="{{ route('product', ['slug' => $product->slug]) }}">
                        <div class="card-rifa {{ $config->tema }}">
                            <div class="img-rifa">
                                <img src="/products/{{ $product->imagem()->name }}" alt="" srcset="">
                            </div>
                            <div class="title-rifa title-rifa-destaque {{ $config->tema }}">


                                <h1>{{ $product->name }}</h1>
                                <p>{{ $product->subname }}</p>

                                <div style="width: 100%;">
                                    {!! $product->status() !!}
                                    @if ($product->draw_date)
                                        <br>
                                        <span class="data-sorteio {{ $config->tema }}" style="font-size: 12px;">
                                            Data do sorteio {{ date('d/m/Y', strtotime($product->draw_date)) }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach

                {{-- Fale Conosco --}}
                <div onclick="duvidas()" class="container d-flex duvida" style="">
                    <div class="row">
                        <div class="d-flex icone-duvidas">🤷</div>
                        <div class="col text-duvidas {{ $config->tema }}">
                            <h6 class="mb-0 font-md f-15">Dúvidas?</h6>
                            <p class="mb-0  font-sm f-12 text-muted">Fale conosco</p>
                        </div>
                    </div>
                </div>

                {{-- Ganhadores --}}
                @if ($ganhadores->count() > 0)
                    <div class="app-title {{ $config->tema }}">
                        <h1>🎉 Ganhadores</h1>
                        <div class="app-title-desc {{ $config->tema }}">sortudos</div>
                    </div>
                    <div class="ganhadores">

                        {{-- Ganhador manual (editar rifa) --}}
                        @foreach ($winners as $winner)
                            <div class="ganhador {{ $config->tema }}"
                                 onclick="verRifa('{{ route('product', ['slug' => $winner->slug]) }}')">
                                <div class="ganhador-foto">
                                    <img src="images/sem-foto.jpg" class="" alt="{{ $winner->name }}"
                                         style="min-height: 50px;max-height: 20px;border-radius:10px;">
                                </div>
                                <div class="ganhador-desc {{ $config->tema }}">
                                    <h3>{{ $winner->winner }}</h3>
                                    <p>
                                        <strong>Sorteio: </strong>
                                        {{ date('d/m/Y', strtotime($winner->draw_date)) }}
                                    </p>
                                </div>
                                <div class="ganhador-rifa">
                                    <img src="/products/{{ $winner->imagem()->name }}">
                                </div>
                            </div>
                        @endforeach

                        @foreach ($ganhadores as $ganhador)
                            <div class="ganhador {{ $config->tema }}"
                                 onclick="verRifa('{{ route('product', ['slug' => $ganhador->rifa()->slug]) }}')">
                                <div class="ganhador-foto">
                                    @if ($ganhador->foto)
                                        <img src="{{ asset($ganhador->foto) }}" class="" alt=""
                                             style="min-height: 50px;max-height: 20px;border-radius:10px;">
                                    @else
                                        <img src="images/sem-foto.jpg" class="" alt=""
                                             style="min-height: 50px;max-height: 20px;border-radius:10px;">
                                    @endif

                                </div>
                                <div class="ganhador-desc {{ $config->tema }}">
                                    <h3>{{ $ganhador->ganhador }}</h3>
                                    <p>
                                        Ganhou <strong>{{ $ganhador->descricao }}</strong> cota <span
                                                class="badge bg-success p-1"
                                                style="border-radius: 5px;">{{ $ganhador->cota }}</span> <br>
                                        <strong>Sorteio: </strong>
                                        {{ date('d/m/Y', strtotime($ganhador->rifa()->draw_date)) }}
                                    </p>
                                </div>
                                <div class="ganhador-rifa">
                                    <img src="/products/{{ $ganhador->rifa()->imagem()->name }}">
                                </div>
                            </div>
                        @endforeach

                    </div>
                @endif
                {{-- Perguntas ferquentes --}}
                <div class="perguntas-frequentes pb-2">
                    <div class="app-title {{ $config->tema }}">
                        <h1>🤷 Perguntas frequentes</h1>
                    </div>
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                    Acessando suas compras
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    Existem <strong>duas</strong> formas de você conseguir acessar suas compras, a
                                    primeira é logando no site, clicando no carrinho de compras no menu superior e a
                                    segunda é visitando o sorteio e clicando em "Ver meus números".
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                        aria-controls="flush-collapseTwo">
                                    Como envio o comprovante ?
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                 data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    Existem <strong>duas</strong> formas de você conseguir acessar suas compras, a
                                    primeira é logando no site, clicando no carrinho de compras no menu superior e a
                                    segunda é visitando o sorteio e clicando em "Ver meus números".
                                </div>
                            </div>
                        </div>
                    </div>
                    <footer class="footer" style="text-align: center">
                        Desenvolvido por M 7 INTERMEDIACOES DIGITAIS LTDA 51.695.927/0001-24
                    </footer>
                </div>
            </div>
        </div>
        <br><br>
@endsection
