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
    @yield('scripts')
    <script>
        $( document ).ready(function(){


//
            $(".button-collapse").sideNav();
            $(".dropdown-button").dropdown();
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
    @yield('modal')
</section>
<!-- END Main wrapper-->

<!-- Scripts -->
<script src="/js/materialize.js"></script>

@yield('script')


</body>
</html>



