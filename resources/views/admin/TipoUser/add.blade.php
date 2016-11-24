@extends('layouts.Default.app')

@section('content')
    @if(Session::has('message'))
        {{ \App\Core\Helpers\AppHelper::showMessage(Session::get('message')) }}
    @endif
    <div class="container ">

        <div class="col col s12 m12 l12 center-align">
            <h5>Cadastrar tipo de usuário </h5>
        </div>



        <div class="row ">
            <div class="col s12 m12 l12">
                <form name="tipo_create" method="post" class="form-horizontal" action="{{route('tipoUser.create')}}" class="col s12" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <input name="tipo" id="tipo" type="text" class="validate">
                            <label for="tipo">Tipo de Usuário</label>
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