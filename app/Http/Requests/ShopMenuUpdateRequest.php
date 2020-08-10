<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopMenuUpdateRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:120',
        ];
    }

    public function messages()
    {
        return [
            'title.min' => 'Минимальная длина поля Наименование 3 символа',
            'title.required' => 'Поле Наименование обязательно к заполнению',
            'title.max' => 'Максимальная длинна поля Наименование 120 символов',
        ];
    }
}
