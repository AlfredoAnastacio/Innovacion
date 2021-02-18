<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Innovación Financiera</title>

    <style type="text/css">
      .container .main #form1 center p {
        font-family: Segoe, Segoe UI, DejaVu Sans, Trebuchet MS, Verdana, sans-serif;
      }
      .container .main center p {
        font-family: Segoe, Segoe UI, DejaVu Sans, Trebuchet MS, Verdana, sans-serif;
      }
      </style>
      <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>


  <div class="container">
    <header class="header">

    </header>
      <p><center>
      <main class="main">
      <center>
      <p><img src="images/logo.png" width="266" height="78" alt=""/></p></center>
            <form method="POST" action="{{ route('login') }}" id="form1" name="form1">
            @csrf
        <center><p class="singa">INICIAR SESIÓN</p></center>
  <p>
         <center>
          <input name="email" type="email" required="required" class="mail" id="email" placeholder="Correo electrónico"> </center>
        </p>
        <p>
         <center><input name="password" type="password" required="required" class="pass" id="password" placeholder="Tu Contraseña"></center>
      </p>
        <p>
         <center>
            <button type="submit" class="sing">
                {{ __('Login') }}
            </button>

         </center>



        </p>
      </form>
     <center> <p class="forget">¿Olvidaste tu contraseña?</p>
      <p class="forget">Restaurala <a href="">aquí.</a></p>

      <center>
        <p class="forget">Registro <a href="{{route('register')}}">aquí.</a></p>
     </center>
    </main>
  </div>

</body>
</html>
