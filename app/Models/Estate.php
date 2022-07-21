<?php

namespace App\Models;
use App\Models\Cart;
use App\Models\Transaction;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'estate_id', 'estate_id');
    }

}
