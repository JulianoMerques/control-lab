@extends('layouts.Default.app')
@section('content')
    <div class="container">
        {{--Inicio Card Foto do Usuario--}}
        <div class="col s12 m12 l3">
            {{--<div class="col s12 m7">--}}
                <div class="card">
                    <div class="card-image">
                        <img src="{{$usuario->img}}">
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