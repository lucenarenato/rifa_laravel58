@extends('layouts.admin')
<style>
    .hidden {
        display: none;
    }

    .promo {
        border: solid;
        border-width: thin;
        border-radius: 10px;
        padding: 20px;
    }
</style>
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session()->has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{{ session('success') }}</li>
                    </ul>
                </div>
            @endif

            {{-- START TABELA MEUS SORTEIOS --}}
            <div class="container mt-3" style="max-width:100%;min-height:100%;">
                <div class="table-wrapper ">
                    <div class="table-title">
                        <div class="row mb-3">
                            <div class="col d-flex justify-content-center">
                                <h2>Números Premiados</h2>

                                {{-- form auxiliar para adicionar imagens na rifa --}}
                                <form class="d-none" action="{{ route('addFoto') }}" id="form-foto" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" id="rifa-id" name="idRifa">
                                    <input type="file" id="input-add-foto" accept="image/png,image/jpeg,image/jpg" multiple name="fotos[]">
                                </form>
                            </div>

                            <div class="row-12 mb-3 d-flex align-items-center justify-content-end">
                                <a href="#addEmployeeModal" class="btn btn-success d-flex align-items-center"
                                    data-toggle="modal"
                                    style="font-size:30px;width: 100px;justify-content: center;height: 50px;margin-left: 5px;"><i
                                        class="bi bi-plus-square ">
                                    </i>
                                </a>
                            </div>
                        </div>

                        <table class="table table-striped table-bordered table-responsive-md table-hover align=center"
                            id="table_rifas">
                            <thead>
                                <tr>
                                    <th>numero</th>
                                    <th>nome</th>
                                    <th>bloqueado</th>
                                    {{-- <th>Lista</th> --}}
                                    <th>Acões</th>
                                    <div id="copy-link"></div>
                                </tr>
                            </thead>
                            @foreach ($listaNumerosPremiados as $key => $numeroPremiado)
                                <tbody>
                                    <tr>
                                        <td>{{ $numeroPremiado->numero }}</td>
                                        <td>{{ $nomeRifa }}</td>
                                        <td>
                                            @if ($numeroPremiado->bloqueado == true)
                                                SIM
                                            @else
                                                NÃO
                                            @endif
                                        </td>
                                        <td style="width: 20%">
                                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                Ações
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#debloquearEmployeeModal{{ $numeroPremiado->id }}" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#debloquearEmployeeModal{{ $numeroPremiado->id }}"><i class="bi bi-pencil-square"></i>&nbsp;Desbloquear</a>
                                                <a class="dropdown-item" href="#deleteEmployeeModal{{ $numeroPremiado->id }}" style="cursor: pointer" data-toggle="modal" data-bs-target="#deleteEmployeeModal{{ $numeroPremiado->id }}" data-id="{{ $numeroPremiado->id }}"><i class="bi bi-trash3"></i>&nbsp;Excluir</a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>

                                <!-- debloqueio Modal HTML -->
                                <div id="debloquearEmployeeModal{{ $numeroPremiado->id }}" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('liberarNumerosPremiados', $numeroPremiado->id) }}" method="POST" enctype="multipart/form-data">
                                                @method('POST')
                                                {{ csrf_field() }}
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Desbloquear numero Premiado</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Tem certeza de que deseja Liberar esse numero?</p>
                                                    <p class="text-warning"><small>Essa ação não pode ser desfeita.</small></p>
                                                    <input name="deleteId" type="hidden" product_id="deleteId"
                                                        value="{{ $numeroPremiado->id }}">
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-default" data-dismiss="modal"
                                                        value="Cancelar">
                                                    <input type="submit" class="btn btn-success" value="LIBERAR">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Delete Modal HTML -->
                                <div id="deleteEmployeeModal{{ $numeroPremiado->id }}" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('excluirNumeroPremiado', $numeroPremiado->id) }}" method="POST" enctype="multipart/form-data">
                                                @method('DELETE')
                                                {{ csrf_field() }}
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Deletar numero Premiado</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Tem certeza de que deseja excluir esse registros?</p>
                                                    <p class="text-warning"><small>Essa ação não pode ser desfeita..</small></p>
                                                    <input name="deleteId" type="hidden" product_id="deleteId"
                                                        value="{{ $numeroPremiado->id }}">
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-default" data-dismiss="modal"
                                                        value="Cancelar">
                                                    <input type="submit" class="btn btn-danger" value="Deletar">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

            <div id="addEmployeeModal" class="modal fade">
                <div class="modal-dialog modal-lmd">
                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title">Novo Número</h4>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('bloquearNumerosPremiados') }}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Novos Números Premiados:</label>
                                            <input type="text" class="form-control" id="numeros"
                                                name="numeros" placeholder="Exemplo: 01,02,03,04 ou 01" required>
                                                <input type="int" name="productID" value="{{ $productId }}" style="display: none">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="criar btn btn-success">Criar</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                
            </script>

        @endsection
