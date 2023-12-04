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
             <div class="container mt-5" style="max-width:100%;min-height:100%;">
                <div class="table-wrapper ">
                    <div class="table-title">
                        <div class="row mb-3">
                            <div class="col d-flex justify-content-center">
                                <h2>Buscar Número</h2>
                            </div>

                            <form action="{{ route('verificarNumero', $productId) }}" method="GET" class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="search" name="search"
                                    placeholder="Pesquisar Ex: 01" aria-label="Search">
                                <button class="btn btn-success my-2 my-sm-0 border border-success text-dark"
                                    type="submit">Buscar Número</button>
                            </form>
                        </div>
                    </div>

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

                </div>
            </div>

            

            <script>
                
            </script>

        @endsection
