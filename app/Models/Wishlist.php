<?php

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

    public function artworks(){
        return $this->belongsTo(Artwork::class,'artwork_id','id');
    }
}