<?php
/* Payment page
    This code is designed to be easily understandable at the expense of speed, for large productions this can be done with one sql request, instead of several */

// Status translation

$statusval = $status;
$info = "";
if($status == 0){
    $status = "<span style='color: orangered' id='status'>PENDING</span>";
    $info = "<p>You payment has been received. Invoice will be marked paid on two blockchain confirmations.</p>";
}else if($status == 1){
    $status = "<span style='color: orangered' id='status'>PENDING</span>";
    $info = "<p>You payment has been received. Invoice will be marked paid on two blockchain confirmations.</p>";
}else if($status == 2){
    $status = "<span style='color: green' id='status'>PAID</span>";
}else if($status == -1){
    $status = "<span style='color: red' id='status'>UNPAID</span>";
}else if($status == -2){
    $status = "<span style='color: red' id='status'>Too little paid, please pay the rest.</span>";
}else {
    $status = "<span style='color: red' id='status'>Error, expired</span>";
}


?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>INNOVACIÓN FINANCIERA | BCH Address Payment</title>
    <link rel="shortcut icon" href="{{ asset('images/fav_ico.png') }}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css" media="screen">

    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
</head>
<body>
    <!-- Invoice -->
    <div class="container-fluid inscripcion">
        <div class="row d-flex justify-content-center align-items-center campos">
            <section role="main" class="col-12 h-75 align-content-between">
                <img class="mx-auto d-block" src="{{asset('images/LogoAzul.png')}}">
                <div class=" pt-5 mt-5 d-block" style="text-align:center">
                    <h4 style="width:100%; font-size:50px;"> Pago Bitcoin Cash </h4><br>
                    <h4>Por favor pague <strong> {{ $valueBCH }} </strong> BCH a la dirección: <strong> {{ $address }} </strong></h4><br>
                    <?php
                        // QR code generation using google apis
                        $cht = "qr";
                        $chs = "400x400";
                        $chl = $address;
                        $choe = "UTF-8";

                        $qrcode = 'https://chart.googleapis.com/chart?cht=' . $cht . '&chs=' . $chs . '&chl=' . $chl . '&choe=' . $choe;
                    ?>
                    <div class="qr-hold">
                        <img src="<?php echo $qrcode ?>" alt="My QR code" style="width:350px;">
                    </div><br><br>
                    {{-- <a type="button" class="btn btn-info btn-lg" href="http://innovacion.test">Volver</a><br> --}}
                    <a type="button" class="btn btn-info" href="https://innovacionfd.com">Volver</a>
                </div>
            </section>
            <p class="foot text-center griz">Innovación Financiera Digital . Copyright 2021</p>
        </div>
    </div>

    <script>
        var status = {{ $status }};
        var price = {{ $valueBCH }};
        var idUser = {{ $user_id }};

        // Create socket variables
        if(status < 2 && status != -2){
        var addr =  document.getElementById("address").innerHTML;

        var timestamp = Math.floor(Date.now() / 1000)-5;
        var wsuri2 = "wss://bch.blockonomics.co/payment/"+ addr+"?timestamp="+timestamp;
        // Create socket and monitor
        var socket = new WebSocket(wsuri2)
            socket.onmessage = function(event){
                response = JSON.parse(event.data);
                //Refresh page if payment moved up one status
                if (response.status >= 0 && parseInt(response.value) >= parseInt(price*100000000)) {
                    window.location='https://innovacionfd.com/paybtc/'+ idUser;
                } else {
                    if(response.status == -2 || parseInt(response.value) < parseInt(price*100000000)){
                        alert('La cantidad transferida no es suficiente u ocurrió un error')
                    }
                }
            }
        }
    </script>
    <!-- Bootstrap JS -->
    // <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper.min.js')}}" ></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    // <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    // <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> --}}
</body>
</html>
