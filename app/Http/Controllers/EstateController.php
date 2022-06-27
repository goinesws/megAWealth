<?php

namespace App\Http\Controllers;

use App\Models\Estate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


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

    public function index()
    {
        return view('admin.manageRealEstate', [
            'estates' => Estate::paginate(4)
        ]);
    }

    public function index_addEstate()
    {
        return view('admin.addRealEstate');
    }

    public function addEstate(Request $request)
    {
        $request->validate([
            'sales_type' => 'required|not_in:0',
            'building_type' => 'required|not_in:0',
            'price' => 'required',
            'location' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:10000',
        ]);

        $imageName = time().'.'.$request->image->extension();
        if($request->building_type == 1){
            $request->image->move(public_path('storage/apartment'), $imageName);}
        else if($request->building_type == 2){
            $request->image->move(public_path('storage/house'), $imageName);
        }

        $estate = new Estate();
        $estate->estate_id = Str::uuid();
        if($request->building_type == 1){
            $estate->building_type = 'Apartment';
        }
        else if($request->building_type == 2){
            $estate->building_type = 'House';
        }

        if($request->sales_type == 1){
            $estate->sales_type = 'Sale';
        }
        else if($request->sales_type == 2){
            $estate->sales_type = 'Rent';
        }

        $estate->status = 'Open';
        $estate->price = $request->price;
        $estate->location = $request->location;
        $estate->image_link = $imageName;
        $estate->save();
        return redirect()->route('manageEstate');
    }
}
