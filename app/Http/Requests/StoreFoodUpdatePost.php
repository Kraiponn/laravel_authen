<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFoodUpdatePost extends FormRequest
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
            'name' => 'required',
            'price' => 'required|numeric',
            'typefood_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'โปรดใส่รายการอาหาร',
            'price.required' => 'โปรดใส่ราคา',
            'price.numeric' => 'ราคาต้องเป็นตัวเลยนะครับ',
            'typefood_id.required' => 'โปรดเลือกประเภทอาหาร ด้วยครับ',
        ];
    }

}
