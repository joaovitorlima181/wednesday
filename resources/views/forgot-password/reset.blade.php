@extends('layout')

@section('cabecalho')
    Reset Password
@endsection

@section('conteudo')

    @include('errors', ['errors' => $errors])

<form action="/reset-password/{token}" method="post" oninput='confirmPassword.setCustomValidity(confirmPassword.value != newPassword.value ? "Senhas não conferem" : "")'>
        @csrf
        <div class="form-group">
            <label for="email">E-mail</label>
        <input type="email" name="email" id="email" required class="form-control">
        </div>

        <div class="form-group">
            <label for="newPassword">Senha</label>
            <input type="password" name="newPassword" id="newPassword" required min="1" class="form-control">
        </div>

        <div class="form-group">
            <label for="confirmPassword">Confirmar Senha</label>
            <input type="password" name="confirmPassword" id="confirmPassword" required min="1" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">
            Entrar
        </button>
    </form>
@endsection
