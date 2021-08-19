<div id="left-sidebar" class="sidebar" style="background-color: rgb(213 220 228);">
    <div class="d-flex justify-content-between brand_name">
        <h5 class="brand-name">Innovación Financiera</h5>
    </div>
    <div class="input-icon">
        <span class="input-icon-addon">
            <i class="fe fe-search"></i>
        </span>
        <input type="text" class="form-control" placeholder="Busqueda...">
    </div>    
    <div class="tab-content">
        <div class="tab-pane fade active show" id="all-tab">
            <nav class="sidebar-nav">
                <ul class="metismenu ci-effect-1">    
                    Todos
                    <li><a href="{{ url('admin/users') }}"><span data-hover="Todos">Todos</span></a></li>
                    <li><a href="{{ url('admin/users') }}"><span data-hover="Inscrito">Inscrito</span></a></li>                  
                    <li><a href="{{ url('admin/users') }}"><span data-hover="Activos">Activos</span></a></li>
                    <li><a href="{{ url('admin/users') }}"><span data-hover="Inact. Referidos">Inactivos por referidos</span></a></li>
                    <li><a href="{{ url('admin/users') }}"><span data-hover="Inact. Permanente">Inactivo Permanente</span></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>