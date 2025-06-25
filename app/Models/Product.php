<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'stock' => 'integer'
    ];

    // Validation rules
    public static function validationRules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0.01',
            'stock' => 'required|integer|min:0'
        ];
    }

    public static function validationMessages()
    {
        return [
            'name.required' => 'ชื่อสินค้าเป็นข้อมูลที่จำเป็น',
            'name.max' => 'ชื่อสินค้าต้องไม่เกิน 255 ตัวอักษร',
            'price.required' => 'ราคาเป็นข้อมูลที่จำเป็น',
            'price.numeric' => 'ราคาต้องเป็นตัวเลข',
            'price.min' => 'ราคาต้องมากกว่า 0',
            'stock.required' => 'จำนวนสต็อกเป็นข้อมูลที่จำเป็น',
            'stock.integer' => 'จำนวนสต็อกต้องเป็นจำนวนเต็ม',
            'stock.min' => 'จำนวนสต็อกต้องไม่น้อยกว่า 0'
        ];
    }
}
