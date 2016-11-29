@extends('layouts.Default.app')
@section('content')
    <div class="container" style="height: 305px">
        {{--Inicio Card Foto do Usuario--}}
        <div class="col s12 m12 l3">
            {{--<div class="col s12 m7">--}}
            <div class="card">
                <div class="card-image">
                    @if($usuario->img == null)
                        <img src="{!! asset('app/user.png') !!}" >
                    @else
                        <img src="{{$usuario->img}}">
                    @endif

                    <div class="card-action">
                        <a rel="foto" data-target="confirm-delete"  class="modal-trigger tooltipped green-text" data-position="bottom" data-delay="50" data-tooltip="Alterar Foto" data-nome="{{$usuario->nome}}" data-id="{{$usuario->id}}">Alterar Foto</a>
                    </div>
                </div>
                <div class="card-content">
                    <span class="card-title black-text">{{$usuario->nome .' '. $usuario->sobrenome}}</span>
                    <p>{{$usuario->descicao}}</p>
                </div>
            </div>
            {{--</div>--}}
        </div>
        {{--Fim Card Foto Usuario--}}

        {{--Inicio Card Infotmações do Usuario--}}
        <div class="col s12 m12 l9">
            <div class="card">
                <div class="card-content">
                    <p>Nome Completo: {{$usuario->nome . ' ' . $usuario->sobrenome}}</p> <br>
                    <p>Telefone: {{$usuario->telefone}}</p> <br>
                    <p>Função: {{$usuario->funcao}}</p><br>
                    <p>Email: {{$usuario->email}}</p><br>
                </div>
                <div class="card-action">
                    <a class="green-text" href="{{route('usuarios.update', $usuario->id)}}"><i class="material-icons">edit</i> Atualizar informações do perfil</a>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('modal')
    <div id="confirm-delete" class="modal">
        <div class="container">
            <div class="modal-content">
                <div class="modal-header"></div>
                <div class="modal-body">



                    <div class="col s12 m12 l3">
                        <div class="col s12 m7">
                            <div class="card">
                                <div class="card-image">
                                    <img src="{{$usuario->img}}" width="10%">

                                </div>
                            </div>
                        </div>
                    </div>
                    <form name="formArquivoDelete" method="POST" class="form-horizontal" action="{{ route('usuarios.update', 'ID') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}


                        <div class="col s12 m12 l6">
                            <div class="file-field input-field">
                                <div class="btn green">
                                    <span>Foto</span>
                                    <input name="img" type="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" name="img" value="{{$usuario->img}}" type="text">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="_method" value="POST">
                        <button type="button" class="waves-effect waves-light btn" rel="close">Não</button>
                        <button type="submit" class="waves-effect waves-light btn green darken-2" >Alterar</button>
                        {{--<input type="submit" value="Alterar" class="waves-effect waves-light btn green darken-2">--}}
                    </form>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function(){


            $('a[rel=foto]').click( function () {
                //VARIAVEIS
                var dataNome = $(this).data('nome');
                var dataId = $(this).data('id');
                var titleModal = 'Alterar foto de usuário <strong>'+dataNome+'</strong> ?';
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
            Materialize.toast(message, 4000)
        });

    </script>
@endsection