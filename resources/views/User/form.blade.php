<link rel="stylesheet" href="{{asset('css/style-register.css')}}">


<center>
    @if(!isset($referralCode))
    <p>
        <input name="sponsor_id" type="number"  class="mail" id="sponsor_id" placeholder="Código Patrocinador" value="{{ request()->input('sponsor_id', old('sponsor_id'))}}" required>
    <p>

        @else
        <p>
            <input name="sponsor_id" type="number"  class="mail" id="sponsor_id" placeholder="Código Patrocinador" value="{{$referralCode}}" readonly>
        <p>

            @endif

    <p>
        <input name="name" id="name" type="text" class="name" id="name" placeholder="Nombre" value="{{ request()->input('name', old('name'))}}">
<p>


    <p>
        <input name="lastname" id="lastname" type="text" class="name" id="lastname" placeholder="Apellido" value="{{ request()->input('lastname', old('lastname'))}}">
<p>

    <p>
        <input name="username" id="username" type="text" class="name" id="username" placeholder="Nombre de Usuario" value="{{ request()->input('username', old('username')) }}">
<p>

    <p>
        <input name="document" type="number" id="document" placeholder="Número de documento" class="name" value="{{ request()->input('document', old('document'))}}">
<p>

    <p>
        <input name="telephone" type="tel" class="name" id="telephone" placeholder="Número telefónico" value="{{ request()->input('telephone', old('telephone'))}}">
        <p>

            <p>
                <input name="email" type="email" required="required" class="mail" id="email" placeholder="Correo electrónico" value="{{ request()->input('email', old('email'))}}">
                <p>

                    <input name="password" type="password" required="required" class="pass" id="password" placeholder="Crear contraseña">
                    <p>

                        <input type="password" name="password_confirmation"
                            class="pass" id="password_confirmation" placeholder="Confirmar contraseña">


                        <div class="form-group">
                            <input class="sing" type="submit" name="submit" value="Inscribirme">
                        </div>

                        <p class="forget">¿Ya tienes cuenta?</p>
                        <p class="forget">Ingresa <a href="/login">aquí.</a>      </p>



</center>




