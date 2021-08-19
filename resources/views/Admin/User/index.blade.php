<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>Administrador</title>

        <!-- ========== COMMON STYLES ========== -->
        @include('Admin.Layouts.head')

        {{--  --}}
    </head>
    <body class="top-navbar-fixed">
                <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
            </div>
        </div>
        <div id="main_content">
            
            <!-- Small icon top menu -->
            @include('Admin.Layouts.sidebar')
    
            <!-- Notification and  Activity-->
            @include('Admin.Layouts.notificationandactivity')

            <!-- start User detail -->
            @include('Admin.Layouts.startuserdetail')
        
            <!-- start User detail -->         
            @include('Admin.Layouts.startuserdetail')
           

            <div class="page">
                   <!-- start body header -->
                    <div id="page_top" class="section-body">
                        <div class="container-fluid">
                            <div class="page-header">
                                <div class="left">
                                    <h1 class="page-title">Usuarios</h1>
                                    @if($alerts)
                                        <div class="alert alert-danger" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <strong>Hay notificaciones pendientes </strong>
                                        </div>
                                    @endif
                                </div>
                                <div class="right">
                                    <div class="notification d-flex">
                                        <!-- <button type="button" class="btn btn-facebook"><i class="fa fa-info-circle mr-2"></i>Need Help</button>
                                        <button type="button" class="btn btn-facebook"><i class="fa fa-file-text mr-2"></i>Data export</button> -->
                                        <button type="button" class="btn btn-facebook"><i class="fa fa-power-off mr-2"></i>Cerrar Sesión</button>
                                    </div>
                                    <div class="notification d-flex">
                                       
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
                                                <div class="col-12 mt-3 mb-3 text-right">
                                                    <a href="{{ url('admin/users/create') }}" class="btn btn-success btn-sm" title="Add New User">
                                                        <i class="fa fa-plus" aria-hidden="true"></i> Agregar usuario
                                                    </a>
                                                </div>
                                                <div class="table-responsive mt-5">
                                                    <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Codigo</th>
                                                                <th>Patrocinador</th>
                                                                <th>Núm. de Documento</th>
                                                                <th>Email</th>
                                                                <th>Nombre</th>
                                                                <th>Estructuras</th>
                                                                <th>Referidos</th>
                                                                <th>Estado</th>
                                                                <th>Medio de Pago</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($users as $item)
                                                                @if($item->user_id != 1)
                                                                    <tr>
                                                                        <td> {{ $item->user_id }} </td>
                                                                        <td> {{ $item->sponsor_id }} </td>
                                                                        <td> {{ $item->document }} </td>
                                                                        <td> {{ $item->email }} </td>
                                                                        <td> {{ $item->name }} </td>
                                                                        @if($item->totalTree == 1)
                                                                            <td> 1 </td>
                                                                        @endif
                                                                        @if($item->totalTree == null)
                                                                            <td> 0 </td>
                                                                        @endif
                                                                        @if($item->totalTree > 1)
                                                                            <td> {{ $item->totalTree }} </td>
                                                                        @endif
                                                                        @if($item->totalRefers == 0)
                                                                            <td> 0 </td>
                                                                        @else
                                                                            <td> {{ $item->totalRefers }} </td>
                                                                        @endif
                                                                        @if($item->state == 'Inactivo')
                                                                            <td> <span class="badge badge-danger"> {{ $item->state }} </span> </td>
                                                                        @else
                                                                            <td> {{ $item->state }} </td>
                                                                        @endif
                                                                        <td> Efecty </td>
                                                                        <td>
                                                                            <div class="btn-group">
                                                                                <button type="button" class="btn btn-default">Opciones</button>
                                                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <span class="caret"></span>
                                                                                    <span class="sr-only">Toggle Dropdown</span>
                                                                                </button>
                                                                                <ul class="dropdown-menu">
                                                                                    <li> <a class="btn" href="{{ url('admin/users/' . $item->user_id . '/edit') }}" title="Edit User"> Editar </a></li>
                                                                                    <li><a class="btn" href="{{ route('investments.create',['user_id'=>$item->user_id]) }}" title="View User">Agregar inversión </a></li>
                                                                                    @if($item->id != null)
                                                                                        <li><a class="btn" href="{{  url('admin/pays/' . $item->user_id) }}" title="View User">Comprobantes </a></li>
                                                                                    @endif
                                                                                    <li><a class="btn" href="{{ url('admin/users/structures/' . $item->user_id) }}" title="View User"> Estructuras </a></li>
                                                                                    <li role="separator" class="divider"></li>
                                                                                    <li><a class="btn" href="" title="View User"> Ver Perfil </a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                <div class="col-md-12 mt-15 src-code">
                                                    <pre class="language-html">
                                                        <code class="language-html"></code>
                                                    </pre>
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


        <!-- ========== COMMON JS FILES ========== -->
        @include('Admin.Layouts.scripts')
        <script>
            $(document).ready(function(){
                $("#user").addClass("active");
            });
        </script>
        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->



            {{-- Agregando funciones --}}
            {{-- <div class="main-wrapper">
                <div class="content-wrapper">
                    <div class="content-container">
                        <div class="left-sidebar bg-black-300 box-shadow">
                            <div class="sidebar-content">
                                <div class="user-info closed">
                                    <img src="http://placehold.it/90/c2c2c2?text=User" alt="John Doe" class="img-circle profile-img">
                                    <h6 class="title">admin</h6>
                                    <small class="info">Innovación Financiera</small>
                                </div> --}}
                                {{-- @include('Admin.Layouts.sidebar') --}}
                                {{-- <div class="main-page"> --}}
                                    {{-- <div class="container-fluid">
                                        @if($alerts)
                                            <div class="alert alert-danger" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                <strong>Hay notificaciones pendientes </strong>
                                            </div>
                                        @endif
                                        <div class="row page-title-div">
                                            <div class="col-md-6">
                                                <h2 class="title">Usuarios Registrados</h2>
                                                <!-- <p class="sub-title">One stop solution for perfect admin dashboard!</p> -->
                                            </div>
    
                                        </div>
                                    </div> --}}
                                    {{-- <section class="section">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel">
                                                        <div class="panel-heading pl-5">
                                                            <a href="{{ url('admin/users/create') }}" class="btn btn-success btn-sm" title="Add New User">
                                                                <i class="fa fa-plus" aria-hidden="true"></i> Agregar usuario
                                                            </a>
                                                        </div>
                                                        <div class="panel-body p-20">
                                                            <div class="table-responsive">
                                                                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Codigo</th>
                                                                            <th>Patrocinador</th>
                                                                            <th>Núm. de Documento</th>
                                                                            <th>Email</th>
                                                                            <th>Nombre</th>
                                                                            <th>Estructuras</th>
                                                                            <th>Referidos</th>
                                                                            <th>Estado</th>
                                                                            <th>Medio de Pago</th>
                                                                            <th>Acciones</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach($users as $item)
                                                                            @if($item->user_id != 1)
                                                                                <tr>
                                                                                    <td> {{ $item->user_id }} </td>
                                                                                    <td> {{ $item->sponsor_id }} </td>
                                                                                    <td> {{ $item->document }} </td>
                                                                                    <td> {{ $item->email }} </td>
                                                                                    <td> {{ $item->name }} </td>
                                                                                    @if($item->totalTree == 1)
                                                                                        <td> 1 </td>
                                                                                    @endif
                                                                                    @if($item->totalTree == null)
                                                                                        <td> 0 </td>
                                                                                    @endif
                                                                                    @if($item->totalTree > 1)
                                                                                        <td> {{ $item->totalTree }} </td>
                                                                                    @endif
                                                                                    @if($item->totalRefers == 0)
                                                                                        <td> 0 </td>
                                                                                    @else
                                                                                        <td> {{ $item->totalRefers }} </td>
                                                                                    @endif
                                                                                    @if($item->state == 'Inactivo')
                                                                                        <td> <span class="badge badge-danger"> {{ $item->state }} </span> </td>
                                                                                    @else
                                                                                        <td> {{ $item->state }} </td>
                                                                                    @endif
                                                                                    <td> Efecty </td>
                                                                                    <td>
                                                                                        <div class="btn-group">
                                                                                            <button type="button" class="btn btn-default">Opciones</button>
                                                                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                                <span class="caret"></span>
                                                                                                <span class="sr-only">Toggle Dropdown</span>
                                                                                            </button>
                                                                                            <ul class="dropdown-menu">
                                                                                                <li> <a class="btn" href="{{ url('admin/users/' . $item->user_id . '/edit') }}" title="Edit User"> Editar </a></li>
                                                                                                <li><a class="btn" href="{{ route('investments.create',['user_id'=>$item->user_id]) }}" title="View User">Agregar inversión </a></li>
                                                                                                @if($item->id != null)
                                                                                                    <li><a class="btn" href="{{  url('admin/pays/' . $item->user_id) }}" title="View User">Comprobantes </a></li>
                                                                                                @endif
                                                                                                <li><a class="btn" href="{{ url('admin/users/structures/' . $item->user_id) }}" title="View User"> Estructuras </a></li>
                                                                                                <li role="separator" class="divider"></li>
                                                                                                <li><a class="btn" href="" title="View User"> Ver Perfil </a></li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            @endif
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            <div class="col-md-12 mt-15 src-code">
                                                                <pre class="language-html">
                                                                    <code class="language-html"></code>
                                                                </pre>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section> --}}
                                {{-- </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- ========== COMMON JS FILES ========== -->
                {{-- @include('Admin.Layouts.scripts')
                <script>
                    $(document).ready(function(){
                        $("#user").addClass("active");
                    });
              </script> --}}
            <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->

        </div>
    </body>
</html>
