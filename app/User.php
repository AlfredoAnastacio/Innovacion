<?php

namespace App;


use App\Models\Status;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'city',
        'document',
        'country',
        'rol',
        'telephone',
        'user_id',
        'username',
        'lastname',
        'rol',
        'nivel_tree',
        'code_tree',
        'range',
        'state',
        'sponsor_id',
        'refer_by_admin',
        'tree_sponsor'
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
            // 'lastname' => 'required',
            // 'username' => 'required| unique:users',
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

    protected function registered($user_id)
    {

        $status = new Status();
        $status->user_id =$user_id;
        $status->state = 'Inactivo';
        $status->range = 1;
        $status->save();


    }
}
