@extends('layouts.Default.app')
@section('content')
    <div class="container" style="height: 305px">
        @if(Session::has('message'))
            {{ \App\Core\Helpers\AppHelper::showAlert(Session::get('message')) }}
        @endif
            <div class="col s12 m12 l12 center-align">
                <h5>Cadastrar Manutenção</h5>
            </div>

        <div class="row">
            <div class="col s12 m12 l12">
                <form name="usuario_create" method="post" class="form-horizontal" action="{{route('manutencao.create')}}" class="col s12" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <hr>
                    <div class="row">
                        <div class="input-field col s12 m10 l6">
                            <select name="turno_id">
                                <option value="">Escolha uma opção</option>
                                @foreach($turnos as $turno)
                                    <option value="{{$turno->id}}">{{$turno->turno}}</option>
                                @endforeach
                            </select>
                            <label>Selecione o Turno</label>
                        </div>
                        <div class="input-field col s12 m10 l6">
                            <input name="pedido_id" id="protocolo" type="text" class="validate" value="{{$pedidos}}">
                            <label for="protocolo">Pedido</label>
                        </div>

                        <div class="input-field col s12 m12 l12">
                            <textarea id="solucao"  name="solucao" class="materialize-textarea"></textarea>
                            <label for="solucao">Solução do Problema</label>
                        </div>
                        {{--<input type="hidden" value="{{date("dmY"). mt_rand(1,100)}}" name="protocolo"/>--}}

                    </div>
                    <div class="row">
                        <div class="col s12">
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