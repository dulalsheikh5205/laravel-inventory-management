<?php

namespace App\Http\Controllers\Pos;

use App\Models\Unit;
use App\Models\Invoice;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    public function InvoiceAll()
    {
        $allData = Invoice::orderBy('date','desc')->orderBy('id','desc')->get();
        return view('backend.invoice.invoice_all',compact('allData'));
        
    } // End Method

    public function InvoiceAdd()
    {

        $supplier = Supplier::all();
        $unit = Unit::all();
        $category = Category::all();

        return view('backend.invoice.invoice_add',compact('supplier','unit','category'));


    } // End Method
}
