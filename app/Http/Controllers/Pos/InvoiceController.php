<?php

namespace App\Http\Controllers\Pos;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    public function InvoiceAll()
    {
        $allData = Invoice::orderBy('date','desc')->orderBy('id','desc')->get();
        return view('backend.invoice.invoice_all',compact('allData'));
        
    } // End Method
}
