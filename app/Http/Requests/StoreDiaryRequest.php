<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDiaryRequest extends FormRequest
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
            'Project_id' => 'required|exists:tb_project,cd_project',
            'DataDiary' => 'required|date',
            'SearchSource' => 'nullable',
            'ActivityPreview' => 'required|min:10',
            'DifficultyDevelopment' => 'required|min:10',
            'GuidelinesTeacherDuring' => 'required|min:10',
            'GuidelinesTeacherBe' => 'required|min:10'
        ];
    }

    public function messages()
    {
        return[
            'Project_id.required' => 'Por favor, insirar qual é o projeto.',
            'Project_id.exists' => 'Projeto enexitente',

            'DataDiary.required' => 'por favor insira a data',
            'DataDiary.date' => 'Data inválida',

            'ActivityPreview.required' => 'Por favor escrevar uma descrição.',
            'ActivityPreview.min' => 'insirar com no minimo 12 caracteres',

            'DifficultyDevelopment.required' => 'Por favor escrevar uma descrição.',
            'DifficultyDevelopment.min' => 'insirar com no minimo 12 caracteres',
            
            'GuidelinesTeacherDuring.required' => 'Por favor escrevar uma descrição.',
            'GuidelinesTeacherDuring.min' => 'insirar com no minimo 12 caracteres',

            'GuidelinesTeacherBe.required' => 'Por favor escrevar uma descrição.',
            'GuidelinesTeacherBe.min' => 'insirar com no minimo 12 caracteres',

        ];
    }
}
