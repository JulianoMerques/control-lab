@extends('layouts.Default.app')
@section('content')
    <div class="container" style="height: 305px">
        {{----------------------------------------------------------------------------------------------------}}
        <div class="row">
            <div class="container center-align">
                <div class="col s12 m12 l12">
                    <h5>Informação da Manutenção:  {{$manutencao->id}} </h5>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l12">
            <div class="card">
                    <div class="card-content">
                        <p>Manutenção: {{$manutencao->id}}</p><br>
                        <p>Responsavel pela Manutenção: {{$manutencao->usuario['nome'].' '.$manutencao->usuario['sobrenome']}}</p><br>
                        <p>Manutenção do Pedido: {{$manutencao->pedido_id}}</p><br>
                        <p>Problema: {{$manutencao->pedido->problema['problema']}}</p><br>
                        <p>Solução: {{$manutencao->solucao  }}</p><br>
                    </div>
            </div>
        </div>

        {{----------------------------------------------------------------------------------------------------}}
    </div>
@endsection