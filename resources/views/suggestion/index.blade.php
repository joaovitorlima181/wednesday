@extends('layout')

@section('cabecalho')
Sugestões

@endsection

@section('conteudo')
<div><a href="/suggestion/create" class="btn btn-dark mb-2">Adicionar</a></div>


<div class="container mb-3" style="background: #e9ecef">
    <h2 class="my-3">Ajustes</h2>

    <div class="list-group">
        @foreach ($adjustments as $adjustment)

        <a class="list-group-item list-group-item-action flex-column align-items-start mb-2">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{$adjustment->title_sug}}</h5>
                <small>
                    <span class="d-flex">
                        {{-- <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{$adjustment->id}})">
                            <i class="fas fa-edit"></i>
                        </button> --}}
                        <form method="post" action="/suggestion/delete/{{ $adjustment->id }}"
                            onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($adjustment->title_sug) }}?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </span>
                </small>
            </div>
            <p class="mb-1">{{$adjustment->description_sug}}</p>

            <small>{{$adjustment->name}}</small>

            {{-- <div class="input-group w-50" hidden id="input-adjustment-title-{{ $adjustment->id }}">
                <input type="text" class="form-control" value="{{ $adjustment->title_sug }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" onclick="editSuggest({{ $adjustment->id }})">
                        <i class="fas fa-check"></i>
                    </button>
                    @csrf
                </div>
            </div> --}}

        </a>
        @endforeach
    </div>
</div>

<div class="container mb-3" style="background: #e9ecef">
    <h2 class="my-3">Melhoria</h2>

    <div class="list-group">
        @foreach ($improvements as $improvement)

        <a class="list-group-item list-group-item-action flex-column align-items-start mb-2">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{$improvement->title_sug}}</h5>
                <small>
                    <span class="d-flex">
                        {{-- <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{$improvement->id}})">
                            <i class="fas fa-edit"></i>
                        </button> --}}
                        <form method="post" action="/suggestion/delete/{{ $improvement->id }}"
                            onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($improvement->title_sug) }}?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </span>
                </small>
            </div>
            <p class="mb-1">{{$improvement->description_sug}}</p>

            <small>{{$improvement->name}}</small>

            {{-- <div class="input-group w-50" hidden id="input-improvement-title-{{ $improvement->id }}">
                <input type="text" class="form-control" value="{{ $improvement->title_sug }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" onclick="editSuggest({{ $improvement->id }})">
                        <i class="fas fa-check"></i>
                    </button>
                    @csrf
                </div>
            </div> --}}

        </a>
        @endforeach
    </div>
</div>

{{-- <script>
    function toggleInput(suggestionId){
        const suggestionTitleElement = document.getElementById(`suggestionTitle-${suggestionId}`);
        const suggestionInputTitleElement =  document.getElementById(`input-suggestion-title-${suggestionId}`);

        const suggestionValueElement = document.getElementById(`suggestionValue-${suggestionId}`);
        const suggestionInputValueElement =  document.getElementById(`input-suggestion-value-${suggestionId}`);

        if(suggestionTitleElement.hasAttribute('hidden')){
            suggestionTitleElement.removeAttribute('hidden');
            suggestionInputTitleElement.hidden = true;
        }else{
            suggestionInputTitleElement.removeAttribute('hidden');
            suggestionTitleElement.hidden = true;
        }

        if(suggestionDateElement.hasAttribute('hidden')){
            suggestionDateElement.removeAttribute('hidden');
            suggestionInputDateElement.hidden = true;
        }else{
            suggestionInputDateElement.removeAttribute('hidden');
            suggestionDateElement.hidden = true;
        }

        if(suggestionValueElement.hasAttribute('hidden')){
            suggestionValueElement.removeAttribute('hidden');
            suggestionInputValueElement.hidden = true;
        }else{
            suggestionInputValueElement.removeAttribute('hidden');
            suggestionValueElement.hidden = true;
        }
    }

    function editsuggestion(suggestionId){
        let formData = new FormData();

        const suggestionTitle = document.querySelector(`#input-suggestion-title-${suggestionId} > input`).value;
        formData.append('title', suggestionTitle);

        const suggestionDate = document.querySelector(`#input-suggestion-date-${suggestionId} > input`).value;
        formData.append('date', suggestionDate);

        const suggestionValue = document.querySelector(`#input-suggestion-value-${suggestionId} > input`).value;
        formData.append('value', suggestionValue);

        const url = `/suggestions/edit/${suggestionId}`; 
        fetch(url, {
            body: formData,
            method: 'POST'
        }).then(()=>{
            toggleInput(suggestionId);
            document.getElementById(`suggestionTitle-${suggestionId}`).textContent = suggestionTitle;
            document.getElementById(`suggestionDate-${suggestionId}`).textContent = suggestionDate;
            document.getElementById(`suggestionValue-${suggestionId}`).textContent = suggestionValue;
        });

    }
</script> --}}
@endsection