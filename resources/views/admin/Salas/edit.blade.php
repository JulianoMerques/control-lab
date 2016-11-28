@extends('layouts.Default.app')

@section('content')
    @if(Session::has('message'))
        {{ \App\Core\Helpers\AppHelper::showMessage(Session::get('message')) }}
    @endif
    <div class="container " style="height: 305px">

        <div class="col col s12 m12 l12 center-align">
            <h5>Editar Sala </h5>
        </div>

        <div class="row ">
            <div class="col s12 m12 l12">
                <form name="sala_create" method="post" class="form-horizontal" action="{{route('salas.update', $sala->id)}}" class="col s12" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-field col s12 m12 l6">
                            <input placeholder="Nome" name="nome" id="nome" value="{{$sala->nome}}" type="text" class="validate">
                            <label for="nome">Nome</label>
                        </div>
                        <div class="input-field col s12 m12 l6">
                            <input placeholder="Capacidade" name="capacidade" id="capacidade" value="{{$sala->capacidade}}" type="number" class="validate">
                            <label for="capacidade">Capacidade </label>
                        </div>

                        <div class="input-field col s12 m12 l12">
                            <textarea id="descricao" name="descricao" class="materialize-textarea">{{$sala->descricao}}</textarea>
                            <label for="descricao">Descrição </label>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col s12">
                            <input type="submit" name="enviar" value="Enviar" class="btn btn-primary pull-right green">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
