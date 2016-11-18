@extends('layouts.Default.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col s12">
                <form name="pedidos_rel" method="post" class="form-horizontal" action="{{route('pedidos.gerar')}}" class="col s12" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row center-align">
                        <div class="row">
                            <span class="black-text" style="font-family: 'Raleway', sans-serif; font-size: medium">Selecione o Tipo de Relatório a Ser Gerado</span>
                        </div>
                        <div class="input-field col s12 m10 l3 "></div>
                        <div class="input-field col s12 m10 l6 ">
                            <select name="tipo">
                                <option value="">Escolha uma opção</option>
                                    <option value="0">Completo</option>
                                    <option value="1">Por Usuário</option>
                                    <option value="2">Por Máquina</option>
                                    <option value="3">Por Problema</option>
                                    <option value="4">Por Tipo Manutenção</option>
                                    <option value="5">Por Sala</option>
                            </select>
                            <label>Selecione o Tipo de Relatório</label>
                        </div>



                        <div class="input-field col s12 m10 l3 "></div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m10 l3 "></div>
                        <div name="sala" class="input-field col s12 m10 l6 hiddendiv">
                            <select name="select">
                            </select>
                            <label>Selecione uma opção</label>
                        </div>
                        <div class="input-field col s12 m10 l3 "></div>
                    </div>
                    <div class="row">
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
@section('script')
    <script>
        $(document).ready(function(){

            $('select[name=tipo]').change(function () {
                var tipo_id = $(this).val();
                if (tipo_id != 0){
                    $('div[name=sala]').removeClass('hiddendiv');
                }
                if (tipo_id == 1){
                    $.get('/admin/usuarios/relatorio', function (usuarios) {
                        $('select[name=select]').html('').append('<option value="">Escolha uma opção</option>');
                        $.each(usuarios, function (key, value) {
                            $('select[name=select]').append('<option value=' + value.id + '>' + value.nome + '</option>');
                            $('select').material_select();
                        });
                    });
                }

                if (tipo_id == 2){
//                    alert('aqui');
                    $.get('/admin/relatorios/maquinas', function (maq) {
                        $('select[name=select]').html('').append('<option value="">Escolha uma opção</option>');
                        $.each(maq, function (key, value) {
                            $('select[name=select]').append('<option value=' + value.id + '>' + value.nome + '</option>');
                            $('select').material_select();
                        });
                    });
                }
                if (tipo_id == 3){
//
                    $.get('/admin/problemas/relatorio', function (problemas) {
                        $('select[name=select]').html('').append('<option value="">Escolha uma opção</option>');
                        $.each(problemas, function (key, value) {
                            $('select[name=select]').append('<option value=' + value.id + '>' + value.problema + '</option>');
                            $('select').material_select();
                        });
                    });
                }
                if (tipo_id == 4){
                    $.get('/admin/manutencao/relatorio', function (maq) {
                        $('select[name=select]').html('').append('<option value="">Escolha uma opção</option>');
                        $.each(maq, function (key, value) {
                            $('select[name=select]').append('<option value=' + value.id + '>' + value.tipo_manutencao + '</option>');
                            $('select').material_select();
                        });
                    });
                }
                if (tipo_id == 5){
                    $.get('/admin/salas/relatorio', function (salas) {
                        $('select[name=select]').html('').append('<option value="">Escolha uma opção</option>');
                        $.each(salas, function (key, value) {
                            $('select[name=select]').append('<option value=' + value.id + '>' + value.nome + '</option>');
                            $('select').material_select();
                        });
                    });
                }

                if (tipo_id == 0){
                    $('div[name=sala]').addClass('hiddendiv');
                }




//            $.get('/admin/maquinas/' + laboratorios_id, function (maquinas) {
//                $('select[name=maquinas_id]').html('').empty();
//
//                $('select[name=maquinas_id]').html('').append('<option value="">Escolha uma opção</option>');
//                $.each(maquinas, function (key, value) {
//                    $('select[name=maquinas_id]').append('<option value=' + value.id + '>' + value.nome + '</option>');
//                    $('select').material_select();
//                });
//            });

            });
        });

    </script>
@endsection