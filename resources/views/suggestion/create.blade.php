@extends('layout')

@section('cabecalho')
Criar Sugestão
@endsection

@section('conteudo')

<form method="post">
    @csrf
    <div class="form-group">
        <div>
            <input placeholder="Título:" type="text" class="form-control" name="suggestionTitle" id="suggestionTitle"
                maxlength="20" required>
        </div>

        <div class="form-group">
            <textarea class="form-control mt-2" name="description" id="description" rows="3" placeholder="Descrição:"
                maxlength="500"></textarea>
        </div>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="suggestionType" id="adjustment" value="ajuste" required>
        <label class="form-check-label" for="adjustment">Ajuste</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="suggestionType" id="improvement" value="melhoria" required>
        <label class="form-check-label" for="improvement">Melhoria</label>
    </div>

    <div> <button class="btn btn-primary mt-2">Adicionar</button></div>

</form>
@endsection