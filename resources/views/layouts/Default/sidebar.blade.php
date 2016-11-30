<!-- SIDE BAR-->
<nav class="navbar-fixed">
    <div class="nav-wrapper #0288d1 light-blue darken-2">

        <ul class="right hide-on-med-and-down">
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
            @else
            <!-- Dropdown Structure User -->
                <ul id="dropdown" class="dropdown-content">
                    <li>
                        <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="material-icons">settings_power</i>Logout
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    <li><a href="{{route('usuarios.show', \Illuminate\Support\Facades\Auth::user()->id)}}">
                            <i class="material-icons prefix">account_circle</i>Perfil
                        </a>
                    </li>
                </ul>
                <li>
                    <a class="dropdown-button" href="#!" data-activates="dropdown">
                        <div class="chip #0288d1 light-blue darken-2">
                            @if(\Illuminate\Support\Facades\Auth::user()->img == null)
                                {{--<i class="material-icons small">account_circle</i>--}}
                                <img src="{!! asset('app/user.png') !!}" alt="Imagem do Usuário">
                                {{\Illuminate\Support\Facades\Auth::user()->nome}}
                            @else
                                <img src="{{\Illuminate\Support\Facades\Auth::user()->img}}" alt="Imagem do Usuário">
                                {{\Illuminate\Support\Facades\Auth::user()->nome}}
                            @endif

                        </div>
                        <i class="material-icons right">arrow_drop_down</i>
                    </a>
                </li>
            @endif
        </ul>

        {{--<a href="{{route('dashboard')}}" class="brand-logo">Control-Lab V 1.1</a>--}}
        <a href="{{route('dashboard')}}" class="brand-logo"><img src="{!! asset('app/logo3.png') !!}" width="50%" alt="Control-Lab V 1.1"> </a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

        {{------------------------------estrutura de menus------------------------------------------}}
    <!-- Dropdown Structure Dispositivos -->
        <ul id="dropdownMaq" class="dropdown-content">
            <li><a href="{{route('maquinas')}}">Listar</a></li>
            <li><a href="{{route('maquinas.add')}}">Cadastrar</a></li>
        </ul>

        <!-- Dropdown Structure Salas -->
        <ul id="dropdownLab" class="dropdown-content">
            <li><a href="{{route('salas')}}">Listar</a></li>
            <li><a href="{{route('salas.add')}}">Cadastrar</a></li>
        </ul>

        <!-- Dropdown Structure Manutenção -->
        <ul id="dropdownMan" class="dropdown-content">
            <li><a href="{{route('manutencao')}}">Listar</a></li>
        </ul>

        <!-- Dropdown Structure Pedidos -->
        <ul id="dropdownPed" class="dropdown-content">
            <li><a href="{{route('pedidos')}}">Listar</a></li>
            <li><a href="{{route('pedidos.add')}}">Cadastrar</a></li>
        </ul>
        <!-- Dropdown Structure Usuarios -->
        <ul id="dropdownUser" class="dropdown-content">
            <li><a href="{{route('usuarios')}}">Listar</a></li>
            <li><a href="{{route('usuarios.add')}}">Cadastrar</a></li>
        </ul>
        <!-- Dropdown Structure Retatório -->
        <ul id="dropdownRel" class="dropdown-content">
            <li><a href="{{route('relatorios.dispositivos')}}">Dispositivos</a></li>
            <li><a href="{{route('salas.gerar')}}">Salas</a></li>
            <li><a href="{{route('manutencoes.gerar')}}">Manutenção</a></li>
            <li><a href="{{route('relatorios.pedidos')}}">Pedidos</a></li>
            <li><a href="{{route('usuarios.gerar')}}">Usuários</a></li>
        </ul>

        <!-- Dropdown Structure Comuns -->
        <ul id="dropdownCom" class="dropdown-content">
            <li><a href="{{route('problemas')}}">Problemas</a></li>
            <li><a href="{{route('tipoUser')}}">Tipo de Usuario</a></li>
            <li><a href="{{route('tipoManutencao')}}">Tipo Manutenção</a></li>

        </ul>


        {{------------------------------fim estrutura de menus------------------------------------------}}

        <ul class="right hide-on-med-and-down">
            @if(\Illuminate\Support\Facades\Auth::user()->isAdm() || \Illuminate\Support\Facades\Auth::user()->isEstag() )
                <li><a class="dropdown-button" href="#!" data-activates="dropdownLab">Salas<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a class="dropdown-button" href="#!" data-activates="dropdownMaq">Dispositivos<i class="material-icons right">arrow_drop_down</i></a></li>
            @endif
            <li><a class="dropdown-button" href="#!" data-activates="dropdownPed">Pedidos<i class="material-icons right">arrow_drop_down</i></a></li>
            @if(\Illuminate\Support\Facades\Auth::user()->isAdm() || \Illuminate\Support\Facades\Auth::user()->isEstag())
                <li><a  href="{{route('manutencao')}}" >Manutenção</a></li>
                <li><a class="dropdown-button" href="#!" data-activates="dropdownRel">Relatórios<i class="material-icons right">arrow_drop_down</i></a></li>
            @endif
            @if(\Illuminate\Support\Facades\Auth::user()->isAdm() )
                <li><a class="dropdown-button" href="#!" data-activates="dropdownUser">Usuários<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a class="dropdown-button" href="#!" data-activates="dropdownCom">Comuns<i class="material-icons right">arrow_drop_down</i></a></li>
            @endif
        </ul>

        {{------------------------------estrutura de menus moblile------------------------------------------}}
        <ul id="dropMaqMobile" class="dropdown-content">
            <li><a href="{{route('maquinas')}}">Listar</a></li>
            <li><a href="{{route('maquinas.add')}}">Cadastrar</a></li>
        </ul>
        {{--------------------------------------------------------------------------------------------------}}
        <ul id="dropLabMobile" class="dropdown-content">
            <li><a href="{{route('salas')}}">Listar</a></li>
            <li><a href="{{route('salas.add')}}">Cadastrar</a></li>
        </ul>
        {{--------------------------------------------------------------------------------------------------}}
        <ul id="dropPedMobile" class="dropdown-content">
            <li><a href="{{route('pedidos')}}">Listar</a></li>
            <li><a href="{{route('pedidos.add')}}">Cadastrar</a></li>
        </ul>
        {{--------------------------------------------------------------------------------------------------}}
        <ul id="dropManMobile" class="dropdown-content">
            <li><a href="{{route('manutencao')}}">Listar</a></li>
        </ul>
        {{--------------------------------------------------------------------------------------------------}}
        <ul id="dropRelMobile" class="dropdown-content">
            <li><a href="#!">Dispositivos</a></li>
            <li><a href="#!">Salas</a></li>
            <li><a href="#!">Manutenção</a></li>
            <li><a href="#!">Pedidos</a></li>
            <li><a href="#!">Usuários</a></li>
        </ul>
        {{--------------------------------------------------------------------------------------------------}}
        <ul id="dropMobile" class="dropdown-content">
            <li>
                <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="material-icons">settings_power</i>Logout
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
            <li><a href="{{route('usuarios.show', \Illuminate\Support\Facades\Auth::user()->id)}}">
                    {{--<i class="material-icons">settings</i>--}}
                    <i class="material-icons prefix">account_circle</i>Perfil
                </a>
            </li>
        </ul>

        {{-----------------------------fim estrutura de menus moblile----------------------------------------}}
        <ul class="side-nav" id="mobile-demo">
            @if(\Illuminate\Support\Facades\Auth::user()->isAdm())
                <li><a class="dropdown-button" href="#!" data-activates="dropLabMobile">Salas<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a class="dropdown-button" href="#!" data-activates="dropMaqMobile">Dispositivos<i class="material-icons right">arrow_drop_down</i></a></li>
            @endif
            <li><a class="dropdown-button" href="#!" data-activates="dropPedMobile">Pedidos<i class="material-icons right">arrow_drop_down</i></a></li>
            @if(\Illuminate\Support\Facades\Auth::user()->isAdm())
                <li><a href="{{route('manutencao')}}">Manutenção</a></li>
                <li><a class="dropdown-button" href="#!" data-activates="dropMaqMobile">Usuários<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a class="dropdown-button" href="#!" data-activates="dropRelMobile">Relatórios<i class="material-icons right">arrow_drop_down</i></a></li>
            @endif
            <li>
                <a class="dropdown-button" href="#!" data-activates="dropMobile">
                    <div class="chip white">
                        <img src="{{\Illuminate\Support\Facades\Auth::user()->img}}" alt="Contact Person">
                        {{\Illuminate\Support\Facades\Auth::user()->nome}}
                    </div>
                    <i class="material-icons right">arrow_drop_down</i>
                </a>
            </li>
        </ul>


    </div>

</nav>
