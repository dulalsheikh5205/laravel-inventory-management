<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\Category;

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
}
