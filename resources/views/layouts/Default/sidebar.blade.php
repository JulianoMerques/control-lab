<!-- SIDE BAR-->
<nav class="navbar-fixed">
    <div class="nav-wrapper  #26a69a teal lighten-1">
        <ul class="right hide-on-med-and-down">
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
            @else
                <li class="dropdown">
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="material-icons">settings_power</i>
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>

        <a href="{{route('dashboard')}}" class="brand-logo">Control-Lab</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

        <!-- Dropdown Structure Dispositivos -->
        <ul id="dropdownMaq" class="dropdown-content">
            <li><a href="{{route('maquinas')}}">Listar</a></li>
            <li><a href="{{route('maquinas.add')}}">Cadastrar</a></li>
        </ul>
        <!-- Dropdown Structure Laboratório -->

        <ul id="dropdownLab" class="dropdown-content">
            <li><a href="#!">Listar</a></li>
            <li><a href="#!">Cadastrar</a></li>
        </ul>
        <!-- Dropdown Structure Manutenção -->
        <ul id="dropdownMan" class="dropdown-content">
            <li><a href="#!">Listar</a></li>
            <li><a href="#!">Cadastrar</a></li>
        </ul>
        <!-- Dropdown Structure Pedidos -->
        <ul id="dropdownPed" class="dropdown-content">
            <li><a href="#!">Listar</a></li>
            <li><a href="#!">Cadastrar</a></li>
        </ul>
        <!-- Dropdown Structure Usuarios -->
        <ul id="dropdownUser" class="dropdown-content">
            <li><a href="#!">Listar</a></li>
            <li><a href="#!">Cadastrar</a></li>
        </ul>
        <!-- Dropdown Structure Retatório -->
        <ul id="dropdownRel" class="dropdown-content">

            <li><a href="#!">Dispositivos</a></li>
            <li><a href="#!">Salas</a></li>
            <li><a href="#!">Manutenção</a></li>
            <li><a href="#!">Pedidos</a></li>
            <li><a href="#!">Usuários</a></li>
        </ul>
        <ul class="right hide-on-med-and-down">

            <li><a class="dropdown-button" href="#!" data-activates="dropdownMaq">Dispositivos<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-button" href="#!" data-activates="dropdownLab">Salas<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-button" href="#!" data-activates="dropdownMan">Manutenção<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-button" href="#!" data-activates="dropdownPed">Pedidos<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-button" href="#!" data-activates="dropdownUser">Usuários<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-button" href="#!" data-activates="dropdownRel">Relatórios<i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="sass.html">Máquinas</a></li>
            <li><a href="sass.html">Laboratório</a></li>
            <li><a href="sass.html">Manutenção</a></li>
            <li><a href="sass.html">Pedidos</a></li>
            <li><a href="sass.html">Usuários</a></li>
            <li><a href="sass.html">Relatórios</a></li>
        </ul>


    </div>

</nav>
