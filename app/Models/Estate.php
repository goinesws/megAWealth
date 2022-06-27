<?php

namespace App\Models;
use App\Models\Cart;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    use HasFactory;

    protected $primaryKey = 'estate_id';
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
}
