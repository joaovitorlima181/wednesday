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
        <span id="debtName-{{ $debtToReceive->id }}">{{ $debtToReceive->title }}</span>
        <span>Total: R${{ $debtToReceive->value }}</span>
            <div class="input-group w-50" hidden id="input-name-serie-{{ $debtToReceive->id }}">
                <input type="text" class="form-control" value="{{ $debtToReceive->title }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" onclick="editDebt({{ $debtToReceive->id }})">
                        <i class="fas fa-check"></i>
                    </button>
                    @csrf
                </div>
            </div>

            <span class="d-flex">
                @auth
                <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{ $debtToReceive->id }})">
                    <i class="fas fa-edit"></i>
                </button>
                @endauth
                <a href="/debts/{{ $debtToReceive->id }}/temporadas" class="btn btn-info btn-sm mr-1">
                    <i class="fas fa-external-link-alt"></i>
                </a>
                @auth
                <form method="post" action="/debts/delete/{{ $debtToReceive->id }}"
                    onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($debtToReceive->title) }}?')">
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
</div>

<div class="jumbotron">
    <h2>A pagar</h2>
    <ul class="list-group">
        @foreach ($debtsToPay as $debtToPay)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span id="debtName-{{ $debtToPay->id }}">Para {{$debtToPay->name}}: {{ $debtToPay->title }}</span>
            <span>R${{$debtToPay->value}}</span>
        </li>
        @endforeach
    </ul>
</div>
@endsection