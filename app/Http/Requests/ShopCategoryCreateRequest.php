<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopCategoryCreateRequest extends FormRequest
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
            'title' => 'required|string|min:2|max:120',
            'excerpt' => 'required|string|max:320|min:10',
            'keywords' => 'max:160',
            'description' => 'max:180',
        ];
    }

    public function messages()
    {
        return [
            'title.min' => "Минимальная длинна поля 'Наименование категории' 2 символа",
            'title.required' => "Поле 'Наименование категории' обязательно к заполнению",
            'title.max' => "Максимальная длинна поля 'Наименование категории' 120 символа",
            'excerpt.required' => "Поле 'Описание' обязательно к заполнению",
            'excerpt.max' => "Максимальная длинна поля 'Описание' 320 символов",
            'excerpt.min' => "Минимальная длинна поля 'Описание' 10 символа",
            'keywords.max' => "Максимальная длинна поля 'Keywords' 160 символов",
            'description.max' => "Максимальная длинна поля 'Description' 180 символов",
        ];
    }
}
