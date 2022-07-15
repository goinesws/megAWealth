<?php

namespace App\Models;
use App\Models\Estate;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function estate()
    {
        return $this->belongsTo(Estate::class, 'estate_id', 'estate_id');
    }
}
