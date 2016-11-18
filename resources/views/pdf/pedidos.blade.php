<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{public_path('css/materialize.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="{{public_path('js/materialize.js')}}"></script>

</head>
<body>
<?php
date_default_timezone_set('America/Sao_Paulo')
?>

<div class="col s12 m12 l12">
    <div class="row center-align">
        <div class="col s12">
            <img src="{{public_path('app/logo3.png')}}" width="25%" alt="Control-Lab V 1.1"><br>
            <label class="black-text"> Sistema de Controle de Manutenções e de Patrimonio</label>
        </div>

    </div>
    <div class="row center-align">
        <label class="black-text" style="font-family: 'Raleway', sans-serif; font-size: medium">Relatório de Pedidos Cadastrados</label>
    </div>
    <table class="centered striped" style="font-family: arial, sans-serif; font-size: small">
        <thead>
        <tr>
            <th data-field="protocolo">Protocolo</th>
            <th data-field="usuario">Usuário</th>
            <th data-field="sala">Sala</th>
            <th data-field="maquina">Maquina</th>
            <th data-field="problema">Problema</th>
            <th data-field="situacao" width="5%">Situação</th>
        </tr>
        </thead>

        <tbody>
        @foreach($pedidos as $pedido)
            <tr>
                <td>{{$pedido->id}}</td>
                <td>{{$pedido->usuario['nome']}}</td>
                <td>{{$pedido->laboratorios['nome']}}</td>
                <td>{{$pedido->maquinas['nome']}}</td>
                <td>{{$pedido->problema['problema']}}</td>
                <td>
                    @if($pedido->situacao === 0)
                        <i class="material-icons red-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="Aguardando">visibility_off</i>
                    @endif
                    @if($pedido->situacao === 1)
                        <i class="material-icons yellow-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="Em Análise">visibility</i>
                    @endif
                    @if($pedido->situacao === 2)
                        <i class="material-icons green-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="Resolvido">done</i>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <hr>
    <div class="row " style="font-family: 'Raleway', sans-serif; font-size: small">


        <div class="col s3 ">Usuario: {{\Illuminate\Support\Facades\Auth::user()->nome}}</div>
        <div class="col s5 ">

            Arquivo gerado em: {{date("d/m/Y H:i:s")}}
        </div>
        <div class="col s4 ">Relatórios Control-lab</div>
    </div>
</div>

</body>
</html>