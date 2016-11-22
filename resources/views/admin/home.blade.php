@extends('layouts.Default.app')

@section('content')
    @if(Session::has('message'))
        {{ \App\Core\Helpers\AppHelper::showAlert(Session::get('message')) }}
    @endif
    <div class="container">
        <div class="row center-align">
            <div class="col s12 m12 l12">
                <div class="col s12 m12 l12">
                    <div class="col s12 m12 l12">
                        {{--Logo do sistema--}}
                        {{--<h3>logo</h3>--}}
                        {{--<img src="../layouts/Default/logo2.png" alt="Control-Lab V 1.1">--}}

                        <img src="{!! asset('app/logo3.png') !!}" alt="Control-Lab V 1.1">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            {{--Total de Pedidos no sistema--}}
            <div class="col s12 m12 l6 center-align">
                <div class="card">
                    <div class="card-panel green">
                        {{--<span><i class="material-icons">description</i></span><br>--}}
                        <span class="white-text">Número De Pedidos:</span><br>
                        <span class="white-text">{{$pedidos}}</span>

                    </div>
                </div>
            </div>
            {{--Total de Manutenções--}}
            <div class="col s12 m12 l6 center-align">
                <div class="card">
                    <div class="card-panel #1565c0 blue darken-3">
                        {{--<span><i class="material-icons">build</i></span><br>--}}
                        <span class="white-text">Número De Manutenções:</span><br>
                        <span class="white-text">{{$manutencoes}}</span>
                    </div>

                </div>
            </div>
            {{--Total de Pedidos no sistema--}}
            <div class="col s12 m12 l6 center-align">
                <div class="card">
                    <div class="card-panel #fb8c00 orange darken-3">
                        <span class="white-text">Número De Salas:</span><br>
                        <span class="white-text">{{$salas}}</span>
                    </div>
                </div>
            </div>
            {{--Total de Manutenções--}}
            <div class="col s12 m12 l6 center-align ">
                <div class="card">
                    <div class="card-panel #d84315 deep-orange darken-3">
                        <span class="white-text">Número De Dispositivos:</span><br>
                        <span class="white-text">{{$dispositivos}}</span>
                    </div>

                </div>
            </div>


        </div>
    </div>


@endsection
@section('script')
    <script>
        $(document).ready(function(){

            var message = document.getElementById('message').value;
            Materialize.toast(message, 4000)
                   });
    </script>
@endsection
