<?php

// Author:  Lee Chun Fai

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlists';

    protected $fillable = [
        'user_id',
        'artwork_id',
    ];

    public function artwork()
    {
        return $this->belongsTo(Artwork::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'user_id');
    }
}
