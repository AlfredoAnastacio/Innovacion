<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Salida</title>
    <link rel="shortcut icon" href="{{ asset('images/fav_ico.png') }}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
</head>

<body>

    <div class="container-fluid inscripcion">
        <div class="row d-flex justify-content-center align-items-center campos">

            <section role="main" class="col-12 h-75 align-content-between">
                <img class="mx-auto d-block mb-5 pb-5" src="{{asset('images/LogoAzul.png')}}">
                <div class=" pt-5 mt-5 d-block">
                    <h3 class="text-center mt-5 "><b>GRACIAS POR SU<br>INSCRIPCIÓN</b></h3>
                     <p class="text-center mt-5 griz">En 5 segundos seras redirigido para<br>que ingreses a la plataforma</p>
                     <p class="text-center mt-5  griz">Si no redirecciona <a href="{{url('login/')}}">ingresa aquí</a></p>
                    </div>
            </section>
            <p class="foot text-center griz">Innovación Financiera Digital . Copyright 2020</p>
        </div>
    </div>
</body>

<script type="text/javascript">
    setTimeout(function () {
   window.location = "login/";
}, 5000);
</script>

</html>
