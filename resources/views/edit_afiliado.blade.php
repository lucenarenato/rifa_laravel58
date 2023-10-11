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
        <div class="col-md-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session()->has('message'))
                <div class="alert alert-success">
                    <ul>
                        <li>{{ session('message') }}</li>
                    </ul>
                </div>
            @endif

            
            {{-- START TABELA MEUS SORTEIOS --}}
            <div class="container mt-3" style="max-width:100%;min-height:100%;">
                <div class="table-wrapper ">
                    <div class="table-title">
                        <div class="row mb-3">
                            <div class="col d-flex justify-content-center">
                                <h2>Lista <b>Afiliados</b></h2>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card">
                	<div class="card-body">
                		<form action="{{ route('painel.afiliados.update',$user->id) }}" method="post">
                			@csrf
                			<div class="mb-3">
  								<label for="name" class="form-label">Nome</label>
  								<input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
							</div>
							<div class="mb-3">
  								<label for="email" class="form-label">Email</label>
  								<input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
							</div>
							<div class="mb-3">
  								<label for="telefone" class="form-label">telephone</label>
  								<input type="text" class="form-control" id="telephone" name="telefone" value="{{ $user->telephone }}">
							</div>
							<div class="mb-3">
  								<label for="pix" class="form-label">pix</label>
  								<input type="text" class="form-control" id="pix" name="pix" value="{{ $user->pix }}">
							</div>
							<div class="mb-3">
  								<label for="cpf" class="form-label">cpf</label>
  								<input type="text" class="form-control" id="cpf" name="cpf" value="{{ $user->cpf }}">
							</div>
							<div class="mb-3">
  								<label for="password" class="form-label">senha</label>
  								<input type="password" class="form-control" id="password" name="password" autocomplete="off" aria-describedby="passwordHelpBlock">
  								<div id="passwordHelpBlock" class="form-text">
								  a senha tem que ter no minimo 6 caracteres.
								</div>
							</div>
							<div class="mb-3">
  								<button type="submit" class="btn btn-success">Atualizar</button>
							</div>
                		</form>
                	</div>
                </div>	
            </div>
        </div>
    </div>
@endsection