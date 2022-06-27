<?php

namespace App\Http\Controllers;

use App\Models\Estate;
use Illuminate\Http\Request;

class EstateController extends Controller
{
    public function buy()
    {
        return view('guest-and-member.buy', [
            'estates' => Estate::where('sales_type', 'Sale')->paginate(4)
        ]);
    }

    public function rent()
    {
        return view('guest-and-member.rent', [
            'estates' => Estate::where('sales_type', 'Rent')->paginate(4)
        ]);
    }
}
