
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
                            <h1 class="page-title">Pagos Completados</h1>
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
                                            @if(Session::has('success_message'))
                                                @push('scripts')
                                                    <script>
                                                        Swal.fire({
                                                            title: 'Usuario registrado correctamente',
                                                            type: 'success',
                                                            confirmButtonColor: '#3085d6',
                                                            confirmButtonText: 'Aceptar',
                                                            allowOutsideClick: false
                                                        });
                                                    </script>
                                                @endpush
                                            @endif
                                            <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Código Usuario</th>
                                                        <th>Nombre</th>
                                                        <th>Pago $</th>
                                                        <th>Nivel completado</th>
                                                        <th>Rango</th>
                                                        <th>Estado</th>
                                                        <th>Fecha Pago</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($pays as $item)
                                                        <tr>
                                                            <td> {{ $item->user_id }} </td>
                                                            <td> {{ $item->name }} </td>
                                                            <td> {{ $item->total_pay }} </td>
                                                            <td> {{ $item->level_pay }} </td>
                                                            <td>
                                                                @switch($item->range_id)
                                                                    @case(1)
                                                                        Plata
                                                                    @break
                                                                    @case(2)
                                                                        Oro
                                                                    @break
                                                                    @case(3)
                                                                        Platino
                                                                    @break
                                                                    @case(4)
                                                                        Diamante
                                                                    @break
                                                                    @default
                                                                        Plata
                                                                    @break
                                                                @endswitch
                                                            </td>
                                                            <td> {{ $item->status_pay }} </td>
                                                            <td> {{ $item->created_at }} </td>
                                                            <td>
                                                                <form method="POST" action="{{ url('admin/payscompleted' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                                    {{ method_field('DELETE') }}
                                                                    {{ csrf_field() }}
                                                                    <button type="btn" class="btn btn-danger btn-sm" data-pay-id={{$item->id}} data-pay-userid={{$item->user_id}}><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                                </form>
                                                            </td>
                                                            {{-- <td>
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-default">Opciones</button>
                                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <span class="caret"></span>
                                                                        <span class="sr-only">Toggle Dropdown</span>
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <li>
                                                                            <form method="POST" action="{{ url('admin/payscompleted' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                                                {{ method_field('DELETE') }}
                                                                                {{ csrf_field() }}
                                                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete User" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>Eliminar</button>
                                                                            </form>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>--}}
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
  
        // $(".deletePay").on("click", function(e) {
        function delete() {
            var id_pay = $(this).data("pay-id");
            var id_user = $(this).data("pay-userid");
            // var url = 'admin/payscompleted/'+ id_pay;
            var url = 'payscompleted/prueba/'+ id_pay;
            // alert(url);

            e.preventDefault();
            Swal.fire({
                title: '¿Desea eliminar el pago del usuario '+ id_user + '?',
                text: "¡Este registro será eliminado!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar',
                allowOutsideClick: false
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: url,
                        type: 'delete',
                        dataType: "JSON",
                        success: function (response) {
                            alert('holaasas');
                        },
                        error: function(xhr) {

                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
