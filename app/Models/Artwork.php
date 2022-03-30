<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'artworks';

    protected $fillable = [
        'name',
        'quantity',
        'price',
        'description',
        'image_url',
        'user_id',
        'category_id',
    ];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
