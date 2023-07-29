<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Zone;
use Illuminate\Support\Facades\Validator;

class ZoneController extends Controller
{
    public function index()
    {
        $zones = Zone::get();

        return view('admin.zones.index', compact('zones'));
    }

    public function create()
    {
        $zone = Zone::all();
        return view('admin.zones.create',compact('zone'));
    }

    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name' => 'required|min:3',
        ]);

        try{
             Zone::create([
            'name' => $request->name,
        ]);
        return redirect()->route('zones.index')->with('success','Zone created successfully!!!!');
    }catch(\throwable $e){
        return redirect()->back()->with('error','Zone Failed!!!!');
    }
    }
 
    public function edit($id)
     {
        $product=Product::find($id);
        return view('admin.zones.edit', compact('zone'));
     }

     public function update(Request $request, $id)
     {   
        $validator=Validator::make($request->all(),[
        'name' => 'required|min:3',
    ]);
    try{ 
        $zone=Zone::find($id);
        $zone->name = $request->name;
        $zone->save();
        return redirect()->route('zones.index')->with('success','Zones updated successfully!');
    }catch(\throwable $e){
        return redirect()->back()->with('error','Zones Updation Failed!!!!');
    }
}

    public function destroy($id)
    {
        $zone =Zone::find($id);
        $zone->delete();
        return redirect()->route('zones.index')->with('success','Zones deleted successfully!');
    }
}