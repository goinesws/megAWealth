<?php

namespace App\Models;
use App\Models\Cart;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    use HasFactory;

    protected $primaryKey = 'estate_id';

    protected $casts = [
        'estate_id' => 'string'
    ];

    public function cart()
    {
        return $this->hasOne(Cart::class, 'estate_id', 'estate_id');
    }
}
