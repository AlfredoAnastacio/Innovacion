<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>invertir</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css" media="screen">

    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-dark sticky-top bg-blue2 flex-md-nowrap p-0 shadow">
    <div class="spacer">
    </div>
    <h1 class="mx-auto mt-5">Invertir</h1>
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

                        <form role="form" method="POST" action="/pays" enctype="multipart/form-data">
                            @csrf


                            <h5 class="text-center griz">Total a invertir: $ {{$total_pay}} COP</h5>
                            <div class="form-group row">

                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image" required>
                                    <label class="custom-file-label" for="customFile">Subir comprobante</label>
                                  </div>
                            </div>
                           
                                    <button type="submit" class="box azulbg w-100 pt-3 mb-3 pb-3 text-white text-center">
                                        Cargar comprobante de inversión
                                    </button>
                             
                        </form>
                       


                        <p class="text-center mt-n2 griz">Suba el comprobante de pago de su inversión</p>
                        <h5 class="text-center mt-n2 griz">Ó</h5>
                        <h5 class="text-center mt-n2 griz">Haga su pago en Bitcoin</h5>
                        <img class="mx-auto d-block mt-1 pt-2 mb-3" src="{{asset('images/BitcoinWallet.png')}}">

                  


                        <button class="box azulbg w-100 pt-3 mb-3 pb-3 text-white text-center">
                            <a href="https://bitinvoice.innovacionfd.com/buy.php?id={{Auth::id()}}">Generar dirección de pago</a>
  
                          </button>




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
<script src="js/bootstrap.bundle.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script> -->
<script src="{{asset('js/dashboard.js')}}"></script>
</body>



<script type="text/javascript">
   


        
             
            
             
    $("#investment").last().addClass("active");
     
    
     
    
              
    
    </script>

</html>
