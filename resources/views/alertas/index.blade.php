@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Alertas</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Alias</th>
                    <th>Nome da Instância</th>
                    <th>Tipo</th>
                    <th>Prioridade</th>
                    <th>Status</th>
                    <th>Destino</th>
                    <th>Ações</th> <!-- Nova coluna para o botão -->
                </tr>
            </thead>
            <tbody>
                @foreach ($dadosMonitoramento as $monitoramento)
                    @foreach ($dadosApi as $alerta)
                        @if ($monitoramento->nomeInstancia === $alerta['nomeInstancia'] && $alerta['status'] === 3)
                            <tr>
                                <td>{{ $monitoramento->alias }}</td>
                                <td>{{ $monitoramento->nomeInstancia }}</td>
                                <td>{{ $monitoramento->tipo }}</td>
                                <td>{{ $monitoramento->prioridade }}</td>
                                <td>
                                    @if ($alerta['status'] == 1 || $alerta['status'] == 2)
                                        ONLINE
                                    @else
                                        OFFLINE
                                    @endif
                                </td>
                                <td>{{ $monitoramento->g1 }}</td>
                                <td>
                                    <form action="{{ route('enviar.alerta') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="alias" value="{{ $monitoramento->alias }}">
                                        <input type="hidden" name="nome_instancia" value="{{ $monitoramento->nomeInstancia }}">
                                        <input type="hidden" name="g1" value="{{ $monitoramento->g1 }}">
                                        <button type="submit" class="btn btn-primary">Enviar Alerta</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
