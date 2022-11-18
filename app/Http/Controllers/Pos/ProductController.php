<?php

namespace App\Http\Controllers\Pos;

use App\Models\Unit;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function ProductAll()
    {
        // $products = Product::all();
        $products = Product::latest()->get();
        return view('backend.product.product_all',compact('products'));

    } // End Method


    public function ProductAdd()
    {
        $supplier = Supplier::all();
        $unit = Unit::all();
        $category = Category::all();

        return view('backend.product.product_add',compact('supplier','unit','category'));

    }// End Method
    
    //supplier_id	unit_id	category_id	name	quantity	status	created_by	updated_by	created_at	updated_at

    public function ProductStore(Request $request)
    {
        Product::insert([
            'name'=> $request->name,
            'supplier_id'=>$request->supplier_id,
            'unit_id'=>$request->unit_id,
            'category_id'=>$request->category_id,
            'quantity'=>'0',
            'created_by'=> Auth::user()->id,
            'created_at'=> Carbon::now(),
        ]);

        $notification = array(
            'message'=>'Product inserted successfully',
            'alert-type'=>'success',
        );

        return redirect()->route('product.all')->with($notification);
    }// End Method
}
