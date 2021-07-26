<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdate extends FormRequest
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
            'title' => ['required', 'string', 'min:3', 'max:199'],
            'description' => ['sometimes', 'string']
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Необходимо заполнить поле :attribute'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Заголовок'
        ];
    }
}