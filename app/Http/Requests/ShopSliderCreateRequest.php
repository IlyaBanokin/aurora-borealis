<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopSliderCreateRequest extends FormRequest
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
            'title' => 'max:30',
            'description' => 'max:195',
        ];
    }

    public function messages()
    {
        return [
            'title.max' => "Максимальная длина поля 'Заголовок' - 30 символов",
            'description.max' => "Максимальная длина поля 'Краткое описание' - 195 символов",
        ];
    }
}
