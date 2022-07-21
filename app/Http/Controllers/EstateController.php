<?php

namespace App\Http\Controllers;

use App\Models\Estate;
use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;



class EstateController extends Controller
{
    public function buy()
    {
        return view('guest-and-member.buy', [
            'estates' => Estate::where([

                ['sales_type', '=', 'Sale'],

                ['status', '=', 'Open']

            ])->paginate(4)
        ]);
    }

    public function rent()
    {
        return view('guest-and-member.rent', [
            'estates' => Estate::where([

                ['sales_type', '=', 'Rent'],

                ['status', '=', 'Open']

            ])->paginate(4)
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
        $request->image->move(public_path('storage/estate'), $imageName);


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

    public function index_updateEstate($id)
    {
        $estate = Estate::where('estate_id', $id)->first();
        return view('admin.updateRealEstate', [
            'estate' => $estate
        ]);
    }


    public function updateEstate(Request $request, $id)
    {
        $request->validate([
            'sales_type' => 'required|not_in:0',
            'building_type' => 'required|not_in:0',
            'price' => 'required',
            'location' => 'required',
        ]);

        $estate = Estate::where('estate_id', $id)->first();
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

        $estate->price = $request->price;
        $estate->location = $request->location;
        $estate->update();
        return redirect()->route('manageEstate')->with('message', 'Estate updated successfully');
    }

    public function changeCartStatus(Request $request, $id)
    {


        $estate = Estate::where('estate_id', $id)->first();
        $estate->status = "Transaction Complete";

        $tr = new Transaction();
        $tr->transaction_id = Str::uuid();
        $tr->user_id = $estate->cart->user_id;
        $tr->estate_id = $id;
        $tr->transaction_date = date('Y-m-d');
        $tr->save();

        $estate->update();
        Cart::where('user_id', $estate->cart->user_id)->delete();
        return redirect()->route('manageEstate')->with('message', 'Transaction Completed for '.$estate->building_type." at ".$estate->location);
    }

    public function deleteEstate($id)
    {
        $estate = Estate::where('estate_id', $id)->first();
        $tr = Transaction::where('estate_id', $estate->estate_id)->first();
        $destinationPath = 'storage/estate/';
        File::delete($destinationPath.'/'.$estate->image_link);
        if($tr){
            $tr->delete();
        }
        $estate->delete();
        return redirect()->route('manageEstate')->with('message', 'Estate deleted successfully');

    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required',
        ]);

        $search = strtoupper($request->search);

        if($search == 'SALE' || $search == 'BUY'){
            $estates = Estate::where([
                ['sales_type', '=', 'Sale'],
                ['status', '=', 'Open']
            ])->paginate(4);
        }

        else if($search == 'RENT'){
            $estates = Estate::where([
                ['sales_type', '=', 'Rent'],
                ['status', '=', 'Open']
            ])->paginate(4);
        }

        else if($search == 'HOUSE'){
            $estates = Estate::where([
                ['building_type', '=', 'House'],
                ['status', '=', 'Open']
            ])->paginate(4);
        }

        else if($search == 'APARTMENT'){
            $estates = Estate::where([
                ['building_type', '=', 'Apartment'],
                ['status', '=', 'Open']
            ])->paginate(4);
        }

        else{
            $estates = Estate::where([
                ['location', 'like', '%'.$search.'%'],
                ['status', '=', 'Open']
            ])->paginate(4);
        }


        return view('searchResult', [
            'searchinput' => $request->search,
            'estates' => $estates,
            'search' => $search
        ]);
    }
}
