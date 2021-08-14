<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>INNOVACIÓN FINANCIERA | Registro de canal de pago</title>
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
                <div class="">
                    <div class="contenido pt-5 ">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger error-alert" role="alert">
                                <ul>
                                    @foreach($errors as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h1 class="text-center azul pb-3 imgbv"><b>BILLETERA VIRTUAL</b></h1>
                        <p class="text-center mt-1 fw"><b>Ingrese los datos requeridos para inscribir<br>su billetera virtual como su canal de pago. <br>Recuerde que el pago se realiza en Etherum<br>y su billetera debe ser compatible con <br> esta moneda digital.</b></p>
                        <p class="text-center griz fwl pt-3">Envio a la siguiente dirección</p>
                        <div class=" ">
                            @if ($wallet)
                                <div class="cuenta mx-auto">
                                    <div class="row px-3 mb-4 burbuja mx-1 imp-shadow">
                                        <div class="col-2 text-center px-0  pt-1"><img class="align-middle img-fluid" src="{{ asset('images/billetera_virtual_azul.png') }}"></div>
                                        <div class="col-10">
                                            <input type="text" class="griz mb-0 border-0 fwl p-13 col-md-12" name="ewallet" value="{{ $wallet }}" disabled>
                                        </div>
                                    </div>
                                    <p class="text-center griz pt-3 fwl"> <strong> Ya tiene registrada una dirección. </strong></p><br>

                                </div>
                            @else
                            <form method="POST" action="{{ route('wallet.store') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                    <div class="cuenta mx-auto">
                                        <div class="row px-3 mb-4 burbuja mx-1 imp-shadow">
                                            <div class="col-2 text-center px-0  pt-1"><img class="align-middle img-fluid" src="{{ asset('images/billetera_virtual_azul.png') }}"></div>
                                            <div class="col-10">
                                                <input type="text" class="griz mb-0 border-0 fwl p-13 col-md-12" name="ewallet" placeholder="Dirección de su billetera virtual" required>
                                            </div>
                                        </div>
                                        <p class="text-center griz pt-3 fwl">Recuerde verificar los datos que ingresa antes de inscribirlos</p>
                                        <button type="submit"class="box azulbg w-100 pt-2 mb-3 py-2  text-white text-center">INSCRIBIR BILLETERA VIRTUAL</button>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="contenido pt-5 ">
                        <div class="cuenta mx-auto editar">
                            <div class="spacer m-5 p-5"></div>
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
