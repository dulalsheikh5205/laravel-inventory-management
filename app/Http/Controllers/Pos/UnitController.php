<?php

namespace App\Http\Controllers\Pos;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
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


   public function  UnitEdit($id)
    {
        $unit = Unit::findOrFail($id);
        return view('backend.unit.unit_edit',compact('unit'));
    }// End Method


    // public function UnitUpdate(Request $request)
    // {
    //     $unit_id = $request->id;
    //     Unit::findOrFail($unit_id)->update([
    //         'name'=> $request->name,
    //         'updated_by'=> Auth::user()->id,
    //         'updated_at'=> Carbon::now(),
    //     ]);

    //     $notification = array(
    //         'message'=>'Unit updated successfully',
    //         'alert-type'=>'success',
    //     );

    //     return redirect()->route('unit.all')->with($notification); 

    // }// End Method by easylearningbd.com Kazi Ariyan

   
    public function UnitUpdate(Request $request)
    {
        $unit_id = $request->id;
        
        $data = Unit::where(['id'=>$unit_id])->first();
        // dd($data);
        $data->name = $request->name;
        $data->updated_by = Auth::user()->id;
        $data->updated_at = Carbon::now();
        $data->save();

            $notification = array(
            'message'=>'Unit updated successfully',
            'alert-type'=>'success',
        );

        return redirect()->route('unit.all')->with($notification); 

    } // End Method BY Aman Sir


    // public function UnitDelete($id)
    // {
    //     Unit::findOrFail($id)->delete();

    //     $notification = array(
    //         'message' => 'Unit Deleted Successfully', 
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->back()->with($notification);
    // } // End Method by easylearningbd.com Kazi Ariyan

    public function UnitDelete($id)
    {
       $unitDelete = DB::table('units')->where(['id'=>$id])->delete();

       if($unitDelete)
       {
        $notification = array(
            'message' => 'Unit Deleted Successfully', 
            'alert-type' => 'success'
        );
    
       }
       else
       {
            $notification = array(
                'message' => 'Unit  not Deleted ', 
                'alert-type' => 'error'
            );
       }// End if else BY m.k

  
        
        return redirect()->back()->with($notification);
    }// End Method BY Aman Sir

}
