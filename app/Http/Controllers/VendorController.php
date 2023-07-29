<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Vendor;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::get();

        return view('admin.vendors.index', compact('vendors'));
    }

    public function create()
    {
        $vendor = Vendor::all();
        return view('admin.vendors.create',compact('vendor'));
    }

    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name' => 'required|min:3',
        ]);

        try{
             Vendor::create([
            'name' => $request->name,
        ]);
        return redirect()->route('vendors.index')->with('success','Vendor created successfully!!!!');
    }catch(\throwable $e){
        return redirect()->back()->with('error','Vendor Failed!!!!');
    }
    }
 
    public function edit($id)
     {
        $vendor =Vendor::find($id);
        return view('admin.vendors.edit', compact('zone'));
     }

     public function update(Request $request, $id)
     {   
        $validator=Validator::make($request->all(),[
        'name' => 'required|min:3',
    ]);
    try{ 
        $vendor =Vendor::find($id);
        $vendor ->name = $request->name;
        $vendor ->save();
        return redirect()->route('vendors.index')->with('success','Vendors updated successfully!');
    }catch(\throwable $e){
        return redirect()->back()->with('error','Zones Updation Failed!!!!');
    }
}

    public function destroy($id)
    {
        $vendor =Vendor::find($id);
        $vendor ->delete();
        return redirect()->route('vendors.index')->with('success','Vendors deleted successfully!');
    }
}