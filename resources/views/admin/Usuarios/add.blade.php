@extends('layouts.Default.app')

@section('content')
    <div class="container" style="height: 305px">
        @if(Session::has('message'))
            {{ \App\Core\Helpers\AppHelper::showMessage(Session::get('message')) }}
        @endif
        <div class="col s12 m12 l12 center-align">
            <h5>Cadastrar Usuário</h5>
        </div>

        <div class="row">
            <div class="col s12 m12 l12">
                <form name="usuario_create" method="post" class="form-horizontal" action="{{route('usuarios.add')}}" class="col s12" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-field col s12 m10 l6">
                            <select name="turno_id">
                                <option value="">Escolha uma opção</option>
                                @foreach($turnos as $turno)
                                    <option value="{{$turno->id}}">{{$turno->turno}}</option>
                                @endforeach
                            </select>
                            <label>Selecione Um Turno</label>
                        </div>                        <div class="input-field col s12 m10 l6">
                            <select name="tipo_user_id">
                                <option value="">Escolha uma opção</option>
                                @foreach($tipos as $tipo)
                                    <option value="{{$tipo->id}}">{{$tipo->tipo}}</option>
                                @endforeach
                            </select>
                            <label>Selecione Um Tipo de Usuário</label>
                        </div>

                        <div class="input-field col s12 m12 l6">
                            {{--<i class="material-icons prefix">account_circle</i>--}}
                            <input name="nome" id="icon_nome" type="text" class="validate">
                            <label for="icon_nome">Nome</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            {{--<i class="material-icons prefix">perm_identity</i>--}}
                            <input name="sobrenome" id="icon_sobrenome" type="text" class="validate">
                            <label for="icon_sobrenome">Sobrenome</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            {{--<i class="material-icons prefix">phone</i>--}}
                            <input name="telefone" id="icon_telefone" type="tel" class="validate">
                            <label for="icon_telefone">Telefone</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <input name="funcao" id="funcao" type="text" class="validate">
                            <label for="nome">Função</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            {{--<i class="material-icons prefix">email</i>--}}
                            <input name="email" id="icon_email" type="email" data-error="wrong" data-success="right" class="validate">
                            <label for="icon_email">Email</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            {{--<i class="material-icons prefix">vpn_key</i>--}}
                            <input name="password" id="icon_password" type="password" class="validate">
                            <label for="icon_password">Senha</label>
                        </div>
                        <div class="col s12 m12 l12">
                            <div class="file-field input-field ">
                                <div class="btn green">
                                    <span>Foto</span>
                                    <input  name="img" type="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" name="img" type="text">
                                </div>
                            </div>
                        </div>


                    </div>

                    <hr>
                    <div class="row">
                        <div class="col s12">
                            <button class="btn waves-effect waves-light green pull-right" type="submit" name="Salvar">Salvar
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection