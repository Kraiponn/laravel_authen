<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFoodPost extends FormRequest
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
            'image' => 'required|mimes:jpeg,bmp,png',
            'typefood_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'โปรดกรอกชื่อประเภทอาหาร',
            'price.required' => 'โปรดใส่ราคา',
            'price.numeric' => 'ราคาต้องเป็นตัวเลยนะครับ',
            'image.required' => 'โปรดเลือกรูปภาพสำหรับอัปโหลด',
            'image.mimes' => 'คุณต้องเลือกรูปภาพ .png .bmp หรือ .jpg เท่านั้น',
            'typefood_id.required' => 'โปรดเลือกประเภทอาหาร ด้วยครับ',
        ];
    }

}
