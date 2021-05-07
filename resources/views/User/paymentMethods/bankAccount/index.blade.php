<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>INNOVACIÓN FINANCIERA | Bank Account </title>
    <link rel="shortcut icon" href="{{ asset('images/fav_ico.png') }}">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark sticky-top bg-blue2 flex-md-nowrap p-0 shadow">
        <div class="spacer"></div>
        <a class="flecha-atras" href="{{ url('payform/create') }}"><img src="{{ asset('images/regresar.png') }}"></a>
        <h1 class="mx-auto mt-7">PAGOS</h1>
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
                        <h1 class="text-center azul pb-3 imgcb"><b>CUENTA BANCARIA</b></h1>
                        <p class="text-center mt-2 fw"><b>Ingrese los datos requeridos para inscribir una<br>cuenta bancaria como su canal de pago</b></p>

                        <div class="cuenta mx-auto">
                            <form>
                              <div class="form-group">
                                 <select class="custom-select select1 griz">
                                    <option selected>Seleccione Banco</option>
                                    <option value="1">Banco de </option>
                                 </select>
                              </div>
                            </form>
                            <form>
                              <div class="form-group">
                                 <select class="custom-select select1 griz">
                                    <option selected>Seleccione Tipo de Cuenta</option>
                                    <option value="1">Ahorros</option>
                                    <option value="2">Corriente</option>
                                    <option value="3">Otros</option>
                                 </select>
                              </div>
                            </form>
                        </div>
                        <div class=" ">
                        <div class="cuenta mx-auto">
                            <div class="row px-3 mb-4 burbuja mx-1 imp-shadow">
                                <div class="col-2 text-center px-0  pt-1"><img class="align-middle img-fluid" src="{{ asset('images/numero-cuenta-azul.png') }}"></div>
                                <div class="col-10"><input type="text" class="griz mb-0 border-0 fwl pt-2 mt-2" name="" value="" placeholder="Número cuenta bancaria"> </div>
                            </div>
                            <div class="row px-3 mb-4 burbuja mx-1 imp-shadow">
                                <div class="col-2 text-center px-0  pt-1"><img class="align-middle img-fluid" src="{{ asset('images/avatar.png') }}"></div>
                                <div class="col-10"><input type="text" class="griz mb-0 border-0 fwl pt-2 mt-2" name="" value="" placeholder="Nombre del titular"> </div>
                            </div>
                            <div class="cuenta mx-auto">
                                <form>
                                  <div class="form-group">
                                     <select class="custom-select select1 griz">
                                        <option selected>Seleccione Tipo de Documento</option>
                                        <option value="1">V</option>
                                        <option value="2">E</option>
                                        <option value="3">J</option>
                                     </select>
                                  </div>
                                </form>
                            </div>
                            <div class="row px-3 mb-4 burbuja mx-1 imp-shadow">
                                <div class="col-2 text-center px-0  pt-1"><img class="align-middle img-fluid" src="{{ asset('images/card.png') }}"></div>
                                <div class="col-10"><input type="text" class="griz mb-0 border-0 fwl pt-2 mt-2" name="" value="" placeholder="Número de documento"> </div>
                            </div>
                            <div class="row px-3 mb-4 burbuja mx-1 imp-shadow">
                                <div class="col-2 text-center px-0  pt-1"><img class="align-middle img-fluid" src="{{ asset('images/phone.png') }}"></div>
                                <div class="col-10"><input type="text" class="griz mb-0 border-0 fwl pt-2 mt-2" name="" value="" placeholder="Número de teléfono"> </div>
                            </div>

                            <p class="text-center griz fwl">Recuerde verificar los datos que ingresa antes de inscribirlos</p>

                            <button class="box azulbg w-100  mb-3 py-2  text-white text-center">INSCRIBIR CUENTA BANCARIA</button>
                        </div>
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
    <script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
    <script>
        window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
    <script type="text/javascript">
        $("#pay").last().addClass("active");
    </script>
</html>