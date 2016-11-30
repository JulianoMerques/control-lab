<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/materialize.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="/js/materialize.js"></script>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>



    </script>
</head>
<body style="height: 100%; background-color: #2c3037">
<nav class="navbar-fixed #0288d1 light-blue darken-2">
    <div class="container">
        <div class="nav-wrapper ">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <ul class="right hide-on-med-and-down">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    {{--<li><a href="{{ url('/login') }}">Login</a></li>--}}
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col s12 m6 l2"></div>
        <div class="col s12 m6 l8">
            <div class="card-panel">
                <div class="card-image center-align">
                    <img src="{!! asset('app/logo3.png') !!}">
                    <p class="text-center mb-lg">
                        <strong>Control-Lab V 1.0</strong>
                    </p>
                </div>
                <div class="card-content">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                        <div class="row">
                            <div class="input-field col s12">
                                <input name="email" id="email" type="email" value="{{ old('email') }}" class="validate">
                                <label for="email">Email</label>
                                <span class="fa fa-envelope form-control-feedback text-muted"></span>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input name="password" id="password" type="password" class="form-control" value="{{ old('password') }}">
                                <label for="password">Password</label>
                                <span class="fa fa-lock form-control-feedback text-muted"></span>
                                @if ($errors->has('password'))
                                    <span class="help-block ">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12 m12 l12">
                                <p>
                                    <input type="checkbox" id="remember" name="remember">
                                    <label for="remember">Lembrar-me</label>
                                </p>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col s12">
                                <button type="submit" class="btn large btn-block btn-primary green">Login</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <a href="{{ url('/password/reset') }}" class="btn large btn-block btn-primary #bdbdbd grey lighten-1">Esqueceu sua senha?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>