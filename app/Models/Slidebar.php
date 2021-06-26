<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slidebar extends Model
{
    use HasFactory;
    protected $fillable = [
        'slideName',
        'title',
        'image'
    ];
    protected static function booted()
    {
        static::creating(function ($slide){
            $slide->slideName = strtoupper($slide->slideName);
        });
    }
}
