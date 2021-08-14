<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>INNOVACIÓN FINANCIERA | CANAL DE PAGO</title>
    <link rel="shortcut icon" href="{{ asset('images/fav_ico.png') }}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css" media="screen">

    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark sticky-top bg-blue2 flex-md-nowrap p-0 shadow">
        <div class="spacer"></div>
        <h1 class="mx-auto mt-7"> CANAL DE PAGO</h1>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <div class="container-fluid">
        <div class="row mainrow">
            @include('layouts.navbar')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-3">
                <div class="container-fluid px-3 px-md-0">
                    <div class="row mt-1">
                        <div class="col-sm-12 col-md-6 col-lg-5 mx-auto text-center">
                            <!-- apartado -->
                            <div class="">
                                <h2 class="text-primary text-uppercase font-weight-bold">TUS DATOS HAN SIDO INSCRITOS</h2>
                                <p>Recibirás tus pagos por medio de</p>
                                <h5 class="text-primary text-uppercase font-weight-bold">billetera virtual</h5>

                                <div class="input-group mb-2 mr-sm-2 border rounded">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-white border-0 p-1">
                                            <img class="b-block"src="{{asset('images/billetera_virtual_azul.png')}}">
                                        </div>
                                    </div>
                                    <input type="text" value="{{ $wallet }}" class="form-control bg-light text-center bg-white border-0 p-4" disabled>
                                </div>

                                <small class="text-white">Esta es la dirección de tu billetera vitual inscrita</small class="text-dark">
                                <div class="border border-dark mt-5 rounded bg-white div-section-basic">
                                    <p>
                                        - Recibirás todos los pagos por rentabilidad y de lider innnovador
                                        a la billetera virtual que tienes inscrita. <br><br>
                                        -Mantén seguros los datos de acceso a tu billetera una vez realizado
                                        un pago es imposible reversar el mismo. <br><br>
                                        - Si quieres editar los datos de tu billetera virtual comunicate con nuestro
                                        equipo de soporte. <br><br>
                                        - Recuerda que no tenemos acceso a tu billetera, esta funciona como una cuenta
                                        bancaria  y el único dato que nos proporcionas es la dirección para poder realizar los pagos.
                                    </p>
                                </div><br>
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
    <script>
        $(document).ready(function(){
            $("#error-alert").fadeTo(2000, 500).slideUp(500, function(){
                $("#error-alert").slideUp(500);
            });
        });
    </script>
    <script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
    <script>
        window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script type="text/javascript">
        $("#pay").last().addClass("active");
    </script>
</body>
</html>
