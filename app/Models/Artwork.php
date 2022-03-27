<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    use HasFactory;
    protected $table = 'artworks';
    protected $fillable = [
        'name',
        'quantity',
        'price',
        'description',
        'image',
        'artistId',
        'categoryId',
    ];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
}
