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

    public function artwork()
    {
        return $this->belongsTo(Artwork::class, 'artwork_id', 'id');
    }

    public function subtotal()
    {
        return $this->artwork->price * $this->quantity;
    }
}
