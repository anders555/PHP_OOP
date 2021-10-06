<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            'name' => 'required|unique:categories,name'.$this->category->id,
            'title' => 'required|email:rfc,dns',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Сообщение 1',
            'name.max' => 'Сообщение 2',
            'name.email' => 'Сообщение 3',

        ];
    }
}
