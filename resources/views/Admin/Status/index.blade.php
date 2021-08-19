<!doctype html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Referidos</title>
    <!-- ========== COMMON STYLES ========== -->
    @include('Admin.Layouts.head')

    <body class="font-opensans">

        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
            </div>
        </div>

        <!-- Start main html -->
        <div id="main_content">
            <!-- Small icon top menu -->
            @include('Admin.Layouts.sidebar')
          
            <!-- Notification and  Activity-->
            @include('Admin.Layouts.notificationandactivity')

            <!-- start User detail -->
            @include('Admin.Layouts.startuserdetail')
       
            <!-- start User detail -->         
            @include('Admin.Layouts.startuserdetail')
          

            <!-- start main body part-->
            <div class="page">
                <!-- start body header -->
                <div id="page_top" class="section-body">
                    <div class="container-fluid">
                        <div class="page-header">
                            <div class="left">
                                <h1 class="page-title">Estados y Rangos</h1>
                            </div>
                            <div class="right">
                                <div class="notification d-flex">
                                    <!-- <button type="button" class="btn btn-facebook"><i class="fa fa-info-circle mr-2"></i>Need Help</button>
                                    <button type="button" class="btn btn-facebook"><i class="fa fa-file-text mr-2"></i>Data export</button> -->
                                    <button type="button" class="btn btn-facebook"><i class="fa fa-power-off mr-2"></i>Cerrar Sesión</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-body">
                    <div class="container-fluid">
                        <!-- Formulario -->
                        <div class="row clearfix">
                            <div class="col-lg-12">
                                <!-- For future options -->
                            </div>
                        </div>
                        <!-- Tabla -->
                    <div class="row clearfix">
                            <div class="col-lg-12 mt-5">
                                <div class="table-responsive mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            {{-- tabla aqui --}}
                                            <div class="panel-body p-20">

                                                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Código Usuario</th>
                                                            <th>Estado</th>
                                                            <th>Rango</th>
                                                            <th>Documento</th>
                                                            <th>Nombre</th>
                                                            <th>Teléfono</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if($amount == 0)
                                                            <tr> SIN INFORMACIÓN </tr>
                                                        @else
                                                            @for ($i = 0; $i < $amount; $i++)
                                                                @if($status[$i]->user_id != 1)
                                                                    <tr>
                                                                        <td>{{$status[$i]->user_id}} </td>
                                                                        <td>{{ $status[$i]->state }}</td>
                                                                        @if(isset($status[$i]->Range->range))
                                                                            <td>{{$status[$i]->Range->range}} </td>
                                                                        @else
                                                                            <td>Sin Rango </td>
                                                                        @endif
                                                                        <td>{{ $status[$i]->document }}</td>
                                                                        <td>{{ $status[$i]->name }}</td>
                                                                        <td>{{ $status[$i]->telephone }}</td>
                                                                        <td>
                                                                            <div class="btn-group">
                                                                                <button type="button" class="btn btn-default">Opciones</button>
                                                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <span class="caret"></span>
                                                                                    <span class="sr-only">Toggle Dropdown</span>
                                                                                </button>
                                                                                <ul class="dropdown-menu">
                                                                                    <li>
                                                                                        <a href="{{ url('admin/status/' . $status[$i]->user_id . '/edit') }}" title="Edit User">Editar</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            @endfor
                                                        @endif
                                                    </tbody>
                                                </table>


                                                <div class="col-md-12 mt-15 src-code">
                                                    <pre class="language-html"><code class="language-html">

                                                    </code></pre>
                                                </div>
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('Admin.Layouts.scripts')
        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->

        <script>
            $("#refer").last().addClass("active");
        </script>
    </body>
</html>
