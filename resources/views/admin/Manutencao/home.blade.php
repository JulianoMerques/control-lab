@extends('layouts.Default.app')
@section('content')
    <div class="container">
        @if(Session::has('message'))
            {{ \App\Core\Helpers\AppHelper::showAlert(Session::get('message')) }}
        @endif

            <div class="col s12 m12 l12">
                <div class="container center-align">
                    <h4>Lista de Manutenções</h4>
                </div>
            </div>
    </div>

    <div class="container">
        <div class="col s12 m6 l12">
            <table class="centered highlight responsive-table">
                <thead>
                <tr>
                    <th data-field="protocolo">Protocolo</th>
                    <th data-field="usuario">Usuário</th>
                    <th data-field="solucao">Solução</th>
                    <th data-field="turno">Turno</th>

                    <th data-field="acoes" width="10%">Ações</th>
                </tr>
                </thead>

                <tbody>
                @foreach($manutencoes as $manutencao)
                    <tr>
                        <td>{{$manutencao->id}}</td>
                        <td>{{$manutencao->usuario['nome']}}</td>
                        <td>{{$manutencao->solucao}}</td>
                        <td>{{$manutencao->turno['turno']}}</td>
                        <td>
                            <a href="{{ route('manutencao.show', $manutencao->id)}}" class="tooltipped " data-position="bottom" data-delay="50" data-tooltip="Mostrar Manutencao">
                                <i class="material-icons  lighten-1">info</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection