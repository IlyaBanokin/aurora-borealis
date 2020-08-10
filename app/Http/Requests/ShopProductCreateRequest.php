<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopProductCreateRequest extends FormRequest
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
            'title' => 'required|string|min:2|max:200',
            'excerpt' => 'required|string|max:180|min:10',
            'keywords' => 'max:160',
            'description' => 'max:180',
            'content' => 'required|string|max:5000',
            'price' => 'required|integer',

        ];
    }

    public function messages()
    {
        return [
            'title.min' => "Минимальная длина поля 'Название Товара' 2 символа",
            'title.required' => "Поле 'Название Товара' обязательно к заполнению",
            'title.max' => "Максимальная длинна поля 'Название Товара' 200 символов",
            'excerpt.required' => "Поле 'Выдержка' обязательное для заполнения",
            'excerpt.max' => "Максимальная длинна поля 'Выдержка' 180 символов",
            'excerpt.min' => "Минимальная длина поля 'Выдержка' 10 символов",
            'keywords.max' => 'Максимальная длинна поля :attribute 160 символов',
            'description.max' => 'Максимальная длинна поля :attribute 180 символов',
            'content.max' => "Максимальная длина поля 'Контент' 5000 символов",
            'content.required' => "Поле 'Контент' обязательно к заполнению",
            'price.required' => "Поле 'Цена' обязательно к заполнению",
            'price.integer' => "Поле 'Цена' должно быть целым числом",
        ];
    }
}
