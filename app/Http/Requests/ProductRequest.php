<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0.01',
            'stock' => 'required|integer|min:0'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'กรุณากรอกชื่อสินค้า',
            'price.required' => 'กรุณากรอกราคา',
            'price.min' => 'ราคาต้องมากกว่า 0',
            'stock.required' => 'กรุณากรอกจำนวนสต็อก',
            'stock.min' => 'สต็อกต้องไม่น้อยกว่า 0'
        ];
    }
}
