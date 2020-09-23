@extends('layout')

@section('cabecalho')
    Recuperar Senha
@endsection

@section('conteudo')

    @include('errors', ['errors' => $errors])

    <form method="post">
        @csrf
        <div class="form-group">
            <label for="email">E-mail</label>
        <input type="email" name="email" id="email" required class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">
            Recuperar Senha
        </button>
    </form>
@endsection