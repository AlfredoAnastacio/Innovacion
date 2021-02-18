<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Árbol</title>
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
    <h1  class="mx-auto mt-6">Árbol</h1>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="btn-group" role="group">
        <a href="{{url('admin/users')}}">  <button type="button" class="btn bg-primary btn-wide"><i class="fa fa-arrow-left"></i>Volver</button></a>
      
    </div>
</nav>


                <div class="contenido pt-5 ">
                   
                        <div class="chart" id="custom-colored"> --@-- </div>
                   
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

<script src="{{asset('js/custom-admin.js')}}"></script>
<script>
    new Treant( chart_config );
</script>


<script type="text/javascript">
   


        
             
            
             
    $("#tree").last().addClass("active");
     
    
     
    
              
    
    </script>

</html>
