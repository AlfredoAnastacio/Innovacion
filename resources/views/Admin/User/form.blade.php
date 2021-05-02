<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="sponsor" class="control-label">{{ 'Nombre de Patrocinado' }}</label>
            <input class="form-control" name="sponsor" type="text" id="sponsor" value="{{ isset($user->sponsor) ? $user->sponsor : request()->input('sponsor', old('sponsor')) }}" placeholder="Nombre de Patrocinado">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="document" class="control-label">{{ 'Número de Documento' }}</label>
            <input class="form-control" name="document" type="number" id="document" value="{{ isset($user->document) ? $user->document : ''}}" placeholder="Documento">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="name" class="control-label">{{ 'Nombre' }}</label>
            <input class="form-control" name="name" type="text" id="name" value="{{ isset($user->name) ? $user->name : request()->input('username', old('username')) }}" placeholder="Nombre">
        </div>
    </div>
</div>

@if ($formMode != 'edit' && $formMode != 'Update')
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="document" class="control-label">{{ 'Contraseña' }}</label>
                <input class="form-control" name="password" type="password" id="password" value="{{ isset($user->password) ? $user->password : ''}}" >
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="document" class="control-label">{{ 'Confirmar contraseña' }}</label>
                <input class="form-control" name="password_confirmation" type="password" id="password_confirmation" value="{{ isset($user->password) ? $user->password : ''}}" >
            </div>
        </div>
    </div>
@endif
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="email" class="control-label">{{ 'Email' }}</label>
            <input class="form-control" name="email" type="email" id="email" value="{{ isset($user->email) ? $user->email : ''}}" placeholder="Email">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="telephone" class="control-label">{{ 'Teléfono' }}</label>
            <input class="form-control" name="telephone" type="number" id="telephone" value="{{ isset($user->telephone) ? $user->telephone : ''}}" placeholder="">
        </div>
    </div>
    {{--  <div class="col-md-4">
        <div class="form-group">
            <label for="MeanOfPayment" class="control-label">{{ 'Medio de Pago' }}</label>
            <input class="form-control" name="MeanOfPayment" type="text" id="MeanOfPayment" value="{{ isset($user->telephone) ? $user->telephone : ''}}" placeholder="Medio de pago">
        </div>
    </div>  --}}
</div>
<div class="col-md-12">
    <div class="btn-group pull-right mt-10" role="group">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
    </div>
</div>
