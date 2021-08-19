<div class="row col-md-6">
    <div class="col">
        <div class="form-group">
            <label for="name13">Código Usuario</label>
            <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($user_id) ? $user_id : ''}}" readonly>
        </div>
    </div><br>
    <div class="col">
        <label>Estructura a invertir</label>
        <div class="form-group">
            <select class="form-control" id="tree" name="tree">
                <option selected disabled>Selecciona una estructura</option>
                {{-- @for ($Tree=0; $Tree < $sponsorTree; $Tree++) { --}}
                    <option value="{{ $data_contract->contract }}">Estructura #{{ $data_contract->contract}}</option>
                {{-- @endfor --}}
            </select>
        </div><br>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="username13">Inversión $</label>
            <div class="col">
                <select name="pay" id="pay" class="form-control">
                    <option>{{ $data_contract->total_investment}}</option>
                </select>
            </div>
        </div>
    </div>
    @if ($formMode == 'edit' && $formMode == 'Update')
        <div class="col-md-6">
            <div class="col">
                <div class="form-group">
                    <label for="created_at" class="control-label">{{ 'Fecha' }}</label>
                    <input class="form-control" name="created_at" type="date" id="created_at" value="{{ isset($investment->created_at) ? $investment->created_at : ''}}" required>
                </div>
            </div>
        </div>
    @endif
    <div class="col-md-6">
        <div class="btn-group pull-right mt-10" role="group">
            <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Invertir' }}">
        </div>
    </div>
</div>
