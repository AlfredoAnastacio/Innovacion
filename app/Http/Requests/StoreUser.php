<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
            'name' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'username' => 'unique:users|required|string|max:15',
            'email' => 'required|email|unique:users',
            'telephone' => 'numeric|unique:users',
            'document' => 'numeric|unique:users',
            'city' => 'required|string|max:20',
            'country' => 'required|string|max:20'

        ];
    }

    public function messages()
{
    return [
        'name.required' => 'Agrega el nombre del estudiante.',
        'lastname.required' =>'El nombre del estudiante no puede ser mayor a :max caracteres.',
        'username.unique' => 'Agrega la puntuación al estudiante.',
        'document.numeric' => 'La puntuación debe ser un número',
        'city.required' => 'La puntuación debe estar entre :min y :max',
    ];
}

}
