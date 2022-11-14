<?php

namespace App\Http\Controllers\Pos;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    public function UnitAll()
    {
        // $units = Unit::all();
        $units = Unit::latest()->get();
        return view('backend.unit.unit_all',compact('units'));
    }//End Method


    public function  UnitAdd()
    {
        return view('backend.unit.unit_add');

    }// End Method

    // public function UnitStore(Request $request)
    // {
    //     Unit::insert([
    //         'name'=> $request->name,
    //         'created_by'=> Auth::user()->id,
    //         'created_at'=> Carbon::now(),
    //     ]);

    //     $notification = array(
    //         'message'=>'Unit  inserted successfully',
    //         'alert-type'=>'success',
    //     );

    //     return redirect()->route('unit.all')->with($notification);

    // }// End Method by easylearningbd.com Kazi Ariyan


    public function UnitStore(Request $request)
    {
             
        $data = new Unit();
        $data->name = $request->name;
        $data->created_by = Auth::user()->id;
        $data->created_at = Carbon::now();
        $data->save();

        
        $notification = array(
            'message'=>'Unit  inserted successfully',
            'alert-type'=>'success',
        );

        return redirect()->route('unit.all')->with($notification);

    }// End Method BY Aman Sir

}
