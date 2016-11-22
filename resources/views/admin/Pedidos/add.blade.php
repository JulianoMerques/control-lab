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
                        <input type="hidden" value="{{date("dmY"). mt_rand(1,100)}}" name="id"/>

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
@section('script')
    <script>
//        $(document).ready(function(){
            $('select[name=maquinas_id]').html('').append('<option value="">  Selecione uma Sala...  </option>');

            $('select[name=laboratorios_id]').change(function () {
                var laboratorios_id = $(this).val();

                $.get('/admin/pedidos/' + laboratorios_id, function (maquinas) {
                    $('select[name=maquinas_id]').html('').empty();

                    $('select[name=maquinas_id]').html('').append('<option value="">Escolha o Dispositivo </option>');
                    $.each(maquinas, function (key, value) {
                        $('select[name=maquinas_id]').append('<option value=' + value.id + '>' + value.nome + '</option>');
                        $('select').material_select();
                    });
                });

            });
//        });

    </script>
@endsection
