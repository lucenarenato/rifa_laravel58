@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="title">
            <h3 style="color: #fff"><i style="color: #fff" class="bi bi-clock-history"></i> ENTRAR</h3>
        </div>
        <div class="sub-title" style="color: #fff">Crie seus próprios sorteios!</div>

        <form class="form-signin" method="POST" action="{{ route('login') }}" style="text-align: center;">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label style="color: #fff" for="email" class="col-md-4 control-label">E-Mail</label>

                <div class="col-md-12"
                    style="max-width: 250px;
    display: block;
    margin-right: auto;
    margin-left: auto;">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                        required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" style="color: #fff" class="col-md-4 control-label">Senha</label>

                <div class="col-md-12"
                    style="max-width: 250px;
    display: block;
    margin-right: auto;
    margin-left: auto;">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div style="margin-top: 15px" class="">
                    <button type="submit" class="btn btn-outline-primary">
                        Entrar
                    </button>
                </div>
            </div>

        </form>
    </div>
@endsection
