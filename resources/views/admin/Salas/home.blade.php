@extends('layouts.Default.app')
@section('content')


    {{--<div class="toast #a5d6a7 green lighten-3 text-darken-5" onclick="Materialize.toast('I am a toast!', 3000, 'rounded')"></div>--}}
    <div class="container">
        @if(\Illuminate\Support\Facades\Session::has('message'))
            {{ \App\Core\Helpers\AppHelper::showAlert(Session::get('message')) }}
        @endif
        {{--<input type="hidden" id="message" class="toast #a5d6a7 green lighten-3" value="Teste" name="message">'--}}
        <div class="col s12 m12 l12">
            <div class="container center-align">
                <h4>Lista de Salas</h4>
            </div>
            {{--<div class="right">--}}
            {{--<a href="{{ route('salas.add') }}" class="waves-effect waves-light btn green">--}}
            {{--<span><i class="material-icons">library_add</i></span>  Adicionar Sala</a>--}}
            {{--</div>--}}
        </div>
        <br>
    </div>



    <div class="container" style="height: 305px">
        <div class="col s12 m6 l12">
            <table class="centered highlight responsive-table">
                <thead>
                <tr>
                    <th data-field="sala">Sala</th>
                    <th data-field="capacidade">Capacidade</th>
                    <th data-field="acoes" width="10%">Ações</th>
                </tr>
                </thead>

                <tbody>
                @foreach($salas as $sala)
                    <tr>
                        <td>{{$sala->nome}}</td>
                        <td>{{$sala->capacidade}}</td>
                        <td>
                            <a href="{{ route('salas.show', $sala->id)}}" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Informação"><i class="material-icons blue-text">info</i></a>
                            <a href="{{ route('salas.edit', $sala->id)}}" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Editar"><i class="material-icons green-text">edit</i></a>
                            <a id="delete" rel="delete-sala" data-target="confirm-delete"  class="modal-trigger  tooltipped" data-position="bottom" data-delay="50" data-tooltip="Deletar" data-nome="{{$sala->nome}}" data-id="{{$sala->id}}"><i class="material-icons red-text">delete</i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$salas->render()}}
        </div>
        <div class="fixed-action-btn">
            <a href="{{route('salas.add')}}" class="btn-floating btn-large waves-effect waves-light green tooltipped" data-position="top" data-delay="50" data-tooltip="Cadastrar">
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
                    <p>Se você excluir a sala não terá a opção de recuperá-lo.</p>
                </div>
            </div>
            <div class="modal-footer">
                <form name="formArquivoDelete" method="POST" class="form-horizontal" action="{{ route('salas.delete', 'ID') }}" enctype="multipart/form-data">
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

            $('a[rel=delete-sala]').click( function () {
                //VARIAVEIS
                var dataNome = $(this).data('nome');
                var dataId = $(this).data('id');
                var titleModal = 'Tem certeza de que deseja excluir a sala <strong>'+dataNome+'</strong> ?';
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

            var message = document.getElementById('message').value;
            Materialize.toast(message, 4000);

        });

    </script>
@endsection
