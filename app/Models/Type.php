<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $fillable = [
        'typeName',
        'show',
        'category_id'
    ];
    protected static function booted()
    {
        static::creating(function ($type){
            $type->typeName = strtoupper($type->typeName);
        });
    }
}
