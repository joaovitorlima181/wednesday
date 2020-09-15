@extends('layout')

@section('cabecalho')
Dashboard
@endsection

@section('conteudo')

@auth
<a href="/debts/create" class="btn btn-dark mb-2">Adicionar</a>
@endauth

{{-- <ul class="list-group">
    @foreach ($debts as $debt)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <span id="debtName-{{ $debt->id }}">{{ $debt->name }}</span>
        <div class="input-group w-50" hidden id="input-name-serie-{{ $debt->id }}">
            <input type="text" class="form-control" value="{{ $debt->name }}">
            <div class="input-group-append">
                <button class="btn btn-primary" onclick="editDebt({{ $debt->id }})">
                    <i class="fas fa-check"></i>
                </button>
                @csrf
            </div>
        </div>

        <span class="d-flex">
            @auth
            <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{ $debt->id }})">
                <i class="fas fa-edit"></i>
            </button>
            @endauth
            <a href="/debts/{{ $debt->id }}/temporadas" class="btn btn-info btn-sm mr-1">
                <i class="fas fa-external-link-alt"></i>
            </a>
            @auth
            <form method="post" action="/debts/{{ $debt->id }}"
                  onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($debt->name) }}?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">
                    <i class="far fa-trash-alt"></i>
                </button>
            </form>
            @endauth
        </span>
    </li>
    @endforeach
</ul>

<script>
    function toggleInput(debtId) {
        const nameSerieEl = document.getElementById(`name-debt-${debtId}`);
        const inputdebtEl = document.getElementById(`input-name-debt-${debtId}`);
        if (namedebtEl.hasAttribute('hidden')) {
            namedebtEl.removeAttribute('hidden');
            inputdebtEl.hidden = true;
        } else {
            inputdebtEl.removeAttribute('hidden');
            namedebtEl.hidden = true;
        }
    }

    function editDebt(debtId) {
        let formData = new FormData();
        const name = document
            .querySelector(`#input-name-debt-${debtId} > input`)
            .value;
        const token = document
            .querySelector(`input[name="_token"]`)
            .value;
        formData.append('name', name);
        formData.append('_token', token);
        const url = `/debts/${debtId}/editname`;
        fetch(url, {
            method: 'POST',
            body: formData
        }).then(() => {
            toggleInput(debtId);
            document.getElementById(`name-debt-${debtId}`).textContent = name;
        });
    }
</script> --}}
@endsection