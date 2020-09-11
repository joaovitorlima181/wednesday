@extends('layout')

@section('cabecalho')
    Criar Cobrança
@endsection

@section('conteudo')

<form method="post">
    @csrf
    <div class="row">
        <div class="col col-7">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" name="debtName" id="debtName">
        </div>

        <div class="col col-3">
            <label for="debtDate">Data:</label>
            <input type="date" class="form-control" name="debtDate" id="debtDate">
        </div>

        <div class="col col-2">
            <label for="debtValue">Valor:</label>
            <input type="number" class="form-control" step="0.01" min="0.01" name="debtValue" id="debtValue">
        </div>
    </div>

    {{-- <div class="mt-2">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="debtUsers[]" value="Tobias">
            <label class="form-check-label">Tobias</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="debtUsers[]" value="Lucas">
            <label class="form-check-label">Lucas</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="debtUsers[]" value="KLB">
            <label class="form-check-label">KLB</label>
          </div>
    </div> --}}

      <div> <button class="btn btn-primary mt-2">Adicionar</button></div>
   
</form>
@endsection