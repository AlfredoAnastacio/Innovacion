<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Invertir</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

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



                            <h1 class="text-center azul pb-3"><b>GRACIAS POR SU<br>INVERSIÓN</b></h1>

                            <div class="arco azulbg mt-2 p-2"></div>
                            <div class="row mb-4 scuare ml-0 mr-0">
                                <div class="col-12 borde text-center pt-2 border-right-0">
                                    <img src="{{asset('images/inversion.png')}}">
                                    <h2 class="pt-2 mb-1 griz"><b>US {{$pay}}</b></h2>
                                    <h5 class="griz">INVERSION</h5>
                                </div>

                            </div>

                            <h1 class="text-center azul pb-3"><b>YA PUEDES REFERIR
CON TÚ NÚMERO DE
USUARIO {{$user_id}}</b></h1>








                            <button class="box azulbg w-100 pt-3 mb-3 pb-3 text-white text-center ">
                                VER TU CUENTA

                            </button>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="../js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script> -->
    <script src="{{asset('js/dashboard.js')}}"></script>
</body>


</html>
