<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Parental\HasChildren;

class User extends Authenticatable
{
    use HasChildren, HasFactory, SoftDeletes;

    protected $table = 'users';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'bio',
        'image_URL',
        'type',
    ];

    protected $hidden = [
        'password',
    ];

    protected $childTypes = [
        'customer' => Customer::class,
        'artist' => Artist::class,
    ];

    public function presentFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function isCustomer(): bool
    {
        return $this->type === 'customer';
    }

    public function isArtist(): bool
    {
        return $this->type === 'artist';
    }

    public function totalPrice(){
        return $this->hasMany(Cart::class)
                    ->join('artworks', 'carts.artwork_id', 'artworks.id')
                    ->select('artworks.*',
                             \DB::raw('carts.quantity * artworks.price as price')
                            );
       }
}
