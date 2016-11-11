@extends('layouts.Default.app')

@section('content')
    <div class="container">
        @if(Session::has('message'))
            {{ \App\Core\Helpers\AppHelper::showMessage(Session::get('message')) }}
        @endif
        <div class="col s12 m12 l12 center-align">
            <h5>Editar Usuário</h5>
        </div>

        <div class="row">
            <div class="col s12 m12 l12">
                <form name="usuario_create" method="post" class="form-horizontal" action="{{route('usuarios.update',$usuario->id)}}" class="col s12" enctype="multipart/form-data">
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
                        </div>

                        <div class="input-field col s12 m12 l6">
                            <input name="nome" id="nome" type="text" value="{{$usuario->nome}}" class="validate">
                            <label for="nome">Nome</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <input name="sobrenome" id="sobrenome" type="text" value="{{$usuario->sobrenome}}" class="validate">
                            <label for="nome">Sobrenome</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <input name="telefone" id="telefone" type="tel" value="{{$usuario->telefone}}" class="validate">
                            <label for="nome">Telefone</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <input name="funcao" id="funcao" type="text" value="{{$usuario->funcao}}" class="validate">
                            <label for="nome">Função</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <input name="email" id="email" type="email" value="{{$usuario->email}}" class="validate">
                            <label for="nome">Email</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <input placeholder="Senha" name="password" id="password" type="password" class="validate">
                            <label for="nome">Senha</label>
                        </div>
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

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col s12">
                            <input type="submit" name="enviar" value="Enviar" class="btn btn-primary pull-right green">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection