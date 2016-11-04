@extends('layouts.Default.app')

@section('content')
    <div class="container">
    @if(Session::has('message'))
        {{ \App\Core\Helpers\AppHelper::showMessage(Session::get('message')) }}
    @endif

    <div class="row col s12 m12 l12">
        <div class="container center-align">
            <div class="col col s12 m12 l12">
                <h4><i class="material-icons">description</i> Lista Dispositivos </h4>
            </div>
        </div>

        <div class="right">
            <a href="{{ route('maquinas.add') }}" class="waves-effect waves-light btn">
                <span class="btn-label"><i class="material-icons">library_add</i></span>Adicionar Dispositivo</a>
        </div>
    </div>
    </div>
    <div class="row container">
        <div class="col s12 m6 l12">
            <table class="centered striped responsive-table">
                <thead>
                <tr>
                    <th>Nome</th>
                    {{--<th>Mac</th>--}}
                    <th>Laboratório</th>
                    <th>Patrimonio</th>
                    {{--<th>Configuração</th>--}}
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($maquinas as $maquina)
                    <tr id="tr-{{$maquina->id}}">
                        <td>{{$maquina->nome}}</td>
                        {{--<td>{{$maquina->mac}}</td>--}}
                        <td>{{$maquina->laboratorios_id}}</td>
                        <td>{{$maquina->patrimonio}}</td>
                        {{--<td>{{$maquina->configuracao}}</td>--}}
                        <td>
                            <a href="{{ route('maquinas.show', $maquina->id)}}" class="tooltipped waves-effect waves-light btn light-blue lighten-1" data-position="bottom" data-delay="50" data-tooltip="Informação"><i class="material-icons">info</i></a>
                            <a href="{{ route('maquinas.edit', $maquina->id)}}" class="waves-effect waves-light btn teal lighten-1 tooltipped" data-position="bottom" data-delay="50" data-tooltip="Editar"><i class="material-icons">edit</i></a>
                            <button id="delete" rel="delete-maquina" data-target="confirm-delete"  class="modal-trigger waves-effect waves-light btn red darken-2 tooltipped" data-position="bottom" data-delay="50" data-tooltip="Deletar" data-nome="{{$maquina->nome}}" data-id="{{$maquina->id}}"><i class="material-icons">delete</i></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('modal')
    <div id="confirm-delete" class="modal">
        <div class="container">
            <div class="modal-header"></div>
            <hr>
            <div class="modal-content">
                <div class="modal-body">
                    <p>Se você excluir dispositivo não terá a opção de recuperá-lo.</p>
                </div>
            </div>
            <hr>
            <div class="modal-footer">
                <form name="formArquivoDelete" method="POST" class="form-horizontal" action="{{ route('maquinas.delete', 'ID') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="button" class="btn btn-default" rel="close">Não</button>
                    {{--<a href="{{ route('maquinas.delete', 'ID') }}" class="waves-effect waves-light btn red darken-2"><i class="material-icons">warning</i>Sim</a>--}}
                    <input type="submit" value="Sim" class="waves-effect waves-light btn red darken-2">
                </form>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('button[rel=delete-maquina]').click( function () {
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

