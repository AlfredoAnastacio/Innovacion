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
        <a class="flecha-atras" href="{{ route('contract.index') }}"><img src="{{ asset('images/regresar.png') }}"></a>
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
                            <h6 class="text-center text-uppercase azul"><b> CONTRATOS {{ $contract_range }}</b></h6>
                            <!-- Estructuras -->
                            @foreach ($contracts as $contract)
                                <div class="round_pers_basico mt-4">
                                    <section class="mt-2">
                                        <div class="col-12 text-center text-uppercase relleno_azul_personal_superio text-white pt-2 pb-3"><strong>Contrato {{ $contract->contract }}</strong></div>
                                        <div class="col-12 mx-0 px-0 row ">
                                            <div class="col-6 border border-primary text-center mx-0 px-0"><br>
                                                <div class="progress mx-auto " data-value='90'>
                                                    <span class="progress-left">
                                                        <span class="progress-bar border-primary"></span>
                                                    </span>
                                                    <span class="progress-right">
                                                        <span class="progress-bar border-primary"></span>
                                                    </span>
                                                    <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                                        <div class="block text-center">
                                                            <img class="b-block"src="{{asset('images/people.png')}}">
                                                            <div class="h2 font-weight-bold griz"><b class="qrf"> {{ $contract->users }} </b></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h5 class="griz fz">USUARIOS EN TU ESTRUCTURA</h5>
                                            </div>
                                            <div class="col-6 border border-primary text-center  mx-0 px-0"><br>
                                                <img src="{{ asset('images/rango_plata.png') }}"><br><br>
                                                <p class="text-uppercase" style="margin: auto;">nivel</p>
                                                <p class="text-uppercase">0</p>
                                            </div>
                                            <div class="col-6 border border-primary text-center  mx-0 px-0"><br>
                                                <img src="{{asset('images/inversion.png')}}"><br><br>
                                                <h5><strong>US ${{ $contract->investment }}</strong></h5>
                                                <p class="text-uppercase">inversión</p>
                                            </div>
                                            <div class="col-6 border border-primary text-center mx-0 px-0"><br>
                                                <img src="{{asset('images/rentabilidad.png')}}"><br><br>
                                                <h5><strong>US $0</strong></h5>
                                                <p class="text-uppercase">Rentabilidad</p>
                                            </div>
                                        </div>
                                        <div class="col-12 text-center text-uppercase relleno_azul_personal_inferior"><a class="text-white" href="{{ route('contract.detail', $contract->id) }}"> Detalles > </a></div>

                                    </section>
                                </div>
                            @endforeach
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
