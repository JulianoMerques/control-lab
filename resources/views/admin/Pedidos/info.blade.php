@extends('layouts.Default.app')
@section('content')

    <div class="container">

        {{--Inicio Card Foto do Usuario--}}
        {{--<div class="col s12 m12 l3">--}}
        {{--<div class="col s12 m7">--}}
        {{--<div class="card">--}}
        {{--<div class="card-image">--}}
        {{--<img src="/public/app/16940.png">--}}
        {{--<i class="material-icons large">settings</i>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--Inicio Card Infotmações do Usuario--}}
        <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                    <p>Protocolo: {{$pedidos->id}} </p> <br>
                    <p>Usuario: {{$pedidos->usuario['nome']}}</p> <br>
                    <p>Sala: {{$pedidos->laboratorios['nome']}}</p><br>
                    <p>Dispositivo: {{$pedidos->maquinas['nome']}}</p><br>
                    <p>Manutenção: {{$pedidos->tipo_manutencao['tipo_manutencao']}}</p><br>
                    <p>Problema: {{$pedidos->problema['problema']}}</p><br>
                    <p>Descricao: {{$pedidos->descricao}}</p><br>
                    <p>Situação:
                        @if($pedidos->situacao === 0)
                            {{--<button class="btn red">Aguardando</button>--}}
                            <i class="material-icons red-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="Aguardando">visibility_off</i>
                        @endif
                        @if($pedidos->situacao === 1)
                            <i class="material-icons yellow-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="Em Análise">visibility</i>
                        @endif
                        @if($pedidos->situacao === 2)
                            <i class="material-icons green-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="Resolvido">done</i>
                        @endif

                    </p><br>
                </div>
                @if($pedidos->situacao === 1)

                    @if(\Illuminate\Support\Facades\Auth::user()->tipo_user_id === 1 || \Illuminate\Support\Facades\Auth::user()->tipo_user_id === 3)
                        <div class="card-action center-align ">
                            <div class="col s12 m12 l12">
                                <a href="{{route('manutencao.add', $pedidos->id)}}">
{{--                                <a href="{{route('manutencao.add')}}">--}}
                                    <i class="material-icons green-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="Resolvido">done</i></a>
                            </div>
                            <br>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>

@endsection