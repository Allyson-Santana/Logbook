<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Update_email_contactUserRequest extends FormRequest
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
            'Email_contact' => 'required|email',
        ];
    }

    
    public function messages()
    {
        return [
            'Email_contact.required' => 'Por favor insira um Email de contato.', 
            'Email_contact.email' => 'Email de contato inválido.', 
        ];
        
    }
}
