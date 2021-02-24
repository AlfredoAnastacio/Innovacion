
<html>
    <head>
        <title>INNOVACIÓN FINANCIERA | Registro de canal de pago</title>
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








        <form method="POST" action="{{ route('payFormCreate') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
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

    </body>
</html>
