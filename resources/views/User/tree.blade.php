<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Perfil</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css" media="screen">

    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/Treant.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom-colored.css')}}">
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
     
        @include('layouts.navbar')
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-3">
            <div class="">
                <div class="contenido pt-5 ml-5 ">
                   
                    @for ($i=1 ; $i <= $sponsorTree; $i++ )
    
                    <a href="{{ url('refers/' .$i ) }}" class="box azulbg w-100  pt-3 mb-3 pb-3 text-white text-center tree" role="button">
                        
                       Ver árbol {{$i}}
                    </a>
                    
                    
                    @endfor
                    
                   
                </div>
            </div>
        </main>
        <footer class="p-md-3 azulbg fixed-bottom text-center">
            <p class="text-white p-1 mb-0">Innovación Financiera Digital . Copyright 2020</p>
        </footer>
    </div>
</div>





<script type="text/javascript">
   


        
             
            
             
    $("#tree-user").last().addClass("active");
     
    
     
    
              
    
    </script>

</html>
