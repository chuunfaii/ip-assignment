<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Parental\HasParent;

class Customer extends User
{
    use HasParent, HasFactory;
}
