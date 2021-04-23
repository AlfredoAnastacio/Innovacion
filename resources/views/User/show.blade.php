<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>INNOVACIÓN FINANCIERA | Perfil</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
    <link href="{{ asset('css/Treant.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom-colored.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark sticky-top bg-blue2 flex-md-nowrap p-0 shadow">
        <div class="spacer">
        </div>
        <h1 class="mx-auto mt-5">Perfil</h1>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <div class="container-fluid">
        <div class="row mainrow">
            <nav id="sidebarMenu" class="col-md-4 col-lg-3 d-md-block bg-light sidebar collapse">
                <div class="logoimg">
                    <img class="img-fluid" src="{{ asset('../images/LogoAzul.png') }}">
                </div>
               @include('layouts.navbar')
                <div class="abajo text-center ">
                    <p class="text-white">Juan Carlos Gonzalez</p>
                    <p class="footer blue p-1">Innovación Financiera Digital . Copyright 2021</p>
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-3">
                <div class="">
                    <div class="contenido pt-5 ">
                        <div class="perfil">
                            <div class="chart" id="custom-colored"> --@-- </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="p-md-3 azulbg fixed-bottom text-center">
                <p class="text-white p-1 mb-0">Innovación Financiera Digital . Copyright 2021</p>
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
        $("#perfil").last().addClass("active");
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
    <script src="{{ asset('js/raphael.js') }}"></script>
    <script src="{{ asset('js/Treant.js') }}"></script>
    <script src="{{ asset('js/custom-colored.js') }}"></script>
    <script>
        new Treant( chart_config );
    </script>
</html>
