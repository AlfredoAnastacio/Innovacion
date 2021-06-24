<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Estados y Rangos</title>
        <link rel="shortcut icon" href="{{ asset('images/fav_ico.png') }}">

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
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Estados y Rangos</h2>
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
                                                                        @if(isset($status[$i]->nameRange))
                                                                            <td>{{$status[$i]->nameRange}} </td>
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


        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->


        <script>






            $("#status").last().addClass("active");




                      </script>


    </body>
</html>
