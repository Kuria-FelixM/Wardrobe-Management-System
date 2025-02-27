<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clothingItem extends Model
{
    /** @use HasFactory<\Database\Factories\ClothingItemFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'brand'
    ];
}
