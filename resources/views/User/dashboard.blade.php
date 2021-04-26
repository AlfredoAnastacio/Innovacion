<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Cuenta</title>
    <link rel="shortcut icon" href="{{ asset('images/fav_ico.png') }}">
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
                        <h6 class="text-center text-uppercase azul"><b>{{$user->name}}</b></h6>
                        <div class="nivel">
                            <div class="row">
                                <div class="col-9 pr-0">
                                    <h6 class="usuario azul pt-1"><b># USUARIO: {{$user->user_id}}</b></h6>
                                    <hr class="azul">
                                    <p class="patrocinador"># Patrocinador: {{$sponsor->sponsor_id}}</p>
                                </div>
                                <div class="col-3 text-center pl-0">
                                    <img class="" src="{{asset('images/rentabilidad.png')}}">
                                    <p class="text-center">{{$range->range}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <h6 class="text-center text-uppercase pt-3 mb-3 pb-3 azulbg text-white"><b>Tus inversiones</b>
                            </h6>
                        </div>
                        <div class="arco azulbg mt-2 p-2"></div>
                        <div class="row mb-4 scuare ml-0 mr-0">
                            <div class="col-6 borde text-center pt-2">
                                <img src="{{asset('images/inversion.png')}}">
                                <h2 class="pt-2 mb-1 griz"><b>US ${{$investments_total}}</b></h2>
                                <h5 class="griz">INVERSION</h5>
                            </div>
                            <div class="col-6 text-center pt-2">
                                <img src="{{asset('images/rentabilidad.png')}}">
                                <h2 class="pt-2 mb-1 griz"><b>US ${{$commissions_total}}</b></h2>
                                <h5 class="griz">RENTABILIDAD</h5>
                            </div>
                        </div>
                        <div class="red text-center">
                            <!-- Progress bar 1 -->
                            <div class="progress mx-auto " data-value='90'>
                                    <span class="progress-left">
                                        <span class="progress-bar border-primary"></span>
                                    </span>
                                <span class="progress-right">
                                        <span class="progress-bar border-primary"></span>
                                    </span>
                                <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                    <div class="block text-center">
                                        <img class="b-block" src="{{asset('images/people.png')}}">
                                        <div class="h2 font-weight-bold griz"><b>{{$total_refers}}</b></div>
                                    </div>
                                </div>
                            </div>
                            <!-- END -->
                            <p class="griz mt-2 mb-0">Personas en su red</p>
                            <h1 class="azul"><b>NIVEL {{$amount}}</b></h1>

                            <h4 class="azul"><b>ÁRBOLES {{$sponsorTree}}</b></h4>
                        </div>
                        <div class="afiliados w-100 d-flex align-items-center justify-content-end pt-3 pb-3 pl-3">
                            <p class="text-uppercase mb-3 pr-4 griz">Rentabilidades pagas</p>
                            <a href="#" class="campana">
                                <img src="{{asset('images/Campana.png')}}">
                                <span class="numero">{{$total_pays}}</span>
                            </a>
                        </div>
                        <div class="row mb-5 pb-5">
                            <div class="col-md-12">
                                <table class="table table-striped text-center">
                                    <tbody>
                                        @foreach ($pays_completed as $pay )

                                    <tr>
                                        <th scope="row">
                                            <p class="mb-0"><b> ${{$pay->total_pay}}</b></p>
                                            <p class="mb-0">Por {{$pay->level_pay}}</p>
                                        </th>
                                        <th scope="row">
                                            <p class="mb-0"><b> Red: {{$pay->tree}}</b></p>

                                        </th>
                                        <td class="align-middle">


                                            <p>Hace   {{ \Carbon\Carbon::now()->diffInDays($pay->created_at->toDateString())}} Días</p>
                                        </td>
                                    </tr>




                                    </tr>
                                    </tbody>

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







$("#dashboard").last().addClass("active");


function copyReferralLink() {
  var input = document.getElementById("referralLink");


  input.select();
  input.setSelectionRange(0, 99999);
  document.execCommand("copy");
  alert("El enlace para referir ha sido copiado: " + input.value);
}




</script>
</html>
