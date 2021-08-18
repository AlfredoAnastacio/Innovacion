<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>INNOVACIÓN FINANCIERA | Perfil</title>
    <link rel="shortcut icon" href="{{ asset('images/fav_ico.png') }}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
     <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
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
                            <h6 class="text-center text-uppercase azul"><b>{{Auth::user()->name}}</b></h6>
                            <div class="nivel">
                                <div class="row">
                                    <div class="col-9 pr-0">
                                        <h6 class="usuario azul pt-1"><b># USUARIO: {{Auth::user()->user_id}}</b></h6>
                                        <hr class="azul">
                                    </div>
                                    <div class="col-3 text-center">
                                        <h3 class="pt-1 mb-1 griz"><b> 0 </b></h3>
                                        <p style="margin: auto;"> Contratos </p>
                                        <p>Activos</p>
                                    </div>
                                </div>
                                <section class="mt-2 d-flex justify-content-center">
                                    <form id="form-important" style="width: 90%;" autocomplete="off">

                                        <div class="input-group text-left border mb-2 input-tree-personal row justify-content-center bg-white">
                                            <div class="col-3 row justify-content-center align-items-center">
                                                <img class="img-fluid" src="{{ asset('../images/contratopatrocinador.png') }}">
                                            </div>
                                            <div class="col-9 row m-0 p-0">
                                                <div class="col-12 m-0 p-0">
                                                    <input type="text" class="form-control w-100 border-0 bg-white" value="{{ $contract }}" disabled>
                                                </div>
                                                <div class="col-12 m-0 p-0">
                                                    <small>Contrato del patrocinador</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group text-left border mb-2 input-tree-personal row justify-content-center bg-white">
                                            <div class="col-3 row justify-content-center align-items-center">
                                                <img class="align-middle img-fluid" src="{{asset('images/avatar.png')}}">
                                            </div>
                                            <div class="col-9 row m-0 p-0">
                                                <div class="col-12 m-0 p-0">
                                                    <input type="text" class="form-control w-100 border-0 bg-white" value="{{ $user->name }}" disabled>
                                                </div>
                                                <div class="col-12 m-0 p-0">
                                                    <small>Nombre</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="input-group text-left border  mb-2 input-tree-personal bg-white row justify-content-center">
                                            <div class="col-3 row justify-content-center align-items-center">
                                                <img class="align-middle img-fluid" src="{{asset('images/card.png')}}">
                                            </div>
                                            <div class="col-9 row m-0 p-0">
                                                <div class="col-12 m-0 p-0">
                                                    <input type="text" class="form-control w-100 border-0 bg-white" value="{{ $user->document }}" disabled>
                                                </div>
                                                <div class="col-12 m-0 p-0">
                                                    <small>Número de documento</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="input-group text-left border  mb-2 input-tree-personal bg-white row justify-content-center">
                                            <div class="col-3 row justify-content-center align-items-center">
                                                <img class="align-middle img-fluid" src="{{asset('images/phone.png')}}">
                                            </div>
                                            <div class="col-9 row m-0 p-0">
                                                <div class="col-12 m-0 p-0">
                                                    <input type="tel" class="form-control w-100 border-0 bg-white" value="{{ $user->telephone }}" disabled>
                                                </div>
                                                <div class="col-12 m-0 p-0">
                                                    <small>Teléfono</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="input-group text-left border  mb-2 input-tree-personal bg-white row justify-content-center">
                                            <div class="col-3 row justify-content-center align-items-center">
                                                <img class="align-middle img-fluid" src="{{asset('images/mail.png')}}">
                                            </div>
                                            <div class="col-9 row m-0 p-0">
                                                <div class="col-12 m-0 p-0">
                                                    <input type="mail" class="form-control w-100 border-0 bg-white" value="{{ $user->email }}" disabled>
                                                </div>
                                                <div class="col-12 m-0 p-0">
                                                    <small>Correo electrónico</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="input-group text-left border  mb-2 input-tree-personal bg-white row justify-content-center">
                                            <div class="col-3 row justify-content-center align-items-center">
                                                <img class="align-middle img-fluid" src="{{asset('images/lock.png')}}">
                                            </div>
                                            <div class="col-9 row m-0 p-0">
                                                <div class="col-12 m-0 p-0">
                                                    <input type="password" class="form-control w-100 border-0 bg-white" value="***************" disabled>
                                                </div>
                                                <div class="col-12 m-0 p-0">
                                                    <small>Contraseña</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group text-left border  mb-2 input-tree-personal bg-white row justify-content-center">
                                            <button class="box azulbg w-100 pt-2 py-2 text-white text-center"> Editar datos </button>
                                        </div><br><br>
                                    </form>
                                </section>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <footer class="p-md-3 azulbg fixed-bottom text-center">
            <p class="text-white p-1 mb-0">Innovación Financiera Digital . Copyright 2020</p>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
    <script type="text/javascript">
        $("#perfil").last().addClass("active");
    </script>
</html>
</html>
