@extends('layouts.Default.app')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="col s12 m12 l12 center-align">
            <h5>Cadastrar Pedido de Manutenção</h5>
        </div>

        <div class="row">
            <div class="col s12 m12 l12">
                <form name="usuario_create" method="post" class="form-horizontal" action="{{route('pedidos.create')}}" class="col s12" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <hr>
                    <div class="row">
                        {{--<div class="input-field col s12 m10 l12">--}}
                            {{--<input name="protocolo" id="protocolo" type="text" class="validate" value="{{$protocolo}}">--}}
                            {{--<label for="protocolo">Protocolo</label>--}}
                        {{--</div>--}}
                        <div class="input-field col s12 m10 l6">
                            <select name="laboratorios_id">
                                <option value="">Escolha uma opção</option>
                                @foreach($salas as $sala)
                                    <option value="{{$sala->id}}">{{$sala->nome}}</option>
                                @endforeach
                            </select>
                            <label>Selecione Uma Sala</label>
                        </div>
                        <div class="input-field col s12 m10 l6">
                            <select name="maquinas_id">
                                <option value="">Escolha uma opção</option>
                                {{--Devera ser alterado para trazer só as maquinas da sala selecionada--}}
                                @foreach($maquinas as $maquina)
                                    <option value="{{$maquina->id}}">{{$maquina->nome}}</option>
                                @endforeach
                            </select>
                            <label>Selecione Um  Dispositivo</label>
                        </div>
                        <div class="input-field col s12 m10 l6">
                            <select name="problema_id">
                                <option value="">Escolha uma opção</option>
                                @foreach($problemas as $problema)
                                    <option value="{{$problema->id}}">{{$problema->problema}}</option>
                                @endforeach
                            </select>
                            <label>Selecione Um Problema</label>

                        </div>
                        <div class="input-field col s12 m10 l6">
                            <select name="tipo_manutencao_id">
                                <option value="">Escolha uma opção</option>
                                @foreach($tipos as $tipo)
                                    <option value="{{$tipo->id}}">{{$tipo->tipo_manutencao}}</option>
                                @endforeach
                            </select>
                            <label>Selecione Um Tipo de Manutenção</label>
                        </div>
                        <div class="input-field col s12 m12 l12">
                            <textarea id="descricao"  name="descricao" class="materialize-textarea"></textarea>
                            <label for="descricao">Descrição do Problema</label>
                        </div>
                        <input type="hidden" value="{{date("dmY"). mt_rand(1,100)}}" name="protocolo"/>

                    </div>
                    <div class="row">
                        <div class="col s12">
                            {{--<input type="submit" name="enviar" value="Enviar" class="btn btn-primary pull-right green">--}}
                            {{--<i class="material-icons">send</i>--}}
                            {{--</input>--}}

                            <button class="btn waves-effect waves-light green pull-right" type="submit" name="Salvar">Salvar
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection