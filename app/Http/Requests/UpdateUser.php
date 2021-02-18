<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateUser extends FormRequest
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

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'string|max:100',
            'lastname' => 'string|max:100',
            'username' => 'unique:users|string|max:15',
            'telephone' => 'numeric',
            'document' => 'numeric',
            'password' => 'confirmed|min:6',


        ];
    }

    public function messages()
    {
        return [
            'name.max:100' => 'Máximo 100 Carácteres',
            'lastname.max:100' => 'Máximo 100 Carácteres',
            'username.max:15' => 'Máximo 15 Carácteres',
            'username.unique' => 'El nombre de usuario está en uso'
        ];
    }
}
