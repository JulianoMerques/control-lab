@extends('layouts.Default.app')
@section('content')
    <div class="container" style="height: 305px">
        @if(Session::has('message'))
            {{ \App\Core\Helpers\AppHelper::showMessage(Session::get('message')) }}
        @endif
        {{--Inicio Card Foto do Usuario--}}
        <div class="col s12 m12 l3">
            <div class="card">
                <div class="card-image">
                    @if($usuario->img == null)
                        <img src="{!! asset('app/userPadrao.jpg') !!}" >
                    @else
                        <img src="{{$usuario->img}}">
                    @endif
                    @if(\Illuminate\Support\Facades\Auth::user()->id == $usuario->id)

                        <div class="card-action">
                            <a rel="foto" data-target="alterFoto"  class="modal-trigger tooltipped green-text" data-position="bottom" data-delay="50" data-tooltip="Alterar Foto" data-nome="{{$usuario->nome}}" data-id="{{$usuario->id}}">
                                <i class="material-icons">camera_enhance</i>Alterar Foto</a>
                        </div>
                    @endif
                </div>
                <div class="card-content">
                    <span class="card-title black-text">{{$usuario->nome .' '. $usuario->sobrenome}}</span>
                    <p>{{$usuario->descicao}}</p>
                </div>
            </div>
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
                @if(\Illuminate\Support\Facades\Auth::user()->id == $usuario->id)
                <div class="card-action">
                    <a class="green-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="Atualizar Perfil" href="{{route('usuarios.update', $usuario->id)}}"><i class="material-icons">edit</i> Atualizar informações do perfil</a>
                    <a rel="senha" data-target="alterSenha"  class="modal-trigger tooltipped green-text" data-position="bottom" data-delay="50" data-tooltip="Alterar Senha" data-nome="{{$usuario->nome}}" data-id="{{$usuario->id}}">
                        <i class="material-icons">vpn_key</i>Alterar Senha</a>
                    {{--<a class="green-text" href="{{route('usuarios.update', $usuario->id)}}"><i class="material-icons">vpn_key</i> Alterar Senha</a>--}}
                </div>
                    @endif
            </div>

        </div>
    </div>

@endsection

@section('modal')
    <div id="alterFoto" class="modal">
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
                    <form name="formalterFoto" method="POST" class="form-horizontal" action="{{ route('usuarios.update', 'ID') }}" enctype="multipart/form-data">
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


    <div id="alterSenha" class="modal">
        <div class="container">
            <div class="modal-content">
                <div class="modal-header"></div>
                <div class="modal-body">
                    <form name="formalterFoto" method="POST" class="form-horizontal" action="{{ route('usuarios.update', 'ID') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="col s12 m12 l6">
                            <div class="row">
                                <div class="input-field col s12 m12 l12">
                                    <input name="password" id="password" type="password" value="" class="validate">
                                    <label for="icon_password">Senha</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m12 l12">
                                    <input name="confirmPassword"  id="Confpassword" required type="password" class="validate">
                                    <label for="icon_password">Confirmar Senha</label>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="_method" value="POST">
                        <button id="alterar" type="submit" class=" waves-effect waves-light btn green darken-2" >Alterar</button>
                        <button type="button" class="waves-effect waves-light btn" rel="close">Não</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function(){
//            var pass = document.getElementById('password').value;
//            var confpass = document.getElementById('Confpassword').value;
//
//            if (pass === confpass){
//                $('button[id=alterar]').removeAttr('disabled');
//            }


            $('a[rel=foto]').click( function () {
                //VARIAVEIS
                var dataNome = $(this).data('nome');
                var dataId = $(this).data('id');
                var titleModal = 'Alterar foto de usuário <strong>'+dataNome+'</strong> ?';
                var action = $('#alterFoto form').attr('action');
                action = action.replace('ID', dataId);

                //Definir Title da Modal e Action do Form
                $('.modal-header').html(titleModal);

                $('#alterFoto').find('form').attr('action', action);

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
            $('a[rel=senha]').click( function () {
                //VARIAVEIS
                var dataNome = $(this).data('nome');
                var dataId = $(this).data('id');
                var titleModal = 'Alterar senha de usuário <strong>'+dataNome+'</strong> ?';
                var action = $('#alterSenha form').attr('action');
                action = action.replace('ID', dataId);

                //Definir Title da Modal e Action do Form
                $('.modal-header').html(titleModal);

                $('#alterSenha').find('form').attr('action', action);

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
                $('#alterSenha').closeModal();
                $('#alterFoto').closeModal();
            });


            var message = document.getElementById('message').value;
            Materialize.toast(message, 4000)
        });

    </script>
@endsection
