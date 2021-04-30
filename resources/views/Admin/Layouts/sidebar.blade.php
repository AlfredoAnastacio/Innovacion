
        <!-- /.user-info -->

        <div class="sidebar-nav">
            <ul class="side-nav color-gray">
                <li class="nav-header"><div class="col-md-12 pl-0"><img class="img-responsive" src="{{asset('images/logo.png')}}" alt="Options - Admin Template" class="logo"></div></li>
                <li class="nav-header">
                    <span class="">&nbsp</span>
                </li>


                <li class="nav-header">
                    <span class="">Menú</span>
                </li>
                <li class="">
                    <a id="user" href="{{ url('admin/users') }}"><i class="fa fa-users"></i> <span>Usuarios</span> </a>

                </li>
                <li class="">
                    <a id="investment" href="{{ url('admin/investments') }}"><i class="fa fa-bars"></i> <span>Listar Inversiones</span> </a>

                </li>
                <li class="">
                    <a id="pays" href="{{ url('admin/pays') }}"><i class="fa fa-image"></i> <span>Ver comprobantes</span> </a>

                </li>
                <li class="">
                    <a id="refer" href="{{ url('admin/refers') }}"><i class="fa fa-cubes"></i> <span>Referidos</span> </a>

                </li>
                <li class="">
                    <a id="status" href="{{ url('admin/status') }}"><i class="fa fa-area-chart"></i> <span>Estados y Rangos </span> </a>

                </li>

                <li class="">
                    <a  href="{{ url('admin/activeusers') }}"><i class="fa fa-area-chart"></i> <span>Usuarios activos </span> </a>

                </li>

                <li class="">
                    <a  href="{{ url('admin/inactiveusers') }}"><i class="fa fa-area-chart"></i> <span>Usuarios inactivos </span> </a>

                </li>

                <hr>

                <li class="">
                    <a id="alerts_pays" href="{{ url('admin/alertspays') }}"><i class="fa fa-money"></i> <span>Pagos pendientes </span> </a>

                </li>

                <li class="">
                    <a id="alerts" href="{{ url('admin/alerts') }}"><i class="fa fa-bell"></i> <span>Notificaciones</span> </a>

                </li>


                <li class="">
                    <a id="pays_completed" href="{{ url('admin/payscompleted') }}"><i class="fa fa-money"></i> <span>Pagos realizados </span> </a>

                </li>
            </ul>



            <!-- /.side-nav -->

        </div>
        <!-- /.sidebar-nav -->
    </div>
    <!-- /.sidebar-content -->
</div>
