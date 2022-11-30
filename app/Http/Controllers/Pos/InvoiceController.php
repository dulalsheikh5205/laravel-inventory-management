<?php

namespace App\Http\Controllers\Pos;

use App\Models\Unit;
use App\Models\Invoice;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;

class InvoiceController extends Controller
{
    public function InvoiceAll()
    {
        $allData = Invoice::orderBy('date','desc')->orderBy('id','desc')->get();
        return view('backend.invoice.invoice_all',compact('allData'));
        
    } // End Method

    public function InvoiceAdd()
    {

        $category = Category::all();
        $customer = Customer::all();
        $invoice_data = Invoice::orderBy('id','desc')->first();
        if($invoice_data == null){
            $firstReg = '0';
            $invoice_no = $firstReg+1;
        }else{
            $invoice_data = Invoice::orderBy('id','desc')->first()->invoice_no;
            $invoice_no = $invoice_data+1;
        }

        $date = date('Y-m-d');

        return view('backend.invoice.invoice_add',compact('invoice_no','category','date','customer'));


    } // End Method


    public function InvoiceStore(Request $request)
    {
        if($request->category_id == null ){

            $notification = array(
                'message'=>'Sorry You do not select any item',
                'alert-type'=>'error',
            );
            return redirect()->back()->with($notification);

        } else{
            if($request->paid_amount > $request->estimated_amount){

                $notification = array(
                    'message'=>'Sorry Paid Amount is Maximum the total price',
                    'alert-type'=>'error',
                );
                return redirect()->back()->with($notification);

            } else{

                
            }
        }
    } // End Method
}
