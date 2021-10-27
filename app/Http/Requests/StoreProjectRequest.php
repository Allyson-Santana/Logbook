<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'Name' => 'required|between:3,45',
            'Description' => 'required|min:10',
            'Email_recipient' => 'required|email'
        ];
    }
    public function messages()
    {
       return [
        'Name.required' => 'Por favor insira o nome do projeto.',
        'Name.between' => 'Nome do projeto deve ter entre 3 e 40 caracteres.',

        'Description.required' => 'Por favor insira a descrição do projeto.',
        'Description.min' => 'Descrição do projeto deve ter no minimo 10 caracteres.',

        'Description.required' => 'Por favor insira o email de destinário',
        'Description.email' => 'E-mail invalido.' 
       ];
    }
}
