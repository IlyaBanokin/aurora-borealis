<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopContactsRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:35',
            'email' => 'required|max:40|email',
            'text' => 'required|string|max:255|min:5',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле :attribute обязательное для заполнения',
            'email.required' => 'Поле :attribute обязательное для заполнения',
            'text.required' => 'Поле :attribute обязательное для заполнения',
            'name.min' => 'Минимальная длина :attribute 2 символа',
            'text.min' => 'Минимальная длина :attribute 5 символов',
        ];
    }
}
