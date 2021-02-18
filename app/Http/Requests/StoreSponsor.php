<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class StoreSponsor extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

  

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                'sponsor_id' => 'numeric'
        ];
    }

    public function messages(){

        return[

            'sponsor_id.numeric' => 'El código de referente debe ser numérico',
            'sponsor_id.max' => 'El código de referente es de máximo 15 números'
        ];
    }


}
