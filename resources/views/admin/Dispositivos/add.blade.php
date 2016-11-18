@extends('layouts.Default.app')

@section('content')
    @if(Session::has('message'))
        {{ \App\Core\Helpers\AppHelper::showAlert(Session::get('message')) }}
    @endif
    <div class="container ">
        <div class="row col s12 m12 l12">
            <div class="col col s12 m12 l12 center-align">
                <h5>Cadastrar Dispositivo </h5>
            </div>

        </div>


        <div class="row ">
            <div class="col s12">
                <form name="maquinas_create" method="post" class="form-horizontal" action="{{route('maquinas.add')}}" class="col s12" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">

                        <div class="input-field col s12 m10 l6">
                            <input placeholder="Mac" name="mac" id="mac" type="text" class="validate">
                            <label for="mac">Mac</label>
                        </div>
                        <div class="input-field col s12 m10 l6">
                            <select name="laboratorios_id">
                                <option value="">Escolha uma opção</option>
                                @foreach($laboratorios as $laboratorio)
                                    <option value="{{$laboratorio->id}}">{{$laboratorio->nome}}</option>
                                @endforeach

                            </select>
                            <label>Selecione uma Sala</label>
                        </div>
                        <div class="input-field col s12 m10 l6">
                            <input placeholder="Patrimonio" name="patrimonio" id="patrimonio" type="text" class="validate">
                            <label for="patrimonio">Patrimonio</label>
                        </div>
                        <div class="input-field col s12 m10 l6">
                            <input placeholder="Nome" name="nome" id="nome" type="text" class="validate">
                            <label for="nome">Nome</label>
                        </div>
                        <div class="input-field col s12 m10 l12">
                            <textarea id="configuracao"  name="configuracao" class="materialize-textarea"></textarea>
                            <label for="configuracao"> Configuração </label>
                        </div>
                    </div>
                    <hr>
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
@section('script')
    <script>
        $(document).ready(function(){
            var message = document.getElementById('message').value;
            Materialize.toast(message, 4000)
        });
    </script>
@endsection

