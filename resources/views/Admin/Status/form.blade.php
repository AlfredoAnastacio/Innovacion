@if ($formMode != 'edit' && $formMode != 'Update')

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name13" class="control-label">{{ 'Código Usuario' }}</label>
            <input class="form-control" name="user_id" type="text" id="username" value="{{ isset($state->user_id) ? $state->user_id : ''}}" >
                </div>
    </div>
</div>

@else
    
    <div class="col">
        <div class="col-md-6">
            <div class="form-group">
                <label for="username13" class="control-label">{{ 'Código Patrocinador' }}</label>
                <input class="form-control" name="user_id" type="text" id="username" value="{{ isset($state->user_id) ? $state->user_id : ''}}" disabled >            </div>
        </div>
    </div>

    @endif





    <div class="col-md-6">
        <div class="form-group">
            <label for="username13">Seleccione un estado</label>
            <div class="col">
                <select name="state" id="state" class="form-control">
                    <option >
                        Activo
                    </option>
            
                    <option>Inactivo</option>
            
                
            
                </select>
            </div>
        </div>
    </div>



    <div class="col-md-6">
        <div class="form-group">
            <label for="username13">Seleccione un rango</label>
            <div class="col">
                <select name="range" id="range" class="form-control">
                    <option >
                        Plata
                    </option>
            
                    <option>Oro</option>
            
                    <option>Platino</option>
            
                    <option>Diamante</option>
            
                </select>
            </div>
        </div>
    </div>



<div class="col-md-6">
    <div class="btn-group pull-right mt-10" role="group">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
     
    </div>
    <!-- /.btn-group -->
</div>
</div>