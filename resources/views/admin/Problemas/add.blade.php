@extends('layouts.Default.app')

@section('content')
    @if(Session::has('message'))
        {{ \App\Core\Helpers\AppHelper::showMessage(Session::get('message')) }}
    @endif
    <div class="container " style="height: 305px">

        <div class="col col s12 m12 l12 center-align">
            <h5>Cadastrar Problema </h5>
        </div>



        <div class="row ">
            <div class="col s12 m12 l12">
                <form name="problema_create" method="post" class="form-horizontal" action="{{route('problemas.create')}}" class="col s12" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-field col s12 m12 l12">
                            <input name="problema" id="problema" type="text" class="validate">
                            <label for="nome">Problema</label>
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
