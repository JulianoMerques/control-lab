@extends('layouts.Default.app')

@section('content')
    <div class="container">
    @if(Session::has('message'))
        {{ \App\Core\Helpers\AppHelper::showMessage(Session::get('message')) }}
    @endif

    <div class="row col s12 m12 l12">
        <div class="container center-align">
            <div class="col col s12 m12 l12">
                <h4>Lista Dispositivos </h4>
            </div>
        </div>

        {{--<div class="right">--}}
            {{--<a href="{{ route('maquinas.add') }}" class="waves-effect waves-light btn green">--}}
                {{--<span><i class="material-icons">library_add</i></span>Adicionar Dispositivo</a>--}}
        {{--</div>--}}
    </div>
    </div>
    <div class="row container">
        <div class="col s12 m6 l12">
            <table class="centered highlight responsive-table">
                <thead>
                <tr>
                    <th data-field="nome">Nome</th>
                    <th data-field="laboratorio">Laboratório</th>
                    <th data-field="patrimonio"> Patrimonio</th>
                    <th data-field="acoes" width="10%">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($maquinas as $maquina)
                    <tr id="tr-{{$maquina->id}}">
                        <td>{{$maquina->nome}}</td>
                        <td>{{$maquina->laboratorios['nome']}}</td>
                        <td>{{$maquina->patrimonio}}</td>
                        <td>
                            <a href="{{ route('maquinas.show', $maquina->id)}}" class="tooltipped " data-position="bottom" data-delay="50" data-tooltip="Informação"><i class="material-icons blue-text">info</i></a>
                            <a href="{{ route('maquinas.edit', $maquina->id)}}" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Editar"><i class="material-icons green-text">edit</i></a>
                            <a id="delete" rel="delete-maquina" data-target="confirm-delete"  class="modal-trigger tooltipped" data-position="bottom" data-delay="50" data-tooltip="Deletar" data-nome="{{$maquina->nome}}" data-id="{{$maquina->id}}"><i class="material-icons red-text">delete</i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="fixed-action-btn">
            <a href="{{route('maquinas.add')}}" class="btn-floating btn-large waves-effect waves-light green tooltipped" data-position="top" data-delay="50" data-tooltip="Cadastrar">
                <i class="material-icons">add</i>
            </a>
        </div>
    </div>
@endsection

@section('modal')
    <div id="confirm-delete" class="modal">
        <div class="container">

            <div class="modal-content">
                <div class="modal-header"></div>
                <div class="modal-body">
                    <p>Se você excluir dispositivo não terá a opção de recuperá-lo.</p>
                </div>
            </div>
            <div class="modal-footer">
                <form name="formArquivoDelete" method="POST" class="form-horizontal" action="{{ route('maquinas.delete', 'ID') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="button" class="btn btn-default" rel="close">Não</button>
                    <input type="submit" value="Sim" class="waves-effect waves-light btn red darken-2">
                </form>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function(){

            var message = document.getElementById('message').value;
            Materialize.toast(message, 4000)

            $('a[rel=delete-maquina]').click( function () {
                //VARIAVEIS
                var dataNome = $(this).data('nome');
                var dataId = $(this).data('id');
                var titleModal = 'Tem certeza de que deseja excluir o dispositivo <strong>'+dataNome+'</strong> ?';
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

