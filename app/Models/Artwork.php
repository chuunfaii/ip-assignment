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
        'stripe_product_id',
        'stripe_price_id',
        'quantity',
        'price',
        'description',
        'image_url',
        'user_id',
        'category_id',
    ];

    public function presentPrice()
    {
        return "$ " . number_format($this->price, 2);
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
