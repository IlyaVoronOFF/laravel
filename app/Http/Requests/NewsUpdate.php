<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsUpdate extends FormRequest
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
            'description' => ['sometimes', 'string'],
            'image' => ['sometimes'],
            'author' => ['required', 'string'],
            'category_id' => ['required', 'integer', 'min:1'],
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
