@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Monitoramento</h1>

        <form action="{{ route('parceiros.update', $monitoramento->idEntidade) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="alias" class="form-label">Alias</label>
                <input type="text" class="form-control" id="alias" name="alias" value="{{ $monitoramento->alias }}">
            </div>

            <div class="mb-3">
                <label for="nomeInstancia" class="form-label">Nome da Instância</label>
                <input type="text" class="form-control" id="nomeInstancia" name="nomeInstancia" value="{{ $monitoramento->nomeInstancia }}">
            </div>

            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <input type="text" class="form-control" id="tipo" name="tipo" value="{{ $monitoramento->tipo }}">
            </div>

            <div class="mb-3">
                <label for="prioridade" class="form-label">Prioridade</label>
                <input type="text" class="form-control" id="prioridade" name="prioridade" value="{{ $monitoramento->prioridade }}">
            </div>

            <div class="mb-3">
                <label for="prioridade" class="form-label">idEntidade</label>
                <input type="text" class="form-control" id="idEntidade" name="idEntidade" value="{{ $monitoramento->idEntidade }}">
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
@endsection
