@extends('layouts.Default.app')

@section('content')
    <div class="container">
        <div class="row center-align">
            <div class="col s12 m12 l12">
                <div class="col s12 m12 l12">
                    <div class="col s12 m12 l12">
                        {{--Logo do sistema--}}
                        {{--<strong>Bem Vindo {{ Auth::user()->nome }}</strong>--}}
                        <h3>logo</h3>
                        {{--<img src="app/user/img/2.jpg"/>--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            {{--Total de Pedidos no sistema--}}
            <div class="col s12 m12 l6 center-align">
                <div class="card">
                    <div class="card-panel green">
                        <span class="white-text">Numero De Pedidos:</span><br>
                        <span class="white-text">200</span>

                    </div>
                </div>
            </div>
            {{--Total de Manutenções--}}
            <div class="col s12 m12 l6 center-align">
                <div class="card">
                    <div class="card-panel #1565c0 blue darken-3">
                        <span class="white-text">Numero De Manutenções:</span><br>
                        <span class="white-text">200</span>
                    </div>

                </div>
            </div>
            {{--Total de Pedidos no sistema--}}
            <div class="col s12 m12 l6 center-align">
                <div class="card">
                    <div class="card-panel #fb8c00 orange darken-3">
                        <span class="white-text">Numero De Salas:</span><br>
                        <span class="white-text">200</span>
                    </div>
                </div>
            </div>
            {{--Total de Manutenções--}}
            <div class="col s12 m12 l6 center-align ">
                <div class="card">
                    <div class="card-panel #d84315 deep-orange darken-3">
                        <span class="white-text">Numero De Dispositivos:</span><br>
                        <span class="white-text">2000</span>
                    </div>

                </div>
            </div>


        </div>
    </div>
@endsection
