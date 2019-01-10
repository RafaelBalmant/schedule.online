<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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

            'title' => 'required',
            'value' => 'required',
            'description' => 'required|max:120',

        ];
    }

    public function messages()
    {
        return[
            'title.required' => 'Sinto muito, mas o titulo é obrigatorio',
            'value.required' => 'Sinto muito, mas o preço é obrigatorio',
            'description.required' => 'Sinto muito, mas a descrição é obrigatoria',
            'description.max' => 'Sinto muito, tente uma descrição menor',
        ];
    }
}
