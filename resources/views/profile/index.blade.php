@extends('layout')

@section('cabecalho')
        {{$user->name}}
@endsection

@section('conteudo')

<form action="/profile/reset-password/" method="post" oninput='confirmPassword.setCustomValidity(confirmPassword.value != newPassword.value ? "Senhas não conferem" : "")'>
    @csrf
    <div class="form-group">
        <label for="oldPassword">Senha atual:</label>
    <input type="password" name="oldPassword" id="oldPassword" required class="form-control" placeholder="Digite sua senha...">
    </div>

    <div class="form-group">
        <label for="newPassword">Senha:</label>
        <input type="password" name="newPassword" id="newPassword" required min="1" class="form-control" placeholder="Digite sua nova senha...">
    </div>

    <div class="form-group">
        <label for="confirmPassword">Confirmar Senha:</label>
        <input type="password" name="confirmPassword" id="confirmPassword" required min="1" class="form-control" placeholder="Confirme sua nova senha...">
    </div>

    <button type="submit" class="btn btn-primary mt-3">
        Entrar
    </button>
</form>
@endsection