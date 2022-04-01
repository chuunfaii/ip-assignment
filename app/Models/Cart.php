<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $fillable = [
        'user_id',
        'artwork_id',
        'quantity',
    ];

    public function artworks(){
        return $this->belongsTo(Artwork::class, 'artwork_id', 'id');
    }

    public function total()
    {
        return $this->artworks()->sum('price');
    }

}
