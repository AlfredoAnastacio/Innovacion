<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comprobante</title>
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
                            <small class="info">Innovación Financiera</small>
                        </div>
                        <!-- /.user-info -->
                        @include('Admin.Layouts.sidebar')
                <!-- /.left-sidebar -->
                <div class="main-page">
                    <div class="container-fluid">
                        <div class="row page-title-div">
                            <div class="col-md-6">
                                <h2 class="title">Comprobante</h2>
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
                                    <form class="p-20">
                                        <h5 class="underline mt-n">
                                            <div class="btn-group" role="group">

<a href="{{ url('admin/pays') }}">                                                <button type="button" class="btn bg-primary btn-wide"><i class="fa fa-arrow-left"></i>Volver</button>
</a>
                                            </div>
                                        </h5>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <img src="{{asset('storage/invest/'.$image)}}" class="figure-img img-fluid rounded"  width="460" height="345">
                                            </div>
                                        </div>
                                        
                                        
                                </div>
                                </form>
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
  
    <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
</body>

</html>
