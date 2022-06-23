<?php

namespace App\Models;
use App\Models\Cart;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    use HasFactory;


    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
}
