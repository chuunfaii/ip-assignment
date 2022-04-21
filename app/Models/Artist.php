<?php

// Author:  Quah Khai Gene

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Parental\HasParent;

class Artist extends User
{
    use HasParent, HasFactory;

    public function artworks()
    {
        return $this->hasMany(Artwork::class);
    }
}
