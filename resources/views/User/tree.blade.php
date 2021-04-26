<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>INNOVACIÓN FINANCIERA | Mis Estructuras </title>
    <link rel="shortcut icon" href="{{ asset('images/fav_ico.png') }}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css" media="screen">

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
    <link href="{{asset('css/Treant.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom-colored.css')}}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark sticky-top bg-blue2 flex-md-nowrap p-0 shadow">
        <div class="spacer"></div>
        <h1 class="mx-auto mt-5">Mis estructuras</h1>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <div class="container-fluid">
        <div class="row mainrow">
            <nav id="sidebarMenu" class="col-md-4 col-lg-3 d-md-block bg-light sidebar collapse">
                <div class="logoimg">
                    <img class="img-fluid" src="{{asset('images/LogoAzul.png')}}">
                </div>
                <div class="sidebar-sticky pt-3">
                    @include('layouts.navbar')
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-3">
                <div class="">
                    <div class="contenido pt-5 ">
                        <div class="cuenta mx-auto">
                            <h6 class="text-center text-uppercase azul"><b>{{Auth::user()->name}}</b></h6>
                            <div class="nivel">
                                <div class="row">
                                    <div class="col-9 pr-0">
                                        <h6 class="usuario azul pt-1"><b># USUARIO: {{Auth::user()->user_id}}</b></h6>
                                        <hr class="azul">
                                        <p class="patrocinador"># Patrocinador: {{ $sponsorTree}}</p>
                                    </div>
                                    <div class="col-3 text-center pl-0">
                                        <img class="" src="{{asset('images/rentabilidad.png')}}">
                                        <p class="text-center">{{$range->range}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="arco azulbg mt-2 p-2"><h6 class="title">LIDER INNOVADOR</h6></div>
                            <div class="row mb-4 scuare ml-0 mr-0">
                                <div class="col-6 borde text-center pt-3">
                                    <img src="{{asset('images/Estructuras_azul.png')}}">
                                    <h2 class="pt-2 mb-1 griz"><b>{{$sponsorTree}}</b></h2>
                                    @if ($sponsorTree == 1)
                                        <h5 class="griz fz">ESTRUCTURA</h5>
                                    @else
                                    <h5 class="griz fz">ESTRUCTURAS</h5>
                                    @endif
                                </div>
                                <div class="col-6 text-center pt-2">
                                    <img src="{{asset('images/rentabilidad.png')}}">
                                    <h2 class="pt-1 mb-1 griz"><b>US ${{$total_pays}}</b></h2>
                                    <h5 class="griz fz">RENTABILIDAD</h5>
                                </div>
                            </div>
                            <!-- Estructuras -->
                            @if ($sponsorTree == 0)
                                <div class="box">
                                    <h6 class="text-center text-uppercase pt-3 mb-3 pb-3 azulbg text-white"><b>Sin Estructuras</b></h6>
                                </div>
                                <div class="row mb-5 scuare ml-0 mr-0"></div>
                            @else
                                <div class="box">
                                    <h6 class="text-center text-uppercase pt-3 mb-3 pb-3 azulbg text-white"><b>Tus estructuras</b>
                                    </h6>
                                </div>
                               @for($i = 0; $i < $sponsorTree; $i++)
                                    <div class="arco azulbg mt-2 p-2">
                                        <h6 class="title ml-5">ESTRUCTURA #{{ $i+1 }}<a class="vinculo" href="#">Más info ></a></h6>
                                    </div>
                                    <div class="row mb-4 scuare ml-0 mr-0">
                                        <div class="col-6 borde border-b text-center pt-2">
                                            <div class="progress mx-auto " data-value='90'>
                                                <span class="progress-left">
                                                    <span class="progress-bar border-primary"></span>
                                                </span>
                                                <span class="progress-right">
                                                    <span class="progress-bar border-primary"></span>
                                                </span>
                                                <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                                    <div class="block text-center">
                                                        <img class="b-block"src="{{asset('images/people.png')}}">
                                                        
                                                        <div class="h2 font-weight-bold griz"><b class="qrf">124</b></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="griz fz">USUARIOS EN TU ESTRUCTURA</h5>
                                        </div>
                                        <div class="col-6 border-b text-center pt-2">
                                            <br>
                                            <img src="{{asset('images/rango-plata.png')}}">
                                            <h5 class="griz"><b class="fz">RANGO<br>PLATA</b></h5>
                                        </div>
                                        <div class="col-6 borde text-center pt-2">
                                            <img src="{{asset('images/inversion.png')}}">
                                            <h2 class="pt-2 mb-1 griz"><b>US $300</b></h2>
                                            <h5 class="griz fz">INVERSION</h5>
                                        </div>
                                        <div class="col-6 text-center pt-2">
                                            <img src="{{asset('images/rentabilidad.png')}}">
                                            <h2 class="pt-2 mb-1 griz"><b>US $900</b></h2>
                                            <h5 class="griz fz">RENTABILIDAD</h5>
                                        </div>
                                    </div>
                               @endfor
                            @endif

                            {{--  <div class="arco azulbg mt-2 p-2"><h6 class="title ml-5">ESTRUCTURA #2<a class="vinculo" href="#">Más info ></a></h6></div>
                            <div class="row mb-4 scuare ml-0 mr-0">
                                <div class="col-6 borde border-b text-center pt-2">
                                    <div class="progress mx-auto " data-value='90'>
                                        <span class="progress-left">
                                            <span class="progress-bar border-primary"></span>
                                        </span>
                                        <span class="progress-right">
                                            <span class="progress-bar border-primary"></span>
                                        </span>
                                        <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                            <div class="block text-center">
                                                <img src="{{asset('images/people.png')}}">
                                                <div class="h2 font-weight-bold griz"><b class="qrf">124</b></div>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="griz fz">USUARIOS EN TU ESTRUCTURA</h5>
                                </div>
                                <div class="col-6 border-b text-center pt-2">
                                    <br>
                                    <img src="{{asset('images/rango-oro.png')}}">
                                    <h5 class="griz"><b class="fz">RANGO<br>ORO</b></h5>
                                </div>
                                <div class="col-6 borde text-center pt-2">
                                    <img src="{{asset('images/inversion.png')}}">
                                    <h2 class="pt-2 mb-1 griz"><b>US $300</b></h2>
                                    <h5 class="griz fz">INVERSION</h5>
                                </div>
                                <div class="col-6 text-center pt-2">
                                    <img src="{{asset('images/rentabilidad.png')}}">
                                    <h2 class="pt-2 mb-1 griz"><b>US $900</b></h2>
                                    <h5 class="griz fz">RENTABILIDAD</h5>
                                </div>
                            </div>

                            <div class="arco azulbg mt-2 p-2"><h6 class="title ml-5">ESTRUCTURA #3<a class="vinculo" href="#">Más info ></a></h6></div>
                            <div class="row mb-4 scuare ml-0 mr-0">
                                <div class="col-6 borde border-b text-center pt-2">
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
                                                <div class="h2 font-weight-bold griz"><b class="qrf">124</b></div>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="griz fz">USUARIOS EN TU ESTRUCTURA</h5>
                                </div>
                                <div class="col-6 border-b text-center pt-2">
                                    <br>
                                    <img src="{{asset('images/rango-platino.png')}}">
                                    <h5 class="griz"><b class="fz">RANGO<br>PLATINO</b></h5>
                                </div>
                                <div class="col-6 borde text-center pt-2">
                                    <img src="{{asset('images/inversion.png')}}">
                                    <h2 class="pt-2 mb-1 griz"><b>US $300</b></h2>
                                    <h5 class="griz fz">INVERSION</h5>
                                </div>
                                <div class="col-6 text-center pt-2">
                                    <img src="{{asset('images/rentabilidad.png')}}">
                                    <h2 class="pt-2 mb-1 griz"><b>US $900</b></h2>
                                    <h5 class="griz fz">RENTABILIDAD</h5>
                                </div>
                            </div>

                            <div class="arco azulbg mt-2 p-2"><h6 class="title ml-5">ESTRUCTURA #4<a class="vinculo" href="#">Más info ></a></h6></div>
                            <div class="row mb-4 scuare ml-0 mr-0">
                                <div class="col-6 borde border-b text-center pt-2">
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
                                                <div class="h2 font-weight-bold griz"><b class="qrf">124</b></div>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="griz fz">USUARIOS EN TU ESTRUCTURA</h5>
                                </div>
                                <div class="col-6 border-b text-center pt-2">
                                    <br>
                                    <img src="{{asset('images/rango-diamante.png')}}">
                                    <h5 class="griz"><b class="fz">RANGO<br>DIAMANTE</b></h5>
                                </div>
                                <div class="col-6 borde text-center pt-2">
                                    <img src="{{asset('images/inversion.png')}}">
                                    <h2 class="pt-2 mb-1 griz"><b>US $300</b></h2>
                                    <h5 class="griz fz">INVERSION</h5>
                                </div>
                                <div class="col-6 text-center pt-2">
                                    <img src="{{asset('images/rentabilidad.png')}}">
                                    <h2 class="pt-2 mb-1 griz"><b>US $900</b></h2>
                                    <h5 class="griz fz">RENTABILIDAD</h5>
                                </div>
                            </div>  --}}
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
    <script src="{{asset('js/dashboard.js')}}"></script>
</body>
    <script type="text/javascript">
        $("#tree-user").last().addClass("active");
    </script>
</html>
