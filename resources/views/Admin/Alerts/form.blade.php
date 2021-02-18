<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name" class="control-label">{{ 'Código Usuario' }}</label>
            <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($alert->user_id) ? $alert->user_id : request()->input('user_id', old('user_id'))}}" readonly >
        </div>
    </div>
    <!-- /.col-md-6 -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="lastname" class="control-label">{{ 'Nivel Completado' }}</label>
            <input class="form-control" name="level_pay" type="text" id="level_pay" value="{{ isset($alert->level_pay) ? $alert->level_pay : request()->input('level_pay', old('level_pay'))}}" readonly >
        </div>
    </div>
    <!-- /.col-md-6 -->
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="username" class="control-label">{{ 'Nombre de usuario' }}</label>
            <input class="form-control" name="name" type="text" id="name" value="{{ isset($alert->name) ? $alert->name : request()->input('name', old('name'))}}" readonly >
        </div>
    </div>
    <!-- /.col-md-6 -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="document" class="control-label">{{ 'Rentabilidad $' }}</label>
            <input style="text-align: center;"="form-control" name="total_pay" type="text" id="total_pay" value="{{ isset($alert->total_pay) ? $alert->total_pay: request()->input('total_pay', old('total_pay'))}}" readonly >

        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="document" class="control-label">{{ 'Rango' }}</label>
            <input style="text-align: center;"="form-control" name="range_id" type="text" id="range_id" value="{{ isset($alert->range_id) ? $alert->range_id: request()->input('range', old('range'))}}" readonly >

        </div>
    </div>
    <!-- /.col-md-6 -->
</div>


<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="username" class="control-label">{{ 'Nombre de usuario' }}</label>
            <input class="form-control" name="name" type="text" id="name" value="{{ isset($alert->name) ? $alert->name : request()->input('name', old('name'))}}" readonly >
        </div>
    </div>
    <!-- /.col-md-6 -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="username13">Seleccione un estado</label>
            <div class="col">
                <select name="status_pay" id="status_pay" class="form-control">
                    <option >
                      Pago
                    </option>
            
                
            
                
            
                </select>
        </div>
    </div>
    <!-- /.col-md-6 -->
</div>


<div class="col-md-12">
    <div class="btn-group pull-right mt-10" role="group">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
     
    </div>
    <!-- /.btn-group -->
</div>