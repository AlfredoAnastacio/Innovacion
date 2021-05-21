<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pagos</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- ========== COMMON STYLES ========== -->
        @include('Admin.Layouts.head')
        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('css/sweetalert2.css') }}">
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
                                            <h2 class="title">Pagos Completados</h2>
                                        </div>
                                    </div>
                                </div>
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
                                <section class="section">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel">
                                                    <div class="panel-heading"></div>
                                                    <div class="panel-body p-20">
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
                                                            <pre class="language-html">
                                                                <code class="language-html"></code>
                                                            </pre>
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
            <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
            <script src="{{asset('js/sweetalert2.js')}}"></script>
            <script>
                $("#pays_completed").last().addClass("active");
            </script>
            <script>
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
