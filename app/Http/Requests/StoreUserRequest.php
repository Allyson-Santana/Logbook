<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'Name' => 'required|between:3,20',
            'Email' => 'required|email|unique:tb_user,nm_email',
            'Password' => 'required',            
            'ConfirmPassword' => 'required|same:Password',
            
        ];
    }

    public function messages()
    {
        return [
            'Name.required' => 'Por favor insira um none.', 
            'Name.between' => 'Nome deve ter entre 3 a 30 caracteres.', 

            'Email.required' => 'Por favor insira um Email.', 
            'Email.Email' => 'Email inválido.', 
            'Email.unique' => 'Email já cadastrado',

            'Password.required' => 'Por favor insira uma senha.', 

            'ConfirmPassword.required' => 'Por favor informe a confirmação da senha.', 
            'ConfirmPassword.same' => 'Confirmação de senha não confere.'
                 
        ];
        
    }

}
