<?php

namespace App\Http\Controllers\Pos;

use App\Models\Unit;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DefaultController extends Controller
{
    public function GetCategory(Request $request)
    {
        $supplier_id = $request->supplier_id;
        // dd($supplier_id);
        $allCategory = Product::with(['category'])->select('category_id')->where('supplier_id',$supplier_id)->groupBy('category_id')->get();
        // dd($allCategory);
        return response()->json($allCategory);

    } // End Method


    public function GetProduct(Request $request)
    {
        $category_id = $request->category_id;
      
        $allProduct = Product::where('category_id',$category_id)->get();
        
        return response()->json($allProduct);

    } // End Method
}
