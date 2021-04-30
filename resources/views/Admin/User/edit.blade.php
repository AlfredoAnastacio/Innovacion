<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuario</title>
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
                            <h6 class="title">Admin</h6>
                            <small class="info">Innovacion</small>
                        </div>
                        @include('Admin.Layouts.sidebar')
                        <div class="main-page">
                            <div class="container-fluid">
                                <div class="row page-title-div">
                                    <div class="col-md-6">
                                        <h2 class="title">Editar Usuario</h2>
                                        <!-- <p class="sub-title">One stop solution for perfect admin dashboard!</p> -->
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>
                            <section class="section">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="underline mt-n">
                                                <div class="btn-group" role="group">
                                                    <a href="{{url('admin/users')}}">  <button type="button" class="btn bg-primary btn-wide"><i class="fa fa-arrow-left"></i>Volver</button></a>
                                                </div>
                                            </h5>
                                            <form class="p-20" method="POST" action="{{ url('admin/users/' . $user->user_id) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                                                {{ method_field('PATCH') }}
                                                {{ csrf_field() }}
                                                @include ('Admin.User.form', ['formMode' => 'edit'])
                                            </form>
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
        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->

        <script>
            $(document).ready(function(){
                $("#user").addClass("active");
            });
        </script>
    </body>
</html>
