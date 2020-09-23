@extends('layout')

@section('cabecalho')
    Reset Password
@endsection

@section('conteudo')

    @include('errors', ['errors' => $errors])

    <form method="post">
        @csrf
        <div class="form-group">
            <label for="email">E-mail</label>
        <input type="email" name="email" id="email" required class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" required min="1" class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Confirmar Senha</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required min="1" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">
            Entrar
        </button>
    </form>
@endsection