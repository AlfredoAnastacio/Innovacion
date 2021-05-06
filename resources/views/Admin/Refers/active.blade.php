<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INNOVACIÓN FINANCIERA | ACTIVAR USUARIO</title>
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
                            <h6 class="title">Admin</h6>
                            <small class="info">Innovacion</small>
                        </div>
                        <!-- /.user-info -->
                       @include('Admin.Layouts.sidebar')
                <!-- /.left-sidebar -->
                <div class="main-page">
                    <div class="container-fluid">
                        <div class="row page-title-div">
                            <div class="col-md-6">
                                <h2 class="title">Activar usuario</h2>
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
                                    <h5 class="underline mt-n">
                                        <div class="btn-group" role="group">
                                            <a href="{{url('admin/refers')}}">  <button type="button" class="btn bg-primary btn-wide btn-sm"><i class="fa fa-arrow-left"></i>Volver</button></a>
                                        </div>
                                    </h5>

                                    <form class="p-20" method="POST" action="{{ url('admin/inactiveactive/update') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                                        {{ method_field('PUT') }}
                                        {{ csrf_field() }}

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="user_id" class="control-label">{{ 'Código Usuario' }}</label>
                                                    <input class="form-control" name="user_id" type="numeric" id="user_id" value="{{ isset($refer->user_id) ? $refer->user_id : request()->input('user_id', old('user_id')) }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="status" class="control-label">Status</label>
                                                    <select class="form-control" id="state" name="state">
                                                        <option @if($refer->state == 'Inactivo') selected @endif value="Inactivo"> Inactivo </option>
                                                        <option @if($refer->state == 'Activo') selected @endif value="Activo"> Activo </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="btn-group pull-right mt-10" role="group">
                                                <button class="btn btn-primary btn-sm" type="submit"> Update </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- /.main-wrapper -->
    <!-- ========== COMMON JS FILES ========== -->
    @include('Admin.Layouts.scripts')
    <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    <script>
        $(document).ready(function(){
            $("#userInactives").addClass("active");
        });
    </script>
</body>
</html>
