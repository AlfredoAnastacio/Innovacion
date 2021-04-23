<link rel="stylesheet" href="{{asset('css/style-register.css')}}">



<center>

    <p>

        <label  for="entity">State</label>
        <select class="custom-select griz" name="entity" id="entity" class="form-control">
          <option selected>Elija el banco..</option>

          @for ($i=0;$i<=$length;$i++)
          @foreach ($contents as $item)
          <option>

                {{$item->title}}
        </option>
        @endforeach
        @endfor
        </select>


        <p>
            <input name="number" id="number" type="text" class="name"  placeholder="Número cuenta" value="{{ request()->input('number', old('number'))}}">
    <p>

      <p>
        <input name="user_id"  type="numeric" class="name" id="number" placeholder="Usuario" value="{{ isset($user_id) ? $user_id : ''}}" hidden>
<p>

        <p>
            <input name="document" id="document" type="numeric" class="name"  placeholder="Document" value="{{ request()->input('document', old('document'))}}">
    <p>

        <label   for="type">State</label>
        <select class="custom-select griz" name="type" id="type" class="form-control">
          <option selected>Tipo de cuenta</option>
          <option > Ahorros
        </option>
        <option > Corriente
        </option>
        <option > Ninguna
        </option>
        </select>

        <div class="col-md-6">
          <div class="btn-group pull-right mt-10" role="group">
              <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">

          </div>
          <!-- /.btn-group -->
      </div>



</center>




