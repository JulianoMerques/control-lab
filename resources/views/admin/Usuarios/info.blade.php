@extends('layouts.Default.app')
@section('content')
    <div class="container">
        <div class="col s12 m12 l6">
            <div class="col s12 m7">
                <div class="card">
                    <div class="card-image">
                        <img src="{{$usuario->img}}">

                    </div>
                    <div class="card-content">
                        <span class="card-title black-text">{{$usuario->nome .' '. $usuario->sobrenome}}</span>
                        <p>{{$usuario->descicao}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l6">
            <div class="card-content">
                {{--<p>I am a very simple card. I am good at containing small bits of information.</p>--}}
                <p>Nome: {{$usuario->nome}}</p> <br>
                <p>Sobrenome: {{$usuario->sobrenome}}</p> <br>
                <p>Telefone: {{$usuario->telefone}}</p> <br>
                <p>Função: {{$usuario->funcao}}</p><br>
                <p>Email: {{$usuario->email}}</p><br>
            </div>

        </div>
    </div>

@endsection