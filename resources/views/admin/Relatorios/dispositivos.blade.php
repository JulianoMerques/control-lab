@extends('layouts.Default.app')

@section('content')
    <div class="container" style="height: 305px">
        <div class="row ">
            <div class="col s12">
                <form name="maquinas_rel" method="post" class="form-horizontal" action="{{route('dispositivos.gerar')}}" class="col s12" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row center-align">
                        <div class="row">
                            <span class="black-text" style="font-family: 'Raleway', sans-serif; font-size: medium">Selecione a sala para gerar o relatório dos dispositivos</span>
                        </div>
                        <div class="input-field col s12 m10 l3 "></div>

                        <div class="input-field col s12 m10 l6 ">
                            <select name="laboratorios_id">
                                <option value="">Escolha uma opção</option>
                                @foreach($laboratorios as $laboratorio)
                                    <option value="{{$laboratorio->id}}">{{$laboratorio->nome}}</option>
                                @endforeach
                                <option value="0">Todos</option>
                            </select>
                            <label>Selecione a Sala</label>
                        </div>

                        <div class="input-field col s12 m10 l3 "></div>
                    </div>
                    <div class="row ">
                        <div class="col s12 center-align">
                            <button class="btn waves-effect waves-light green pull-right" type="submit" name="enviar">Gerar
                                <i class="material-icons">insert_drive_file</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection