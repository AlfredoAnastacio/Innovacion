<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name" class="control-label">{{ 'Nombre' }}</label>
            <input class="form-control" name="name" type="text" id="name" value="{{ isset($user->name) ? $user->name : request()->input('username', old('username')) }}" placeholder="Nombre">
        </div>
    </div>
    <!-- /.col-md-6 -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="lastname" class="control-label">{{ 'Apellido' }}</label>
            <input class="form-control" name="lastname" type="text" id="lastname" value="{{ isset($user->lastname) ? $user->lastname : ''}}" placeholder="apellido">
        </div>
    </div>
    <!-- /.col-md-6 -->
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="username" class="control-label">{{ 'Nombre de usuario' }}</label>
    <input class="form-control" name="username" type="text" id="username" value="{{ isset($user->username) ? $user->username : ''}}" placeholder="Nombre de usuario">
        </div>
    </div>
    <!-- /.col-md-6 -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="document" class="control-label">{{ 'Documento' }}</label>
    <input class="form-control" name="document" type="number" id="document" value="{{ isset($user->document) ? $user->document : ''}}" placeholder="Documento">

        </div>
    </div>
    <!-- /.col-md-6 -->
</div>

@if ($formMode != 'edit' && $formMode != 'Update')
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="document" class="control-label">{{ 'Contraseña' }}</label>
            <input class="form-control" name="password" type="password" id="password" value="{{ isset($user->password) ? $user->password : ''}}" >
        </div>
    </div>
    <!-- /.col-md-6 -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="document" class="control-label">{{ 'Confirmar contraseña' }}</label>
    <input class="form-control" name="password_confirmation" type="password" id="password_confirmation" value="{{ isset($user->password) ? $user->password : ''}}" >
        </div>
    </div>
   
    <!-- /.col-md-6 -->
</div>
@endif
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="email" class="control-label">{{ 'Email' }}</label>
            <input class="form-control" name="email" type="email" id="email" value="{{ isset($user->email) ? $user->email : ''}}" placeholder="Email">
        </div>
    </div>
    <!-- /.col-md-6 -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="telephone" class="control-label">{{ 'Celular' }}</label>
            <input class="form-control" name="telephone" type="number" id="telephone" value="{{ isset($user->telephone) ? $user->telephone : ''}}" placeholder="">
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