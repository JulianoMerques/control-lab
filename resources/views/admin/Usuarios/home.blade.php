@extends('layouts.Default.app')
@section('content')
    <div class="container">
        @if(Session::has('message'))
            {{ \App\Core\Helpers\AppHelper::showAlert(Session::get('message')) }}
        @endif

        <div class="col s12 m12 l12">
            <div class="container center-align">
                <h4><i class="material-icons">description</i> Lista de Usuários</h4>
            </div>

            <div class="right">
                <a href="{{ route('usuarios.add') }}" class="waves-effect waves-light btn">
                    <span class="btn-label"><i class="material-icons">library_add</i></span>Adicionar Usuário</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col s12 m6 l12">
            <table class="centered striped highlight responsive-table">
                <thead>
                <tr>
                    <th data-field="sala">Nome</th>
                    <th data-field="capacidade">Email</th>
                    <th data-field="capacidade">Telefone</th>
                    <th data-field="acoes">Ações</th>
                </tr>
                </thead>

                <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->nome}}</td>
                        <td>{{$usuario->email}}</td>
                        <td>{{$usuario->telefone}}</td>
                        <td>
                            <a href="{{ route('usuarios.show', $usuario->id)}}" class="tooltipped waves-effect waves-light btn light-blue lighten-1" data-position="bottom" data-delay="50" data-tooltip="Informação"><i class="material-icons">info</i></a>
                            @if(\Illuminate\Support\Facades\Auth::user()->tipo_user_id === 1)
                                <a href="{{ route('usuarios.edit', $usuario->id)}}" class="waves-effect waves-light btn teal lighten-1 tooltipped" data-position="bottom" data-delay="50" data-tooltip="Editar"><i class="material-icons">edit</i></a>
                                <button id="delete" rel="delete-usuario" data-target="confirm-delete"  class="modal-trigger waves-effect waves-light btn red darken-2 tooltipped" data-position="bottom" data-delay="50" data-tooltip="Deletar" data-nome="{{$usuario->nome}}" data-id="{{$usuario->id}}"><i class="material-icons">delete</i></button>
                            @endif
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
            <div class="modal-content">
                <div class="modal-header"></div>
                <div class="modal-body">
                    <p>Se você excluir dispositivo não terá a opção de recuperá-lo.</p>
                </div>
            </div>
            <div class="modal-footer">
                <form name="formArquivoDelete" method="POST" class="form-horizontal" action="{{ route('usuarios.delete', 'ID') }}" enctype="multipart/form-data">
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