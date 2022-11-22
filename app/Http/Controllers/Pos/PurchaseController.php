<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\Product;
use App\Models\Category;

class PurchaseController extends Controller
{
    public function PurchaseAll()
    {
        $allData = Purchase::orderBy('date','desc')->orderBy('id','desc')->get();
        return view('backend.purchase.purchase_all',compact('allData'));
    } // End Method


    public function PurchaseAdd()
    {
        $supplier = Supplier::all();
        $unit = Unit::all();
        $category = Category::all();

        return view('backend.purchase.purchase_add',compact('supplier','unit','category'));

    } // End Method
}
