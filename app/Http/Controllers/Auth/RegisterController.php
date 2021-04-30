<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [

            'name' => 'required',
            // 'lastname' => 'required',
            // 'username' => 'required| unique:users',
            'document' => 'required| unique:users',
            'email' => 'required|unique:users',
            'telephone' => 'required|unique:users',
            'password' => 'confirmed|min:6',

        ],$this->messages());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data,$gen_id,$rol)
    {

        return User::create([
            'name' => $data['name'],
            'lastname' => $data['name'],
            'username' => $data['name'],
            'email' => $data['email'],
            'document' => $data['document'],
            'telephone' => $data['telephone'],
            'password' => Hash::make($data['password']),
            'user_id' => $gen_id,
            'rol' => $rol,
        ]);
    }

          public function messages()
{

    return[
        'name.required' => 'El nombre es requerido',
        // 'lastname.required' => 'El apellido es requerido',
        // 'username.required' => 'El nombre de usuario es requerido',
        'document.required' => 'El documento de identidad es requerido',
        'email.required' => 'El email es requerido',
        'email.unique' => 'El Email ya ha sido usado',
        'username.unique' => 'El nombre de usuario ya existe',
        'password.min' => 'La contraseña debe ser mínimo de 5 carácteres',
        'password.confirmed' => 'No coinciden las contraseñas',
        'telephone.unique' => 'El teléfono ya está en uso'
    ];
}



}
