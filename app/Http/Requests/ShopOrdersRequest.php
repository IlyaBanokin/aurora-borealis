<?php

namespace App\Http\Requests;

use App\Rules\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class ShopOrdersRequest extends FormRequest
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
            'phone' => ['required', new PhoneNumber],
            'text' => 'max:150',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле :attribute обязательное для заполнения',
            'phone.required' => 'Поле :attribute обязательное для заполнения',
            'name.min' => 'Минимальная длина поля :attribute 2 символа',
            'name.max' => 'Максимальная длина поля :attribute 35 символов',
            'text.max' => 'Максимальная длина поля :attribute 150 символов',
        ];
    }
}
