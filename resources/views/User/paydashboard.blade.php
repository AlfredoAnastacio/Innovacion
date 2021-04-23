<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Perfil</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css" media="screen">

    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-dark sticky-top bg-blue2 flex-md-nowrap p-0 shadow">
    <div class="spacer">
    </div>
    <h1 class="mx-auto mt-5">PERFIL</h1>
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

                        <div class="row px-3 mb-4">

                            <div class="col-2 text-center px-0  pt-1"><img class="align-middle img-fluid" src="{{asset('images/people-blue.png')}}"></div>



                            <div class="col-10"><h5 class="griz mb-0"> {{$data->entity}}</h5>Entidad financiera </div>


                        </div>
                        <div class="row px-3 mb-4">

                            <div class="col-2 text-center px-0  pt-1"><img class="align-middle img-fluid" src="{{asset('images/avatar.png')}}"></div>
                            <div class="col-10"><h5 class="griz mb-0">{{$data->number}}</h5> Número/Dirección</div>

                        </div>

                        <div class="row px-3 mb-4">

                            <div class="col-2 text-center px-0  pt-1"><img class="align-middle img-fluid" src="{{asset('images/avatar.png')}}"></div>
                            <div class="col-10"><h5 class="griz mb-0">{{$data->document}}</h5> Documento</div>

                        </div>
                        <div class="row px-3 mb-4">

                            <div class="col-2 text-center px-0  pt-1"><img class="align-middle img-fluid" src="{{asset('images/card.png')}}"></div>
                            <div class="col-10"><h5 class="griz mb-0">{{$data->type}}</h5> Tipo de cuenta</div>

                        </div>





                        <button class="box azulbg w-100 pt-3 mb-3 pb-3 mt-5 text-white text-center" role="button">


                            <a href="{{ url('payform/'. Auth::id()) . '/edit' }}" class="box azulbg w-100 pt-3 mb-3 pb-3 mt-5 text-white text-center" role="button">

                                Editar
                            </a>

                        </button>

                        <div class="spacer m-5 p-5"></div>

                    </div>

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
    window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
</script>
<script src="js/bootstrap.bundle.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script> -->
<script src="{{asset('js/dashboard.js')}}"></script>
</body>


<script type="text/javascript">







    $("#pay").last().addClass("active");






    </script>
</html>
