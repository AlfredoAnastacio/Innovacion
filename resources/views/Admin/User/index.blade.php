<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Administrador</title>

        <!-- ========== COMMON STYLES ========== -->
     @include('Admin.Layouts.head')
    </head>
    <body class="top-navbar-fixed">

        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
          @include('Admin.Layouts.navbar')

            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

                    <!-- ========== LEFT SIDEBAR ========== -->
                    <div class="left-sidebar bg-black-300 box-shadow">
                        <div class="sidebar-content">
                            <div class="user-info closed">
                                <img src="http://placehold.it/90/c2c2c2?text=User" alt="John Doe" class="img-circle profile-img">
                                <h6 class="title">admin</h6>
                                <small class="info">Innovación Financiera</small>
                            </div>
                  @include('Admin.Layouts.sidebar')
                    <!-- /.left-sidebar -->

                    <div class="main-page">
                        <div class="container-fluid">
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
                            <!-- /.row -->

                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
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

                                                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>

                                                        <tr>
                                                            <th>Codigo</th>
                                                            <th>Patrocinador</th>
                                                            <th>Núm. de Documento</th>
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
                                                                            <li><a class="btn" href="{{  url('admin/pays/' . $item->user_id) }}" title="View User">Comprobantes </a></li>
                                                                            <li><a class="btn" href="" title="View User"> Estructuras </a></li>
                                                                            <li role="separator" class="divider"></li>
                                                                            <li><a class="btn" href="" title="View User"> Ver Perfil </a></li>

                                                                            {{-- <li> <form method="POST" action="{{ url('admin/users' . '/' . $item->user_id) }}" accept-charset="UTF-8" style="display:inline">
                                                                                {{ method_field('DELETE') }}
                                                                                {{ csrf_field() }}
                                                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete User" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>Eliminar</button>
                                                                            </form></li> --}}
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                        @endforeach
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
                                    <!-- /.col-md-12 -->


                                </div>
                                <!-- /.row -->


                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->



                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
      @include('Admin.Layouts.scripts')


      <script>


$(document).ready(function(){



$("#user").addClass("active");



});
          </script>
        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->

    </body>
</html>
