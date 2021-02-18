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
                <div class="contenido pt-5 ">
                   
                        <div class="chart" id="custom-colored"> --@-- </div>
                   
                </div>
            </div>
        </main>
        <footer class="p-md-3 azulbg fixed-bottom text-center">
            <p class="text-white p-1 mb-0">Innovación Financiera Digital . Copyright 2020</p>
        </footer>
    </div>
</div>

<div id="refers" data-field-id="{{$array}}"></div>
<div id="amount" data-field-id="{{$amount}}"></div>





<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>
    window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
</script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('js/dashboard.js')}}"></script>
</body>

<script src="{{asset('js/raphael.js')}}"></script>
<script src="{{asset('js/Treant.js')}}"></script>

<script src="{{asset('js/custom-colored.js')}}"></script>
<script>
    new Treant( chart_config );
</script>


<script type="text/javascript">
   


        
             
            
             
    $("#tree").last().addClass("active");
     
    
     
    
              
    
    </script>

</html>
