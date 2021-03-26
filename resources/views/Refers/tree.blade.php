<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Cuenta</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css" media="screen">

    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">

  
</head>
</head>

<body>
<nav class="navbar navbar-dark sticky-top bg-blue2 flex-md-nowrap p-0 shadow">
    <div class="spacer">
    </div>
    <h1 class="mx-auto mt-5">Cuenta
    <div class="input-group mx-auto">
        <input type="text" class="form-control" id="referralLink" readonly value="{{route('referral.link', ['referralCode' => Auth::id()])}} ">
    
        <div class="input-group-append">
            <button class="btn btn-sm btn-primary" onclick="copyReferralLink()">
                <i class="fa fa-copy"></i> Copiar
            </button>
        </div>
    </div>

</h1>
    
    @if(Auth::user()->isAdmin())
        <a href="{{ route('users.index') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Administrador</a>
    @endif
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
                      
                        <div class="row mb-5 pb-5">
                            <div class="col-md-12">
                                <table class="table table-striped text-center">

                                    <h2 class="text-center">
                                        ÁRBOL {{$tree}}
                                    </h2>
                                    <br>

                                    <tbody>
                                        @foreach ($refers as $refer )
                                        @foreach ($refer as $item )
                                    <tr>
                                        <th scope="row">
                                            <p class="mb-0"><b> {{$item->user_id}}</b></p>
                                            
                                        </th>
                                        
                                        <th scope="row">
                                            
                                            <p class="mb-0"><b> {{$item->user->username}}</b></p>
                                        </th>
                                     
                                    </tr>


                                  

                                    </tr>
                                    </tbody>
                                    @endforeach
                                    @endforeach

                                   

                                </table>
                            </div>
                        </div>
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
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script> -->
<script src="dashboard.js"></script>
</body>
<script type="text/javascript">
   


        
             
            
   $("#tree-user").last().addClass("active");
 


 

          

</script>
</html>
