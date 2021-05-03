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
                        {{-- <form method="POST" action="{{ url('payform/' ) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data"> --}}
                            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-3">
                                <div class="">
                                    <div class="contenido">
                                        <p class="text-center fw">Inscriba canal para recibir sus pagos</p>
                                        <p class="text-center fwl">Seleccione un único medio para recibir los pagos de su rentabilidad</p>
                                        <div class="cuenta mx-auto editar">
                                            <button class="box azulbg w-100 pt-3 pb-3 mt-4 text-white text-center">
                                                <a href="{{ url('payment/method/efecty') }}"><img src="{{ asset('../images/efecty-blanco.png') }}"></a>
                                            </button>
                                            <button class="box azulbg w-100 pt-3 pb-3 mt-4 text-white text-center">
                                                <img src="{{ asset('../images/cuenta-bancaria.png') }}" class="cb"><a href="{{ url('payment/method/bankAccount') }}" class="pagos">CUENTA BANCARIA</a>
                                            </button>
                                            <button class="box azulbg w-100 pt-3 pb-3 mt-4 text-white text-center">
                                                <img src="{{ asset('../images/billetera-virtual.png') }}" class="cb"><a href="#" class="pagos">BILLETERA VIRTUAL</a>
                                            </button>
                                            <div class="spacer m-5 p-5"></div>
                                        </div>
                                    </div>
                                </div>
                            </main>
                        {{-- </form> --}}
                        @if(isset($error_sponsor))
                            <div class="alert alert-danger" role="alert">
                                <li>{{$error_sponsor}} </li>
                            </div>
                        @endif
                        @if(count($errors) > 0)
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach($errors as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
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
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
    <script type="text/javascript">
        $("#pay").last().addClass("active");
    </script>
    <script type="text/javascript">
        $(function() {
            $(".progress").each(function() {
                var value = $(this).attr('data-value');
                var left = $(this).find('.progress-left .progress-bar');
                var right = $(this).find('.progress-right .progress-bar');

                if (value > 0) {
                    if (value <= 50) {
                        right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
                    } else {
                        right.css('transform', 'rotate(180deg)')
                        left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
                    }
                }
            });
            function percentageToDegrees(percentage) {
                return percentage / 100 * 360
            }
        });
    </script>
</html>
{{-- <!doctype html>
<html lang="es">
    <head>
        <title>INNOVACIÓN FINANCIERA | Registro de canal de pago</title>
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
    </head>
    <body>
        <div class="container-fluid inscripcion">
            <div class="row d-flex justify-content-center align-items-center campos">
                <section role="main" class="col-12  align-content-between">
                    <img class="mx-auto d-block " src="{{asset('images/LogoAzul.png')}}">
                    <div class=" pt-5 ">
                        <div class="cuenta mx-auto">
                            <form method="POST" action="{{ url('payform/' ) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @include ('User.payform', ['formMode' => 'create'])
                            </form>

                            <p class="foot griz text-center">Innovación Financiera Digital . Copyright 2020</p>
                        </div>
                        @if(isset($error_sponsor))
                            <div class="alert alert-danger" role="alert">
                                <li>{{$error_sponsor}} </li>
                            </div>
                        @endif
                        @if(count($errors) > 0)
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach($errors as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </section>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script>
            window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
        </script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/dashboard.js') }}"></script>
    </body>
    <script type="text/javascript">
        $(function() {
            $(".progress").each(function() {
                var value = $(this).attr('data-value');
                var left = $(this).find('.progress-left .progress-bar');
                var right = $(this).find('.progress-right .progress-bar');

                if (value > 0) {
                    if (value <= 50) {
                        right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
                    } else {
                        right.css('transform', 'rotate(180deg)')
                        left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
                    }
                }
            });
            function percentageToDegrees(percentage) {
                return percentage / 100 * 360
            }
        });
    </script>
</html> --}}
