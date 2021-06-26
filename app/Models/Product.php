<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'proName',
        'price',
        'image',
        'content',
        'type_id'
    ];
    protected static function booted()
    {
        static::creating(function ($pro){
            $pro->proName = strtoupper($pro->proName);
        });
    }
}
