


<nav id="sidebarMenu" class="col-md-4 col-lg-3 d-md-block bg-light sidebar collapse">
    <div class="logoimg">
        <img class="img-fluid" src="{{asset('images/LogoAzul.png')}}">
    </div>
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a  class="nav-title " href="#">
                    <span data-feather="home"></span>
                    MENU<span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a id="investment" class="nav-link" href="{{url('pays/')}}">
                    <span data-feather="file"></span>
                    INVERTIR
                </a>
            </li>
            <li class="nav-item">
                <a id="dashboard" class="nav-link" href="{{ url('/commissions') }}">
                    <span data-feather="shopping-cart"></span>
                    CUENTA
                </a>
            </li>

            <li class="nav-item">
                <a id="pay" class="nav-link" href="{{ url('payform/'. Auth::id())}}">
                    <span data-feather="bar-chart-2"></span>
                   CANAL DE PAGO
                </a>
            </li>
            <li class="nav-item">
                <a id="perfil" class="nav-link" href="{{ url('user/'. Auth::id()) . '/show' }}">
                    <span data-feather="users"></span>
                    PERFIL
                </a>
            </li>
            <li class="nav-item">
                <a id="tree-user" class="nav-link" href="{{ route('tree') }}">
                    <span data-feather="bar-chart-2"></span>
                    MI RED
                </a>
            </li>
            <li class="nav-item">
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" >
                    <button type="submit" class="box azulbg w-100 pt-3 mb-3 pb-3 text-white text-center">Salir </button>
                    @csrf

                </form>
            </li>
        </ul>
    </div>
    <div class="abajo text-center ">
        <p class="text-white">{{Auth::id()}}</p>
        <p class="footer blue p-1">Innovación Financiera Digital . Copyright 2020</p>
    </div>
</nav>
</nav>
