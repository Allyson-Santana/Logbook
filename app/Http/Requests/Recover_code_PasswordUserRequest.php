<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Recover_code_PasswordUserRequest extends FormRequest
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
            'email_contact' => 'required|email|exists:tb_user,nm_contact_email',
        ];
    }
    public function messages()
    {        
        return [
            'email_contact.required' => 'Por favor insira um email.',
            'email_contact.email' => 'O email informado é inválido.',
            'email_contact.exists' => 'E-mail não associada a nenhuma conta.',
        ];
    }
}
