<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Administrador</title>
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
                                <div class="col-md-8">
                                    <h2 class="title">Estructuras del usuario - {{ $user->name }} - {{ $user->user_id }}</h2>
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
                                                <div class="btn-group" role="group">
                                                    <a href="{{url('admin/users')}}">  <button type="button" class="btn bg-primary btn-wide"><i class="fa fa-arrow-left"></i>Volver</button></a>

                                                </div>
                                            </div>
                                            <div class="panel-body p-20">

                                                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th> Codigo del Usuario </th>
                                                            <th> Documento del Usuario </th>
                                                            <th> Código del Líder </th>
                                                            <th> Documento del líder </th>
                                                            <th> Nivel </th>
                                                            <th> Referidos </th>
                                                            <th> Estado </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            @foreach ($refers as $refer)
                                                                <tr>
                                                                    <td> {{ $refer->user_id }} </td>
                                                                    <td> {{ $refer->user_document }} </td>
                                                                    <td> {{ $refer->sponsor_id }} </td>
                                                                    <td> 00 </td>
                                                                    {{--  <td> {{ $refer->document }} </td>  --}}
                                                                    <td> {{ $refer->sponsor_id }} </td>
                                                                    <td> 00 </td>
                                                                    <td> sfdsdfd </td>
                                                                </tr>
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
