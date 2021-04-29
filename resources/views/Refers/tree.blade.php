<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Mis Estructuras</title>
    <link rel="shortcut icon" href="{{ asset('images/fav_ico.png') }}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark sticky-top bg-blue2 flex-md-nowrap p-0 shadow">
        <div class="spacer"></div>
        <a class="flecha-atras" href="{{ route('tree') }}"><img src="{{ asset('images/regresar.png') }}"></a>
        <h1 class="mx-auto mt-5">Mis estructuras</h1>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @if(Auth::user()->isAdmin())
            <a href="{{ route('users.index') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Administrador</a>
        @endif
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <div class="container-fluid">
        <div class="row mainrow">
            @include('layouts.navbar')
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-3">
                    <div class="">
                        <div class="contenido pt-5 ">
                            <div class="cuenta mx-auto">
                                <h6 class="text-center text-uppercase azul"><b>Estructura #{{ $tree }}</b></h6>
                                <div class="nivel">
                                    <div class="row">
                                        <div class="col-9 pr-0">
                                            <h6 class="usuario azul pt-1"><b># USUARIO: {{ Auth::user()->user_id }}</b></h6>
                                            <hr class="azul">
                                            @if ($total_users <= 2)
                                                <p class="patrocinador fp-1 griz">Nivel: 1</p>
                                            @endif
                                            @if ($total_users > 2 && $total_users <= 4)
                                                <p class="patrocinador fp-1 griz">Nivel: 2</p>
                                            @endif
                                            @if ($total_users > 4 && $total_users <= 8)
                                                <p class="patrocinador fp-1 griz">Nivel: 3</p>
                                            @endif
                                            @if ($total_users > 8 && $total_users <= 16)
                                                <p class="patrocinador fp-1 griz">Nivel: 4</p>
                                            @endif
                                            @if ($total_users > 16 && $total_users <= 32)
                                                <p class="patrocinador fp-1 griz">Nivel: 5</p>
                                            @endif
                                            @if ($total_users > 32 && $total_users <= 64)
                                                <p class="patrocinador fp-1 griz">Nivel: 6</p>
                                            @endif
                                            @if ($total_users > 64 && $total_users <= 128)
                                                <p class="patrocinador fp-1 griz">Nivel: 7</p>
                                            @endif
                                            @if ($total_users > 128 && $total_users <= 256)
                                                <p class="patrocinador fp-1 griz">Nivel: 8</p>
                                            @endif
                                        </div>
                                        <div class="col-3 text-center pl-0">
                                            <img class="mb-1" src="{{ asset('images/rango_plata.png') }}">
                                            <p class="text-center griz fz">PLATA</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-5 pb-5">
                                    <div class="col-md-12">
                                        <div class="afiliados w-100 d-flex align-items-center justify-content-end pt-3 pb-3 pl-3">
                                            <p class="text-uppercase mb-3 pr-4 griz fp-1">Afiliados en estructura</p>
                                            <a href="#" class="campana">
                                                <img src="{{ asset('images/Campana.png') }}">
                                                <span class="numero">1</span>
                                            </a>
                                        </div>
                                        <div class="row mb-5 pb-5">
                                            <div class="col-md-12">
                                                <table class="table table-striped text-center">
                                                    <tbody>
                                                        @foreach ($refers as $refer )
                                                            @foreach ($refer as $item )
                                                                <tr>
                                                                    <th scope="row">
                                                                        <p class="mb-0"><b>{{ $item->user->username }}</b></p>
                                                                        <p class="mb-0 fp-1">#{{ $item->user_id }} - NIVEL {{ $levels }}</p>
                                                                    </th>
                                                                    <td class="align-middle">
                                                                        <p class="fp-1">Hace 1 días</p>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="p-md-3 azulbg fixed-bottom text-center">
                    <p class="text-white p-1 mb-0">Innovación Financiera Digital . Copyright 2020</p>
                </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script> window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>') </script>
    <script src="{{ asset('js/bootstrap.bundle.min.js')}} "></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
    <script type="text/javascript">
        $("#tree-user").last().addClass("active");
    </script>
</html>
