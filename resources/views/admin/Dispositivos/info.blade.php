@extends('layouts.Default.app')
@section('content')
    <div class="container black-text ">
        <div class="row">
            <div class="container center-align">
                <div class="col s12 m12 l12">
                    <h5>Informação do Dispositivo:  {{$maquina->nome}} </h5>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l12 ">
            <div class="row teal lighten-2">
                <label class="black-text">Nome:</label> {{$maquina->nome}}
            </div>
            <div class="row">
                <label class="black-text">Mac: </label>{{$maquina->mac}}
            </div>
            <div class="row teal lighten-2">
                <label class="black-text">Laboratório: </label>{{$maquina->laboratorios_id}}
            </div>
            <div class="row">
                <label class="black-text">Patrimonio: </label>{{$maquina->patrimonio}}
            </div>
            <div class="row teal lighten-2">
                <label class="black-text">Configuração:</label>  {{$maquina->configuracao}}
            </div>
            <div class="row">
                <label class="black-text">Adicionada em:</label>  {{$maquina->created_at}}
            </div>
            <div class="row teal lighten-2">
                <label class="black-text">Ultima Atualização:</label> {{$maquina->updated_at}}
            </div>
        </div>



        {{--<div class="col s12 m12 l12 ">--}}
            {{--<table class="table table-striped center-align">--}}
                {{--<tr>--}}
                    {{--<th>Nome</th><td>{{$maquina->nome}}</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<th>Mac</th>    <td>{{$maquina->mac}}</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<th>Laboratório</th> <td>{{$maquina->laboratorios_id}}</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<th>Patrimonio</th> <td>{{$maquina->patrimonio}}</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<th>Configuração</th> <td>{{$maquina->configuracao}}</td>--}}
                {{--</tr>--}}

            {{--</table>--}}
        {{--</div>--}}

    </div>
@endsection