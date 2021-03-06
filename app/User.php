<?php

namespace App;


use App\Models\Status;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Validator;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','city','document','country','rol','telephone','user_id','username','lastname','rol'
    ];

    protected $table ='users';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $primaryKey = 'user_id';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin(){
        if($this->rol){
            return true;
        }

        return false;

    }
    public function validate(array $data)
    {
        return Validator::make($data, [

            'name' => 'required',
            'lastname' => 'required',
            'username' => 'required| unique:users',
            'document' => 'required| unique:users',
            'email' => 'required|unique:users',
            'telephone' => 'required|unique:users',
            'password' => 'confirmed|min:6',

        ],$this->messages());
    }

    public function messages()
    {

        return[
            'name.required' => 'El nombre es requerido',
            'lastname.required' => 'El apellido es requerido',
            'username.required' => 'El nombre de usuario es requerido',
            'document.required' => 'El documento de identidad es requerido',
            'email.required' => 'El email es requerido',
            'email.unique' => 'El Email ya ha sido usado',
            'username.unique' => 'El nombre de usuario ya existe',
            'password.min' => 'La contrase??a debe ser m??nimo de 5 car??cteres',
            'password.confirmed' => 'No coinciden las contrase??as',
            'telephone.unique' => 'El tel??fono ya est?? en uso'
        ];
    }

    protected function registered($user_id)
    {

        $status = new Status();
        $status->user_id =$user_id;
        $status->state = 'Inactivo';
        $status->range = 1;
        $status->save();


    }
}
