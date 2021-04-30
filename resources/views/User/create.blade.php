<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Inscripcion</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>

<body>

    <div class="container-fluid inscripcion">
        <div class="row d-flex justify-content-center align-items-center campos">

            <section role="main" class="col-12  align-content-between">
                <img class="mx-auto d-block " src="{{ asset('images/LogoAzul.png') }}">
                <div class=" pt-5 ">
                        <div class="cuenta mx-auto">
                            <form method="POST" action="{{ route('register') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}


                             <div class="row px-3 mb-4 burbuja mx-1 imp-shadow">

                                    <div class="col-2 text-center px-0  pt-1"><img class="align-middle img-fluid" src="{{ asset('images/people-blue.png') }}"></div>
                                    <div class="col-10">
                                        @if(!isset($referralCode))
                                            <input type="number" class="griz mb-0 border-0" name="sponsor_id" id="sponsor_id" placeholder="Número del Patrocinado" value="{{ request()->input('sponsor_id', old('sponsor_id'))}}" required>
                                        @else
                                            <input type="number" class="griz mb-0 border-0" name="sponsor_id" id="sponsor_id" placeholder="Número del Patrocinado" value="{{$referralCode}}" readonly>
                                        @endif
                                    </div>

                            </div>
                            <div class="row px-3 mb-4 burbuja mx-1 imp-shadow">
                                <div class="col-2 text-center px-0  pt-1"><img class="align-middle img-fluid" src="{{ asset('images/avatar.png') }}"></div>
                                <div class="col-10">
                                    <input name="name" id="name" type="text" class="griz mb-0 border-0" placeholder="Nombre" value="{{ request()->input('name', old('name'))}}" required>
                                </div>
                            </div>
                            <div class="row px-3 mb-4 burbuja mx-1 imp-shadow">
                                    <div class="col-2 text-center px-0  pt-1"><img class="align-middle img-fluid" src="{{ asset('images/card.png') }}"></div>
                                    <div class="col-10">
                                        {{--  <input type="text" class="griz mb-0 border-0" name="" value="" placeholder="Numero de documento" required>  --}}
                                        <input name="document" type="number" id="document" placeholder="Número de documento" class="griz mb-0 border-0" value="{{ request()->input('document', old('document'))}}" required>
                                    </div>

                            </div>
                            <div class="row px-3 mb-4 burbuja mx-1 imp-shadow">

                                    <div class="col-2 text-center px-0  pt-1"><img class="align-middle img-fluid" src="{{ asset('images/phone.png') }}"></div>
                                    {{--  <div class="col-10"><input type="text" class="griz mb-0 border-0" name="" value="" placeholder="Número de teléfono" required> </div>  --}}
                                    <input name="telephone" type="number" class="griz mb-0 border-0" id="telephone" placeholder="Número telefónico" value="{{ request()->input('telephone', old('telephone'))}}" required>

                            </div>
                            <div class="row px-3 mb-4 burbuja mx-1 imp-shadow">

                                    <div class="col-2 text-center px-0  pt-1"><img class="align-middle img-fluid" src="{{ asset('images/mail.png') }}"></div>
                                    <div class="col-10">
                                        {{--  <input type="text" class="griz mb-0 border-0" name="" value="" placeholder="Correo electrónico" required>  --}}
                                        <input name="email" type="email" required="required" class="griz mb-0 border-0" id="email" placeholder="Correo electrónico" value="{{ request()->input('email', old('email'))}}" required>
                                    </div>

                            </div>
                            <div class="row px-3 mb-4 burbuja mx-1 imp-shadow">

                                    <div class="col-2 text-center px-0  pt-1"><img class="align-middle img-fluid" src="{{ asset('images/lock.png') }}"></div>
                                    <div class="col-8">
                                        {{--  <input type="text" class="griz mb-0 border-0" name="" value="" placeholder="Contraseña" required>  --}}
                                        <input name="password" type="password" required="required" class="pass griz mb-0 border-0" id="password" placeholder="Crear contraseña"></div>
                                    <div class="col-2 text-center px-0  pt-1"><button type="button" class="border-0"><img class="align-middle img-fluid" src="{{ asset('images/eye.png') }}"></button></div>

                            </div>
                            <div class="row px-3 mb-4 burbuja mx-1 imp-shadow">

                                    <div class="col-2 text-center px-0  pt-1"><img class="align-middle img-fluid" src="{{ asset('images/lock.png') }}"></div>
                                    <div class="col-8">
                                        {{--  <input type="text" class="griz mb-0 border-0" name="" value="" placeholder="Confirmar contraseña" required>  --}}
                                        <input type="password" name="password_confirmation" class="pass griz mb-0 border-0" id="password_confirmation" placeholder="Confirmar contraseña" required>
                                    </div>
                                    <div class="col-2 text-center px-0  pt-1"><button type="button" class="border-0"> <img class="align-middle img-fluid" src="{{ asset('images/eye.png') }}"></button></div>

                            </div>



                            <button class="box azulbg w-100  mb-3 py-2  text-white text-center">Inscribirme
                            </button>

                            <p class="text-center griz">¿Ya tienes una cuenta? <br><a href="#">Ingresa aquí.</a></p>

                        </form>
                    </section><p class="foot griz text-center mb-0">Innovación Financiera Digital . Copyright 2020</p>
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

                </div>
            </div>
        </body>
</html>


{{--
<html>
    <head>
        <title>INNOVACIÓN FINANCIERA | Registro</title>
        <link rel="stylesheet" href="{{asset('css/dashboard.css')}} media="screen" ">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>

    <div class="container-fluid inscripcion">
        <div class="row d-flex justify-content-center align-items-center campos">

            <section role="main" class="col-12  align-content-between">
                <img class="mx-auto d-block " src="{{asset('images/LogoAzul.png')}}">
                <div class=" pt-5 ">
                        <div class="cuenta mx-auto">








        <form method="POST" action="{{ route('register') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}



            @include ('User.form', ['formMode' => 'create'])







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

    </body>
</html>  --}}










{{--
<html>
    <head>
        <title>INNOVACIÓN FINANCIERA | Registro</title>
        <link rel="stylesheet" href="{{asset('css/dashboard.css')}} media="screen" ">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>

    <div class="container-fluid inscripcion">
        <div class="row d-flex justify-content-center align-items-center campos">

            <section role="main" class="col-12  align-content-between">
                <img class="mx-auto d-block " src="{{asset('images/LogoAzul.png')}}">
                <div class=" pt-5 ">
                        <div class="cuenta mx-auto">








        <form method="POST" action="{{ route('register') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}



            @include ('User.form', ['formMode' => 'create'])







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

    </body>
</html>  --}}
