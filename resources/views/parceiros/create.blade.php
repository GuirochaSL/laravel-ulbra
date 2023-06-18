@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Adicionar Parceiro</h1>

        <!-- Formulário de criação -->

        <form action="{{ route('parceiros.store') }}" method="POST">
            @csrf

            <!-- Campos do formulário -->
            <div class="form-group">
                <label for="idEntidade">ID Entidade</label>
                <input type="text" class="form-control" id="idEntidade" name="idEntidade">
            </div>

            <div class="form-group">
                <label for="alias">Alias</label>
                <input type="text" class="form-control" id="alias" name="alias">
            </div>

            <div class="form-group">
                <label for="nomeInstancia">Nome da Instância</label>
                <input type="text" class="form-control" id="nomeInstancia" name="nomeInstancia">
            </div>

            <div class="form-group">
                <label for="tipo">Tipo</label>
                <input type="text" class="form-control" id="tipo" name="tipo">
            </div>

            <div class="form-group">
                <label for="prioridade">Prioridade</label>
                <input type="text" class="form-control" id="prioridade" name="prioridade">
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection
