<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Update_emailUserRequest extends FormRequest
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
            'Email' => 'required|email|unique:tb_user,nm_email',
        ];
    }

    
    public function messages()
    {
        return [
            'Email.required' => 'Por favor insira um Email.', 
            'Email.email' => 'Email inválido.', 
            'Email.unique' => 'Email já cadastrado',
        ];
        
    }
}
