<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Usuarios y Estructuras Inactivas</title>

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
                            <div class="main-page">
                                <div class="container-fluid">
                                    <div class="row page-title-div">
                                        <div class="col-md-6">
                                            <h2 class="title">Usuarios y Estructuras Inactivas</h2>
                                        </div>
                                    </div>
                                </div>
                                <section class="section">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel">
                                                    <div class="panel-body p-20">
                                                        <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Codigo</th>
                                                                    <th>Nombre</th>
                                                                    <th>Teléfono</th>
                                                                    <th>Estructura</th>
                                                                    <th>Rango</th>
                                                                    <th>Usuarios en la estructura</th>
                                                                    <th>Inversión</th>
                                                                    <th>Acciones</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($users as $user)
                                                                <tr>
                                                                    <td> {{ $user->user_id }} </td>
                                                                    <td> {{ $user->name }} </td>
                                                                    <td> {{ $user->telephone }}</td>
                                                                    <td> N/A </td>
                                                                    <td> {{ $user->range }} </td>
                                                                    <td> N/A </td>
                                                                    <td> N/A </td>

                                                                    <td>
                                                                        <div class="btn-group">
                                                                            <button type="button" class="btn btn-default">Opciones</button>
                                                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <span class="caret"></span>
                                                                                <span class="sr-only">Toggle Dropdown</span>
                                                                            </button>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="btn" href="{{  url('admin/refers/' . $user->user_id) }}" title="View User">Ver Afiliados </a> </li>
                                                                                <li><a class="btn" href="{{  url('admin/refers/' . $user->user_id) }}" title="View User">Ver Inversión </a> </li>
                                                                                <li role="separator" class="divider"></li>
                                                                                <li> <a class="btn" href="{{ url('admin/users/' . $user->user_id . '/edit') }}" title="Edit User"> Editar </a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        <div class="col-md-12 mt-15 src-code">
                                                            <pre class="language-html"><code class="language-html">
                                                            </code></pre>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!-- ========== COMMON JS FILES ========== -->
        @include('Admin.Layouts.scripts')

        <script>
            $(document).ready(function(){
                $("#userInactives").addClass("active");
            });
        </script>
    </body>
</html>
