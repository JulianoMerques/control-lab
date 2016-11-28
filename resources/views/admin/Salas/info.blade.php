@extends('layouts.Default.app')

@section('content')
    {{--<div class="container center">--}}
    {{--<h1>Informações sobre a sala: {{$sala-> nome}}</h1>--}}
    {{--</div>--}}

    <div class="container" style="height: 305px">
        {{--<div class="col s12 m12 l12">--}}

        {{--<div class="card center-align">--}}
        {{--<div class=" card ">--}}
        {{--<img src="{!! asset('app/logo3.png') !!}">--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        <div class="row">
            <div class="container center-align">
                <div class="col s12 m12 l12">
                    <h5>Informação da Sala:  {{$sala->nome}} </h5>
                </div>
            </div>
        </div>

        <div class="col s12 m12 l12">
            <div class="card">
                {{--<div class="col s12 m12 l6">--}}
                {{--<img src="{!! asset('app/logo3.png') !!}">--}}
                {{--</div>--}}
                {{--<div class="col s12 m12 l6">--}}
                <div class="card-content">
                    {{--<p>Sala: {{$sala->nome}} </p> <br>--}}
                    <p>Capacidade: {{$sala->capacidade}}</p> <br>
                    <p>Descrição: {{$sala->descricao}}</p><br>

                </div>
                {{--</div>--}}
            </div>
        </div>
@endsection