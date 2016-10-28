@extends('layouts.Default.app')

<!-- Styles -->
<style>
    html, body {
        background-color:#e0e0e0;
        color: #636b6f;
        height: 100vh;
        margin: 0;
    }

    .content {
        text-align: center;
    }

    .title {
        /*font-size: 84px;*/
        font-size: 350%;
    }

    .m-b-md {
        margin-bottom: 30px;
        margin-top: 20%;
    }
</style>

@section('content')
<div class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <div class="col s12 m12 l12">
                <div class="col s12 m12 l12">
                    <strong>Bem Vindo {{ Auth::user()->nome }} ao Dashboard</strong>
                </div>
            </div>

            <div class="content ">
                <div class="title m-b-md">
                    Control-Lab V 1.1
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
