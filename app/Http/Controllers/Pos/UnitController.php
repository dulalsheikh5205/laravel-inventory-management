<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    public function UnitAll()
    {
        // $units = Unit::all();
        $units = Unit::latest()->get();
        return view('backend.unit.unit_all',compact('units'));
    }//End Method

}
