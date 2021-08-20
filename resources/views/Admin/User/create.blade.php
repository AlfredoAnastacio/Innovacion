<!doctype html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Administrador</title>
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
                                <h1 class="page-title">Agregar Usuario</h1>
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
                                            <div class="col-md-12">
                                                <h5 class="underline mt-n">
                                                    <div class="btn-group" role="group">
                                                        <a href="{{url('admin/users')}}">  <button type="button" class="btn bg-primary btn-wide"><i class="fa fa-arrow-left"></i>Volver</button></a>
            
                                                    </div>
                                                </h5>
            
                                                <form class="p-20" method="POST" action="{{ url('admin/users/') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
            
                                                    @include ('Admin.User.form', ['formMode' => 'create'])
            
                                                </form>
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

