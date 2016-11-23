@extends('layouts.Default.app')
@section('content')
    <div class="container">
        @if(Session::has('message'))
            {{ \App\Core\Helpers\AppHelper::showAlert(Session::get('message')) }}
        @endif

        <div class="col s12 m12 l12">
            <div class="container center-align">
                <h4>Lista de Pedidos de Manutenção</h4>
            </div>

            {{--<div class="right">--}}
                {{--<a href="{{ route('usuarios.add') }}" class="waves-effect waves-light btn">--}}
                    {{--<span class="btn-label"><i class="material-icons">library_add</i></span>Adicionar Usuário</a>--}}
            {{--</div>--}}
        </div>
    </div>

    <div class="container">
        <div class="col s12 m6 l12">
            <table class="centered highlight responsive-table">
                <thead>
                <tr>
                    <th data-field="protocolo">Protocolo</th>
                    <th data-field="usuario">Usuário</th>
                    <th data-field="sala">Sala</th>
                    <th data-field="maquina">Maquina</th>
                    <th data-field="problema">Problema</th>
                    <th data-field="situacao" width="5%">Situação</th>
                    <th data-field="acoes" width="10%">Ações</th>
                </tr>
                </thead>

                <tbody>
                @foreach($pedidos as $pedido)
                    <tr>
                        <td>{{$pedido->id}}</td>
                        <td>{{$pedido->usuario['nome']}}</td>
                        <td>{{$pedido->laboratorios['nome']}}</td>
                        <td>{{$pedido->maquinas['nome']}}</td>
                        <td>{{$pedido->problema['problema']}}</td>
                        <td>
                            @if($pedido->situacao === 0)
                                <i class="material-icons red-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="Aguardando">visibility_off</i>
                            @endif
                            @if($pedido->situacao === 1)
                                <i class="material-icons yellow-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="Em Análise">visibility</i>
                            @endif
                            @if($pedido->situacao === 2)
                                <i class="material-icons green-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="Resolvido">done</i>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('pedidos.show', $pedido->id)}}" class="tooltipped " data-position="bottom" data-delay="50" data-tooltip="Mostrar Pedido">
                                <i class="material-icons  lighten-1">info</i>
                            </a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$pedidos->render()}}
{{--            {{ $pagination->links('view.name') }}--}}
        </div>
        <div class="fixed-action-btn">
            <a href="{{route('pedidos.add')}}" class="btn-floating btn-large waves-effect waves-light green tooltipped" data-position="top" data-delay="50" data-tooltip="Cadastrar">
                <i class="material-icons">add</i>
            </a>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function(){

            var message = document.getElementById('message').value;
            Materialize.toast(message, 4000)

            $('button[rel=delete-usuario]').click( function () {
                //VARIAVEIS
                var dataNome = $(this).data('nome');
                var dataId = $(this).data('id');
                var titleModal = 'Tem certeza de que deseja excluir o usuário <strong>'+dataNome+'</strong> ?';
                var action = $('#confirm-delete form').attr('action');
                action = action.replace('ID', dataId);

                //Definir Title da Modal e Action do Form
                $('.modal-header').html(titleModal);

                $('#confirm-delete').find('form').attr('action', action);

                $('.modal-trigger').leanModal({
                            dismissible: true, // Modal can be dismissed by clicking outside of the modal
                            opacity: .5, // Opacity of modal background
                            in_duration: 300, // Transition in duration
                            out_duration: 200, // Transition out duration
                            starting_top: '4%', // Starting top style attribute
                            ending_top: '10%', // Ending top style attribute
                        }
                );

            });

            $('button[rel=close]').on('click',function () {
                $('#confirm-delete').closeModal();
            });
        });

    </script>
@endsection