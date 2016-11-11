@extends('layouts.Default.app')
@section('content')
    <div class="container">
        {{----------------------------------------------------------------------------------------------------}}

        <div class="col s12 m12 l12">
            <div class="card horizontal ">
                <div class="card-image">
                    <i class="material-icons large">build</i>
                    {{--<img src="http://lorempixel.com/100/190/nature/6">--}}
                    {{--<img src="../../../../public/app/12.png">--}}
                    {{--/home/jmerques/PROJECTS/control-lab/public/app/12.png--}}{{--public/app/12.png--}}
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        <span>Manutenção: {{$manutencao->id}}</span><br>
                        <span>Responsavel pela Manutenção: {{$manutencao->usuario['nome'].' '.$manutencao->usuario['sobrenome']}}</span><br>
                        <span>Manutenção do Pedido: {{$manutencao->pedido_id}}</span><br>
                        <span>Problema: {{$manutencao->pedido->problema['problema']}}</span><br>
                        <span>Solução: {{$manutencao->solucao  }}</span><br>
                    </div>

                </div>
            </div>
        </div>

        {{----------------------------------------------------------------------------------------------------}}
    </div>
@endsection