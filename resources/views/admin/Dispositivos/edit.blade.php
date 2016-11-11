@extends('layouts.Default.app')

@section('content')
    @if(Session::has('message'))
        {{ \App\Core\Helpers\AppHelper::showMessage(Session::get('message')) }}
    @endif
    <div class="container ">
        <div class="row col s12 m12 l12 center">
                <h5>Editar Dispositivo  {{$maquina->nome}}</h5>
        </div>


        <div class="row ">
            <div class="col s12">
                    <form name="maquinas_edit" method="post" class="form-horizontal" action="{{route('maquinas.update', $maquina->id)}}" class="col s12" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-field col s6 ">
                            <input placeholder="Mac" name="mac" id="mac" value="{{$maquina->mac}}" type="text" class="validate">
                            <label for="mac">Mac</label>
                        </div>
                        <div class="input-field col s6">
                            <select name="laboratorio_id">
                                <option value="">Escolha uma opção</option>
                                @foreach($laboratorios as $laboratorio)
                                    <option value="{{$laboratorio->id}}">{{$laboratorio->nome}}</option>
                                @endforeach

                            </select>
                            <label>Selecione o laboratório</label>
                        </div>
                        <div class="input-field col s6">
                            <input placeholder="Patrimonio" name="patrimonio" value="{{$maquina->patrimonio}}" id="patrimonio" type="text" class="validate">
                            <label for="patrimonio">Patrimonio</label>
                        </div>
                        <div class="input-field col s6">
                            <input placeholder="Nome" name="nome" value="{{$maquina->nome}}" id="nome" type="text" class="validate">
                            <label for="nome">Nome</label>
                        </div>
                        <div class="input-field col s12">
                            <textarea id="configuracao"  name="configuracao" class="materialize-textarea">{{$maquina->configuracao}}</textarea>
                            <label for="configuracao">Configuração</label>
                        </div>
                        <input type="hidden" value="{{$maquina->id}}" name="id"/>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col s12">
                            <input type="submit" name="editar" value="Salvar" class="btn btn-primary pull-right green">
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

