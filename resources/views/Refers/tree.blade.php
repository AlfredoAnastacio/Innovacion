<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>INNOVACIÓN FINANCIERA | MIS CONTRATOS </title>
    <link rel="shortcut icon" href="{{ asset('images/fav_ico.png') }}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark sticky-top bg-blue2 flex-md-nowrap p-0 shadow">
        <div class="spacer"></div>
        <a class="flecha-atras" href="{{ URL::previous() }}"><img src="{{ asset('images/regresar.png') }}"></a>
        <h1 class="mx-auto mt-5"> MIS CONTRATOS </h1>
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
                                <div class="nivel">
                                    <div class="row">
                                        <div class="col-9 pr-0">
                                            <h6 class="usuario azul pt-1"><b>DETALLES: Contrato {{ $data_contract->contract }}</b></h6>
                                            <hr class="azul">
                                            <p class="patrocinador fp-1 griz">USUARIOS EN TU CONTRATO: {{ $total_users }}</p>
                                            {{-- @if ($total_users <= 2)
                                                <p class="fp-1 griz">Nivel: 1</p>
                                            @endif
                                            @if ($total_users > 2 && $total_users <= 4)
                                                <p class="fp-1 griz">Nivel: 2</p>
                                            @endif
                                            @if ($total_users > 4 && $total_users <= 8)
                                                <p class="fp-1 griz">Nivel: 3</p>
                                            @endif
                                            @if ($total_users > 8 && $total_users <= 16)
                                                <p class="fp-1 griz">Nivel: 4</p>
                                            @endif
                                            @if ($total_users > 16 && $total_users <= 32)
                                                <p class="fp-1 griz">Nivel: 5</p>
                                            @endif
                                            @if ($total_users > 32 && $total_users <= 64)
                                                <p class="fp-1 griz">Nivel: 6</p>
                                            @endif
                                            @if ($total_users > 64 && $total_users <= 128)
                                                <p class="fp-1 griz">Nivel: 7</p>
                                            @endif
                                            @if ($total_users > 128 && $total_users <= 256)
                                                <p class="fp-1 griz">Nivel: 8</p>
                                            @endif
                                            @if ($total_users > 256 && $total_users <= 512)
                                                <p class="fp-1 griz">Nivel: 9</p>
                                            @endif
                                            @if ($total_users > 512 && $total_users <= 1024)
                                                <p class="fp-1 griz">Nivel: 10</p>
                                            @endif
                                            @if ($total_users > 1024 && $total_users <= 2048)
                                                <p class="fp-1 griz">Nivel: 11</p>
                                            @endif
                                            @if ($total_users > 2048 && $total_users <= 4096)
                                                <p class="fp-1 griz">Nivel: 12</p>
                                            @endif
                                            @if ($total_users > 4096 && $total_users <= 8192)
                                                <p class="fp-1 griz">Nivel: 13</p>
                                            @endif
                                            @if ($total_users > 8192 && $total_users <= 16384)
                                                <p class="fp-1 griz">Nivel: 14</p>
                                            @endif --}}
                                        </div>
                                        <div class="col-3 text-center pl-0">
                                            {{-- @switch($range_lider)
                                                @case(1)
                                                    <img class="mb-1" src="{{ asset('images/rango_plata.png') }}">
                                                    <p class="text-center griz fz">PLATA</p>
                                                @break
                                                @case(2)
                                                    <img class="mb-1" src="{{ asset('images/rango_oro.png') }}">
                                                    <p class="text-center griz fz">ORO</p>
                                                @break
                                                @case(3)
                                                    <img class="mb-1" src="{{ asset('images/rango_platino.png') }}">
                                                    <p class="text-center griz fz">PLATINO</p>
                                                @break
                                                @case(4)
                                                    <img class="mb-1" src="{{ asset('images/rango_diamante.png') }}">
                                                    <p class="text-center griz fz">DIAMANTE</p>
                                                @break
                                            @endswitch --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-5 pb-5">
                                    <div class="col-md-12">
                                        <div>
                                            <p class="text-left mb-4">
                                                <small>LISTADO DE USUARIOS</small>
                                                <img src="{{ asset('images/Campana.png') }}" class="float-right">

                                            </p>
                                            {{-- <p class="fp-1 griz">LISTADO DE USUARIOS</p>
                                            <a href="#" class="campana justify-content-end">
                                                <img src="{{ asset('images/Campana.png') }}">
                                                <span class="numero">1</span>
                                            </a> --}}
                                        </div>
                                        <div class="row mb-5 pb-5">
                                            <div class="col-md-12">
                                                <table class="table table-striped text-center">
                                                    <tbody>
                                                        @foreach ($refers as $refer )
                                                            @foreach ($refer as $item )
                                                                {{-- @dump($item) --}}
                                                                <tr>
                                                                    <th scope="row">
                                                                        <p class="mb-0"><b>{{ strtoupper($item->name) }} </b></p>
                                                                        <p class="mb-0 fp-1">#{{ $item->user_id }} - NIVEL {{ $item->nivel }}</p>
                                                                    </th>
                                                                    <th scope="row">
                                                                        <p class="mb-0"><b> Líder</b></p>
                                                                        <p class="mb-0 fp-1"><span class="badge badge-info">{{ $item->name_sponsor }}</span></p>
                                                                    </th>
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
