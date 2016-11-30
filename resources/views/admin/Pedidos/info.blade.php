@extends('layouts.Default.app')
@section('content')

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
                <h5>Informação do Pedido:  {{$pedidos->id}} </h5>
            </div>
        </div>
    </div>
        <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                    {{--<p>Protocolo: {{$pedidos->id}} </p> <br>--}}
                    <p>Pedido Feito Por: {{$pedidos->usuario['nome']}}</p> <br>
                    <p>Sala: {{$pedidos->laboratorios['nome']}}</p><br>
                    <p>Dispositivo: {{$pedidos->maquinas['nome']}}</p><br>
                    <p>Manutenção: {{$pedidos->tipo_manutencao['nome']}}</p><br>
                    <p>Problema: {{$pedidos->problema['problema']}}</p><br>
                    <p>Descricao: {{$pedidos->descricao}}</p><br>
                    <p>Situação:
                        @if($pedidos->situacao === 0)

                            <i class="material-icons red-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="Aguardando">visibility_off</i>
                        @endif
                        @if($pedidos->situacao === 1)
                            <i class="material-icons yellow-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="Em Análise">visibility</i>
                        @endif
                        @if($pedidos->situacao === 2)
                            <i class="material-icons green-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="Resolvido">done</i>
                        @endif

                    </p><br>

                    @if($pedidos->situacao === 2)
                    <p>Manutenção realizada em: {{$pedidos->updated_at}}</p><br>
                    @endif
                </div>
                @if($pedidos->situacao === 1)

                    @if(\Illuminate\Support\Facades\Auth::user()->isAdm())
                        <div class="card-action center-align ">
                            <div class="col s12 m12 l12">
                                <a href="{{route('manutencao.add', $pedidos->id)}}">
                                    <i class="material-icons green-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="Resolvido">done</i>
                                </a>
                            </div>
                            <br>
                        </div>
                    @endif
                @endif
            </div>
        </div>


        {{--</div>--}}




        {{--<div class="col s12 m7 l12">--}}
        {{--<div class="card horizontal">--}}
        {{--<div class="card-image center-align">--}}
        {{--<img src="{!! asset('app/logo3.png') !!}">--}}
        {{--</div>--}}
        {{--<div class="card-stacked">--}}
        {{--<div class="card-content">--}}

        {{--<p>Protocolo: {{$pedidos->id}} </p> <br>--}}
        {{--<p>Usuario: {{$pedidos->usuario['nome']}}</p> <br>--}}
        {{--<p>Sala: {{$pedidos->laboratorios['nome']}}</p><br>--}}
        {{--<p>Dispositivo: {{$pedidos->maquinas['nome']}}</p><br>--}}
        {{--<p>Manutenção: {{$pedidos->tipo_manutencao['tipo_manutencao']}}</p><br>--}}
        {{--<p>Problema: {{$pedidos->problema['problema']}}</p><br>--}}
        {{--<p>Descricao: {{$pedidos->descricao}}</p><br>--}}
        {{--<p>Situação:--}}
        {{--@if($pedidos->situacao === 0)--}}
        {{--<i class="material-icons red-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="Aguardando">visibility_off</i>--}}
        {{--@endif--}}
        {{--@if($pedidos->situacao === 1)--}}
        {{--<i class="material-icons yellow-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="Em Análise">visibility</i>--}}
        {{--@endif--}}
        {{--@if($pedidos->situacao === 2)--}}
        {{--<i class="material-icons green-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="Resolvido">done</i>--}}
        {{--@endif--}}

        {{--</p><br>--}}
        {{--@if($pedidos->situacao === 2)--}}
        {{--<p>Manutenção realizada em: {{$pedidos->updated_at}}</p><br>--}}
        {{--@endif--}}

        {{--</div>--}}
        {{--@if($pedidos->situacao === 1)--}}
        {{--@if(\Illuminate\Support\Facades\Auth::user()->isAdmin())--}}
        {{--<div class="card-action center-align ">--}}
        {{--<div class="col s12 m12 l12">--}}
        {{--<a href="{{route('manutencao.add', $pedidos->id)}}">--}}
        {{--<i class="material-icons green-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="Resolvido">done</i></a>--}}
        {{--</div>--}}
        {{--<br>--}}
        {{--</div>--}}
        {{--@endif--}}
        {{--@endif--}}
        {{--</div>--}}
        {{--</div>--}}

    </div>

    </div>

@endsection