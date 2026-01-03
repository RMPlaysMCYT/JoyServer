<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClothesItem extends Model
{
    use HasFactory;
    protected $table = 'clothes_item';

    protected $fillable = [
        'sku',
        'image',
        'name',
        'price',
        'description',
    ];
}
