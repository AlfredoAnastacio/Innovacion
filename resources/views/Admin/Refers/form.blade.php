
@if($formMode != 'edit' && $formMode != 'Update')

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name13" class="control-label">{{ 'Código Usuario' }}</label>
            <input class="form-control" name="user_id" type="numeric" id="user_id" value="{{ isset($user_id) ? $user_id : request()->input('user_id', old('user_id')) }}" readonly>
        </div>
    </div>
</div>

    
    <div class="col">
        <div class="col-md-6">
            <div class="form-group">
                <label for="username13" class="control-label">{{ 'Código Patrocinador' }}</label>
                <input class="form-control" name="sponsor_id" type="number" id="sponsor_id" value="{{ isset($sponsor_id) ? $sponsor_id : request()->input('sponsor_id', old('sponsor_id')) }}">
            </div>
        </div>
    </div>


        @else


        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="username13" class="control-label">{{ 'Código Usuario' }}</label>
                    <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($refer->user_id) ? $refer->user_id : ''}}" readonly>   
                             </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="username13" class="control-label">{{ 'Nombre Usuario' }}</label>
                    <input class="form-control" name="name" type="text" id="name" value="{{ isset($name) ? $name : ''}}" readonly >
                                               </div>
            </div>
        </div>


            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="username13" class="control-label">{{ 'Código Patrocinador' }}</label>
                        <input class="form-control" name="sponsor_id" type="number" id="sponsor_id" value="{{ isset($refer->sponsor_id) ? $refer->sponsor_id : ''}}" >

                    </div>
                </div>
            </div>
                

                  
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="username13" class="control-label">{{ 'Nombre Patrocinador' }}</label>
                        <input class="form-control" name="name_sponsor" type="text" id="name_sponsor" value="{{ isset($name_sponsor) ? $name_sponsor : ''}}" readonly >
                    </div>
                </div>
            </div>

                @endif
                <div class="col-md-6">
                    <div class="btn-group pull-right mt-10" role="group">
                        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
                     
                    </div>
                    <!-- /.btn-group -->
                </div>
            </div>