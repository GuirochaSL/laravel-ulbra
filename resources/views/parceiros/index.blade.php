@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Parceiros</h1>
        <a href="{{ route('parceiros.create') }}" class="btn btn-success">Adicionar</a>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Alias</th>
                        <th scope="col">Nome da Instância</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Prioridade</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($monitoramentos as $monitoramento)
                    <tr>
                        <td>{{ $monitoramento->alias }}</td>
                        <td>{{ $monitoramento->nomeInstancia }}</td>
                        <td>{{ $monitoramento->tipo }}</td>
                        <td>{{ $monitoramento->prioridade }}</td>
                        <td>
                            <a href="{{ route('parceiros.edit', $monitoramento->idEntidade) }}"
                                class="btn btn-primary">Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.min.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                monitoramentos: {!! json_encode($monitoramentos) !!}
            }
        });
    </script>
@endpush
