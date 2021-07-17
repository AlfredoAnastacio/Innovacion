<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Pay extends Model
{
    protected $table = 'pays';
    protected $fillable = [
        'user_id','path_image','total','code_pay'
    ];


    public function validate(array $data)
    {
        return Validator::make($data, [


            'user_id' => 'unique:pays',
            'code_pay' => 'unique:pays',




        ],$this->messages());
    }

    public static function currencyExchange()
    {
        $user_id = Auth::id();
        $state = Status::where('user_id',$user_id)->first()->range;
        switch ($state)
        {
            case 1:
                $pay = 15;
                break;

            case 2:
                $pay = 60;
                break;
            case 3:
                $pay = 150;
                break;

            case 4:
                $pay = 300;
                break;

            default:
                $pay = 0;
                break;
        }

        $pay_add = $pay +($pay * 0.05);

        $response = Http::get('https://api.cambio.today/v1/quotes/USD/COP/json?quantity=1&key=4997|H55YxPENidqz_3kg7RDyiB4CDw*Dp4HO');
        $res = json_decode($response);
        $cop = $res->{'result'}->{'value'};

        return $cop * $pay_add;
    }

    public function messages()
    {

        return[

            'user_id.unique' => 'Ya hay un comprobante ingresado',

        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','user_id');
    }
}
