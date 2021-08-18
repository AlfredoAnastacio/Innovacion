<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>INNOVACIÓN FINANCIERA | RENTABILIDAD </title>
    <link rel="shortcut icon" href="{{ asset('images/fav_ico.png') }}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{asset('css/tree.css')}}" rel="stylesheet">
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark sticky-top bg-blue2 flex-md-nowrap p-0 shadow">
        <div class="spacer"></div>
        <a class="flecha-atras" href="{{ route('tree') }}"><img src="{{ asset('images/regresar.png') }}"></a>
        <h1 class="mx-auto mt-5"> RENTABILIDAD </h1>
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
                                    <div class="nivel">
                                        <div class="row">
                                            <div class="col-7 pr-0">
                                                <h6 class="usuario azul pt-1"><b>Contratos activos 0</b></h6>
                                                <hr class="azul">
                                                <p class="patrocinador fp-1 griz">Contratos inactivos 0 </p>
                                            </div>
                                            <div class="col-5 text-center">
                                                <div class="border border-dark bg-white">
                                                    <h5 style="margin: auto;" class="text-primary font-weight-bold">$150.000</h5>
                                                    <small style="margin: auto;" class="text-primary">Rentabilidad total</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Estructuras -->
                                    <div class="round_pers_basico mt-4">
                                        <section class="mt-2">
                                            <div class="col-12 text-center text-uppercase relleno_azul_personal_superio text-white pt-2 pb-3"><strong>Lider innovador</strong></div>
                                                <div class="col-12 mx-0 px-0 row ">
                                                    <div class="col-12 row mx-0 px-0 text-orange_perso">
                                                        <div class="col-6 text-center  border-right border-primary mx-0 px-0"><br>
                                                            <img class="img-fluid" src="{{asset('images/rentalider1.png')}}">
                                                            <p class="text-uppercase" style="margin: auto;"><strong>US$300</strong></p>
                                                            <p class="text-uppercase">RENTABILIDAD</p>
                                                        </div>
                                                        <div class="col-6 text-center  border-left border-primary mx-0 px-0"><br>
                                                            <img class="img-fluid" src="{{asset('images/rentalider2.png')}}">
                                                            <p class="text-uppercase" style="margin: auto;"><strong>US $30</strong></p>
                                                            <p class="text-uppercase">ULTIMO PAGO</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 text-center text-uppercase relleno_azul_personal_inferior text-white pt-3 pb-2">generando con 4 contratos</div>
                                                </div>
                                        </section>
                                    </div>
                                    <div class="round_pers_basico mt-4">
                                        <section id="algo" class="mt-2">
                                            <div class="col-12 text-center text-uppercase relleno_azul_personal_superio text-white pt-2 pb-3">CONTRATO 12345678-AG</div>
                                            <div class="col-12 mx-0 px-0 row ">
                                                <div class="col-6 border border-primary text-center x-0 px-0"><br>
                                                    <img class="img-fluid" src="{{asset('images/rentaplata1.png')}}">
                                                    <p class="text-uppercase" style="margin: auto;"><strong>Us $ 0</strong></p>
                                                    <p class="text-uppercase">RENTABILIDAD</p>
                                                </div>
                                                <div class="col-6 border border-primary text-center mx-0 px-0"><br>
                                                    <img class="img-fluid" src="{{asset('images/rentaplata2.png')}}">
                                                    <p class="text-uppercase" style="margin: auto;"><strong>0</strong></p>
                                                    <p class="text-uppercase">PAGOS RECIBIDOS</p>
                                                </div>
                                                <div class="col-6 border border-primary text-center  mx-0 px-0"><br>
                                                    <img class="img-fluid" src="{{asset('images/rentaplata3.png')}}">
                                                     <p class="text-uppercase" style="margin: auto;"><strong>Us $ 0</strong></p>
                                                    <p class="text-uppercase">ÚLTIMO PAGO</p>
                                                </div>
                                                <div class="col-6 border border-primary text-center mx-0 px-0"><br>
                                                    <img class="img-fluid" src="{{asset('images/rentaplata4.png')}}">
                                                     <p class="text-uppercase" style="margin: auto;"><strong>0</strong></p>
                                                    <p class="text-uppercase">PAGOS PENDIENTES</p>
                                                </div>
                                            </div>
                                            <div class="col-12 text-center text-uppercase relleno_azul_personal_inferior text-white pt-3 pb-2">generando con 4 contratos</div>

                                        </section>
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
        $("#profitability").last().addClass("active");
    </script>
</html>
