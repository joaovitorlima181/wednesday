@extends('layout')

@section('cabecalho')
Dashboard
@endsection

@section('conteudo')



<div class="jumbotron">
    <h2>A receber</h2>
    <ul class="list-group">
        <a href="/debts/create" class="btn btn-dark mb-2">Adicionar</a>
        @foreach ($debtsToReceive as $debtToReceive)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span id="debtTitle-{{ $debtToReceive->id }}">{{ $debtToReceive->title }}</span>
            <span id='debtDate-{{$debtToReceive->id}}'>{{ date('d/m/Y', strtotime($debtToReceive->date)) }}</span>
            <span id="debtValue-{{$debtToReceive->id}}">Total: R${{ $debtToReceive->value }}</span>


            <div class="input-group w-50" hidden id="input-debt-title-{{ $debtToReceive->id }}">
                <input type="text" class="form-control" value="{{ $debtToReceive->title }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" onclick="editDebt({{ $debtToReceive->id }})">
                        <i class="fas fa-check"></i>
                    </button>
                    @csrf
                </div>
            </div>

            <div class="input-group w-50" hidden id="input-debt-date-{{ $debtToReceive->id }}">
                <input type="text" class="form-control" value="{{ $debtToReceive->date }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" onclick="editDebt({{ $debtToReceive->id }})">
                        <i class="fas fa-check"></i>
                    </button>
                    @csrf
                </div>
            </div>

            <div class="input-group w-50" hidden id="input-debt-value-{{ $debtToReceive->id }}">
                <input type="text" class="form-control" value="{{ $debtToReceive->value }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" onclick="editDebt({{ $debtToReceive->id }})">
                        <i class="fas fa-check"></i>
                    </button>
                    @csrf
                </div>
            </div>

            <span class="d-flex">
                <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{$debtToReceive->id}})">
                    <i class="fas fa-edit"></i>
                </button>
                <form method="post" action="/debts/delete/{{ $debtToReceive->id }}"
                    onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($debtToReceive->title) }}?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </form>
            </span>
        </li>
 
        @endforeach
    </ul>
</div>

<div class="jumbotron">
    <h2>A pagar</h2>
    <ul class="list-group">
        @foreach ($debtsToPay as $debtToPay)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span id="debtTitle-{{ $debtToPay->id }}">Para {{$debtToPay->name}}: {{ $debtToPay->title }}</span>
            <span>{{ date('d/m/Y', strtotime($debtToPay->date)) }}</span>
            <span>R${{$debtToPay->value}}</span>
        </li>
        @endforeach
    </ul>
</div>

<script>
    function toggleInput(debtId){
        const debtTitleElement = document.getElementById(`debtTitle-${debtId}`);
        const debtInputTitleElement =  document.getElementById(`input-debt-title-${debtId}`);

        const debtDateElement = document.getElementById(`debtDate-${debtId}`);
        const debtInputDateElement =  document.getElementById(`input-debt-date-${debtId}`);

        const debtValueElement = document.getElementById(`debtValue-${debtId}`);;
        const debtInputValueElement =  document.getElementById(`input-debt-value-${debtId}`);

        if(debtTitleElement.hasAttribute('hidden')){
            debtTitleElement.removeAttribute('hidden');
            debtInputTitleElement.hidden = true;
        }else{
            debtInputTitleElement.removeAttribute('hidden');
            debtTitleElement.hidden = true;
        }

        if(debtDateElement.hasAttribute('hidden')){
            debtDateElement.removeAttribute('hidden');
            debtInputDateElement.hidden = true;
        }else{
            debtInputDateElement.removeAttribute('hidden');
            debtDateElement.hidden = true;
        }

        if(debtValueElement.hasAttribute('hidden')){
            debtValueElement.removeAttribute('hidden');
            debtInputValueElement.hidden = true;
        }else{
            debtInputValueElement.removeAttribute('hidden');
            debtValueElement.hidden = true;
        }
    }

    function editDebt(debtId){
        let formData = new FormData();

        const token = document.querySelector('input[name="_token"]').value;
        formData.append('_token', token);

        const debtTitle = document.querySelector(`#input-debt-title-${debtId} > input`).value;
        formData.append('title', debtTitle);

        const debtDate = document.querySelector(`#input-debt-date-${debtId} > input`).value;
        formData.append('date', debtDate);

        const debtValue = document.querySelector(`#input-debt-value-${debtId} > input`).value;
        formData.append('value', debtValue);

        const url = `/debts/edit/${debtId}`; 
        fetch(url, {
            body: formData,
            method: 'POST'
        }).then(()=>{
            toggleInput(debtId);
            document.getElementById(`debtTitle-${debtId}`).textContent = debtTitle;
            document.getElementById(`debtDate-${debtId}`).textContent = debtDate;
            document.getElementById(`debtValue-${debtId}`).textContent = debtValue;
        });

    }
</script>
@endsection