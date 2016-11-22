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

    <!-- Scripts -->
    <script>
        $( document ).ready(function(){

            $(".dropdown-button").dropdown();
            $(".button-collapse").sideNav();
            $('select').material_select();
            $('.tooltipped').tooltip({delay: 50});

        });

        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>


    </script>
</head>
<body>
<!-- START Main wrapper-->
<section class="wrapper">
    <!-- START aside-->

    <aside class="aside">
        <!-- START Sidebar (left)-->
    @include('layouts.Default.sidebar')
    <!-- END Sidebar (left)-->
    </aside>
    <!-- End aside-->
    <div class="row">
        <div>
            <!-- START Main section-->
            <section>
                <!-- START Page content-->
                <section class="main-content">
                    @yield('content')
                </section>
                <!-- END Page content-->
            </section>
            <!-- END Main section-->
        </div>

    </div>
    {{--<footer class="page-footer #0288d1 light-blue darken-2">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col l6 s12">--}}
                    {{--<h5 class="white-text">Footer Content</h5>--}}
                    {{--<p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>--}}
                {{--</div>--}}
                {{--<div class="col l4 offset-l2 s12">--}}
                    {{--<h5 class="white-text">Links</h5>--}}
                    {{--<ul>--}}
                        {{--<li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>--}}
                        {{--<li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>--}}
                        {{--<li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>--}}
                        {{--<li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="footer-copyright">--}}
            {{--<div class="container">--}}
                {{--© 2014 Copyright Text--}}
                {{--<a class="grey-text text-lighten-4 right" href="#!">More Links</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</footer>--}}
    @yield('modal')
</section>
<!-- END Main wrapper-->

<!-- Scripts -->

<script src="/js/materialize.js"></script>

@yield('script')

{{--<script src="/public/js/materialize.js"></script>--}}



</body>
</html>



