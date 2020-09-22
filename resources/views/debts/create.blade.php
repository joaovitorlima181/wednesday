@extends('layout')

@section('cabecalho')
    Criar Cobrança
@endsection

@section('conteudo')

<form method="post">
    @csrf
    <div class="row">
        <div class="col col-7">
            <label for="nome">Título:</label>
            <input type="text" class="form-control" name="debtTitle" id="debtTitle" required>
        </div>

        <div class="col col-3">
            <label for="debtDate">Data:</label>
            <input type="date" class="form-control" name="debtDate" id="debtDate" required>
        </div>

        <div class="col col-2">
            <label for="debtValue">Valor:</label>
            <input type="number" class="form-control" step="0.01" min="0.01" name="debtValue" id="debtValue" required>
        </div>
    </div>

    <div class="mt-2">
        @foreach ($users as $user)
            <div class="form-check form-check-inline" required>
                <input class="form-check-input" type="checkbox" name="debtUsers[]" value="{{ $user->id }}">
                <label class="form-check-label"> {{ $user->name }} </label>
            </div>
        @endforeach
    </div>

      <div> <button class="btn btn-primary mt-2">Adicionar</button></div>
   
</form>
@endsection