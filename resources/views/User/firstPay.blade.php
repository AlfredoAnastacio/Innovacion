<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>INNOVACIÓN FINANCIERA | INVERSIÓN </title>
    <link rel="shortcut icon" href="{{ asset('images/fav_ico.png') }}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css" media="screen">

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
    <link href="{{asset('css/Treant.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom-colored.css')}}" rel="stylesheet">
    <link href="{{asset('css/firstPay.css')}}" rel="stylesheet">
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
            @include('layouts.navbar')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-3">
                <div class="">
                    <div class="contenido pt-5 ">
                        <p class="text-center griz fwl pt-3"> Active su primer contrato aquí </p>
                        <hr class="space-blue-midle w-50">
                        <p class="text-center text-primary" style="text-size: 24px;"> <strong> Plata - US $15 </strong> </p>
                        <p class="text-center griz fwl pt-3"> Con este código de identificación de su nuevo contrato. </p>
                        <p class="text-center griz fwl pt-3"> Empléelo para referir usuarios al mismo. </p><br>
                        <p class="text-center text-orange_perso"><strong># 123456789-AG</strong></p>
                        <hr class="space-blue-midle w-50">
                        <p class="text-center text-orange_perso"><strong>COPIAR</strong></p>
                        <hr class="space-blue-midle w-50">
                        <p class="text-center griz fwl pt-3"> Genere la dirección para hacer su inversión en Bitcoin Cash </p><br>
                        <div class="col-md-12 text-center">
                            <button type="button" class="box azulbg w-50 pt-3 mb-3 pb-3 text-white text-center">
                                Generar dirección de pago
                            </button>
                        </div>
                        <p class="text-center griz fwl pt-3"> Usted Invertirá 0,12345678 BCH </p>
                        <p class="text-center griz fwl pt-3"> Realice su pago a la siguiente dirección: </p>
                        <p class="text-center text-orange_perso pt-3"> <strong>abc123ABC123abc123ABC123</strong> </p>
                        <hr class="space-gray-midle w-50">
                        <p class="text-center griz fwl pt-3"> COPIAR </p>
                        <hr class="space-blue-midle w-50">

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
        $("#investment").last().addClass("active");
    </script>
</html>
