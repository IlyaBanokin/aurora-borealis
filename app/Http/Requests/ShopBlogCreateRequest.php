<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopBlogCreateRequest extends FormRequest
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
            'title' => 'required|string|min:2|max:62',
            'content' => 'required|string|max:5000|min:10',
            'keywords' => 'max:160',
            'description' => 'max:180',
        ];
    }

    public function messages()
    {
        return [
            'title.min' => "Минимальная длинна поля 'Наименование статьи' составляет 2 символа",
            'title.required' => "Поле 'Наименование статьи' обязательно к заполнению",
            'title.max' => "Максимальная длинна поля 'Наименование статьи' составляет 62 символа",
            'content.required' => "Поле 'Контент' обязательно к заполнению",
            'content.max' => "Максимальная длинна поля 'Контент' составляет 5000 символов",
            'content.min' => "Минимальная длинна поля 'Контент' составляет 100 символов",
            'keywords.max' => "Максимальная длинна поля 'Keywords' составляет 160 символов",
            'description.max' => "Максимальная длинна поля 'Description' составляет 180 символов",
        ];
    }
}
