<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>INNOVACIÓN FINANCIERA | MIS CONTRATOS </title>
    <link rel="shortcut icon" href="{{ asset('images/fav_ico.png') }}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css" media="screen">

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
    <link href="{{asset('css/Treant.css')}}" rel="stylesheet">
    <link href="{{asset('css/tree.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom-colored.css')}}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark sticky-top bg-blue2 flex-md-nowrap p-0 shadow">
        <div class="spacer"></div>
        <h1 class="mx-auto mt-5">MIS CONTRATOS</h1>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <div class="container-fluid">
        <div class="row mainrow">
            <nav id="sidebarMenu" class="col-md-4 col-lg-3 d-md-block bg-light sidebar collapse">
                <div class="logoimg">
                    <img class="img-fluid" src="{{asset('images/LogoAzul.png')}}">
                </div>
                <div class="sidebar-sticky pt-3">
                    @include('layouts.navbar')
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-3">
                <div class="">
                    <div class="contenido pt-5 ">
                        <div class="cuenta mx-auto">
                            <h6 class="text-center text-uppercase azul"><b>{{Auth::user()->name}}</b></h6>
                            <div class="nivel">
                                <div class="row">
                                    <div class="col-9 pr-0">
                                        <h6 class="usuario azul pt-1"><b># USUARIO: {{Auth::user()->user_id}}</b></h6>
                                        <hr class="azul">
                                        <p class="patrocinador"># Contrato Patrocinador: {{ $contract_sponsor }}</p>
                                    </div>
                                    <div class="col-3 text-center">
                                        <h3 class="pt-1 mb-1 griz"><b> {{ $contracts_active }} </b></h3>
                                        <p style="margin: auto;"> Contrato @if($contracts_active > 1) s @endif</p>
                                        <p>Activo @if($contracts_active > 1) s @endif</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Estructuras -->
                            <div class="round_pers_basico mt-4">
                                <section id="algo" class="mt-2">
                                    <div class="row col-md-12">
                                        <div class="col-md-8 text-center text-uppercase relleno_azul_personal_superio text-white pt-2 pb-3"><strong>CONTRATOS PLATA</strong></div>
                                        <div class="col-md-4">
                                            <button> + contrato</button>
                                        </div>
                                    </div>
                                    <div class="col-12 row mx-0 px-0">
                                        <div class="col-6 text-center mt-3 border-right mx-0 px-0">
                                            <img src="{{ asset('images/rango_plata.png') }}">
                                            <p class="text-uppercase" style="margin: auto;">Rango</p>
                                            <p class="text-uppercase">Activo</p>
                                        </div>
                                        <div class="col-6 text-center mt-3 border-left mx-0 px-0">
                                            <p class="text-uppercase" style="margin: auto;"> {{ count($contract_plata) }} </p><br>
                                            <p class="text-uppercase" style="margin: auto;">Estructuras</p>
                                            <p class="text-uppercase">Activas</p>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center text-uppercase relleno_azul_personal_inferior">
                                        @if (count($contract_plata) == 0)
                                            <a class="text-white"> Sin información > </a>
                                        @else
                                            <a class="text-white" href="{{ route('contract.resume', 1) }}"> Más información > </a>
                                        @endif
                                    </div>
                                </section>
                            </div>
                            <div class="round_pers_basico mt-4">
                                <section id="algo" class="mt-2">
                                    <div class="col-12 text-center text-uppercase relleno_azul_personal_superio text-white pt-2 pb-3"><strong>CONTRATOS ORO</strong></div>
                                    <div class="col-12 row mx-0 px-0">
                                        <div class="col-6 text-center mt-3 border-right mx-0 px-0">
                                            <img src="{{ asset('images/rango_oro.png') }}">
                                            <p class="text-uppercase" style="margin: auto;">Rango</p>
                                            <p class="text-uppercase">Activo</p>
                                        </div>
                                        <div class="col-6 text-center mt-3 border-left mx-0 px-0">
                                            <p class="text-uppercase" style="margin: auto;"> {{ count($contract_oro) }} </p><br>
                                            <p class="text-uppercase" style="margin: auto;">Estructuras</p>
                                            <p class="text-uppercase">Activas</p>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center text-uppercase relleno_azul_personal_inferior">
                                        @if (count($contract_oro) == 0)
                                            <a class="text-white"> Sin información > </a>
                                        @else
                                            <a class="text-white" href="{{ route('contract.resume', 2) }}"> Más información > </a>
                                        @endif
                                    </div>
                                </section>
                            </div>
                            <div class="round_pers_basico mt-4">
                                <section id="algo" class="mt-2">
                                    <div class="col-12 text-center text-uppercase relleno_azul_personal_superio text-white pt-2 pb-3"><strong>CONTRATOS PLATINO</strong></div>
                                    <div class="col-12 row mx-0 px-0">
                                        <div class="col-6 text-center mt-3 border-right mx-0 px-0">
                                            <img src="{{ asset('images/rango_platino.png') }}">
                                            <p class="text-uppercase" style="margin: auto;">Rango</p>
                                            <p class="text-uppercase">Activo</p>
                                        </div>
                                        <div class="col-6 text-center mt-3 border-left mx-0 px-0">
                                            <p class="text-uppercase" style="margin: auto;"> {{ count($contract_platino) }} </p><br>
                                            <p class="text-uppercase" style="margin: auto;">Estructuras</p>
                                            <p class="text-uppercase">Activas</p>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center text-uppercase relleno_azul_personal_inferior">
                                        @if (count($contract_platino) == 0)
                                            <a class="text-white"> Sin información > </a>
                                        @else
                                            <a class="text-white" href="{{ route('contract.resume', 3) }}"> Más información > </a>
                                        @endif
                                    </div>
                                </section>
                            </div>
                            <div class="round_pers_basico mt-4">
                                <section id="algo" class="mt-2">
                                    <div class="col-12 text-center text-uppercase relleno_azul_personal_superio text-white pt-2 pb-3"><strong> CONTRATOS DIAMANTE</strong></div>
                                    <div class="col-12 row mx-0 px-0">
                                        <div class="col-6 text-center mt-3 border-right mx-0 px-0">
                                            <img src="{{ asset('images/rango_diamante.png') }}">
                                            <p class="text-uppercase" style="margin: auto;">Rango</p>
                                            <p class="text-uppercase">Activo</p>
                                        </div>
                                        <div class="col-6 text-center mt-3 border-left mx-0 px-0">
                                            <p class="text-uppercase" style="margin: auto;"> {{ count($contract_diamante) }} </p><br>
                                            <p class="text-uppercase" style="margin: auto;">Estructuras</p>
                                            <p class="text-uppercase">Activas</p>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center text-uppercase relleno_azul_personal_inferior">
                                        @if (count($contract_diamante) == 0)
                                            <a class="text-white"> Sin información > </a>
                                        @else
                                            <a class="text-white" href="{{ route('contract.resume', 4) }}"> Más información > </a>
                                        @endif
                                    </div>
                                </section>
                            </div><br><br><br>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="p-md-3 azulbg fixed-bottom text-center">
                <p class="text-white p-1 mb-0">Innovación Financiera Digital . Copyright 2020</p>
            </footer>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
    <script>
        window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/dashboard.js')}}"></script>
</body>
    <script type="text/javascript">
        $("#tree-user").last().addClass("active");
    </script>
</html>
