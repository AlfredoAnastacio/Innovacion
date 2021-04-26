<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>INNOVACIÓN FINANCIERA | Invertir</title>
    <link rel="shortcut icon" href="{{ asset('images/fav_ico.png') }}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css" media="screen">

    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-dark sticky-top bg-blue2 flex-md-nowrap p-0 shadow">
    <div class="spacer">
    </div>
    <h1 class="mx-auto mt-5">Invertir</h1>
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
                        <p class="text-center mt-n2 griz">1. Seleccione la estructura en la que invertirá</p>

                        <form role="form" method="POST" action="/pays" enctype="multipart/form-data">
                            <div class="form-group">
                               <select class="custom-select griz">
                                  <option selected>Estructura #1</option>
                                  <option value="1">Estructura #2</option>
                                  <option value="2">Estructura #3</option>
                                  <option value="3">Estructura #4</option>
                               </select>
                            </div><br><br>
                            <p class="text-center mt-n2 griz">2. Seleccione el medio para invertir</p>
                            <button class="box azulbg w-100 pt-3 mb-3 pb-3 text-white text-center">
                                Cargar comprobante de inversión
                            </button>
                            <p class="text-center mt-n2 griz">Suba el comprobante de pago de su inversión</p>
                            <h5 class="text-center mt-n2 griz">Ó</h5>
                            <h5 class="text-center mt-n2 griz">Haga su pago en Etherum</h5>
                            <img class="mx-auto d-block mt-1 pt-2 mb-3" src="{{asset('images/BitcoinWallet.png')}}">

                            <div class="form-group">
                                <select class="custom-select griz">
                                   <option selected>US $15  Rango Plata</option>
                                   <option value="1">US $60  Rango Oro</option>
                                   <option value="2">US $150  Rango Platino</option>
                                   <option value="3">US $300  Rango Diamante</option>
                                </select>
                            </div>

                            <p class="text-center son-bitcoin">Son 0,0013 Etherums</p>
                            <button class="box azulbg w-100 pt-3 mb-3 pb-3 text-white text-center">
                                <a  href="https://bitinvoice.innovacionfd.com/buy.php?id={{Auth::id()}}">Generar dirección de pago</a>
                              </button>
                            <h5 class="text-center griz">Envio a la siguiente dirección </h5>
                            <input class="w-100 text-center orange border-top-0 border-right-0 border-left-0" type="text" value="abc123ABC123abc123ABC123abc123ABC12" name="">
                            <p class="text-center">Recuerde que esta dirección es única<br>para esta transacción</p>
                            <img class="mx-auto d-block my-4" src="{{asset('images/qr.png')}}">
                            <p class="text-center mt-2 mb-5 pb-5">Si lo prefiere escanee el código QR</p>
                        </form>
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
    <script>
        window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script> -->
    <script src="{{asset('js/dashboard.js')}}"></script>
</body>
    <script type="text/javascript">
        $("#investment").last().addClass("active");
    </script>
</html>
