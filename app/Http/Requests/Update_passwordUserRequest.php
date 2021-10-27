<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Update_passwordUserRequest extends FormRequest
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
            'outPassword' => 'required',     
            'newPassword' => 'required|different:outPassword',            
            'ConfirmNewPassword' => 'required|same:newPassword',
        ];
    }

    public function messages()
    {
        return [
            'outPassword.required' => 'Por favor insira a senha atual.',
            
            'newPassword.required' => 'Por favor insira uma nova senha.',
            'newPassword.different' => 'Nova senha têm que se diferente da atual.',

            'ConfirmNewPassword.required' => 'Por favor informe a confirmação de nova senha.', 
            'ConfirmNewPassword.same' => 'Comfimarção de senha não confere com a nova.', 
        ];
    }

}
