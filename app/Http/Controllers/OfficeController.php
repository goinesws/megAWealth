<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_aboutUs()
    {
        return view('guest-and-member/aboutUs', [
            'office' => Office::paginate(5)
        ]);
    }

    public function index()
    {
        return view('admin.manageCompany',
        [
            'office' => Office::paginate(4)
        ]);
    }

    public function index_addOffice()
    {
        return view('admin.addOffice');
    }

    public function addOffice(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'contact_name' => 'required',
            'phone_number' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:10000',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('storage/office'), $imageName);

        $office = new Office();
        $office->name = $request->name;
        $office->address = $request->address;
        $office->contact_name = $request->contact_name;
        $office->phone_number = $request->phone_number;
        $office->image_link = $imageName;
        $office->save();
        return redirect()->route('manageCompany')->with('message', 'Office added successfully');
    }

    public function index_updateOffice($id)
    {
        $office = Office::where('office_id', $id)->first();
        return view('admin.updateOffice', [
            'office' => $office
        ]);
    }

    public function updateOffice(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'contact_name' => 'required',
            'phone_number' => 'required',
        ]);

        $office = Office::where('office_id', $id)->first();
        $office->name = $request->name;
        $office->address = $request->address;
        $office->contact_name = $request->contact_name;
        $office->phone_number = $request->phone_number;
        $office->update();

        return redirect()->route('manageCompany')->with('message', 'Office updated successfully');
    }

    public function deleteOffice($id)
    {
        $office = Office::where('office_id', $id)->first();
        $destinationPath = 'storage/office/';
        File::delete($destinationPath.'/'.$office->image_link);
        $office->delete();
        return redirect('/manageCompany')->with('message', 'Office deleted successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function show(Office $office)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function edit(Office $office)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Office $office)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $office)
    {
        //
    }
}
