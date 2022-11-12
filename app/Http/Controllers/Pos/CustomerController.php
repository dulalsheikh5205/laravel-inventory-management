<?php

namespace App\Http\Controllers\Pos;

use Image;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function CustomerAll()
    {
         // $customers = Customer::all();
         $customers = Customer::latest()->get();
         return view('backend.customer.customer_all',compact('customers'));

    }// End Method

    public function CustomerAdd()
    {
        return view('backend.customer.customer_add');
    }// End Method

    // public function CustomerStore(Request $request)
    // {
    //     $image = $request->file('customer_image');
    //     $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // 32254.png 
    //     Image::make($image)->resize(200,200)->save('upload/customer/'.$name_gen);
    //     $save_url = 'upload/customer/'.$name_gen;

    //     Customer::insert([
    //         'name'=>$request->name,
    //         'mobile_no'=>$request->mobile_no,
    //         'email'=>$request->email,
    //         'address'=>$request->address,
    //         'customer_image'=>$save_url,
    //         'created_by'=>Auth::user()->id,
    //         'created_at'=>Carbon::now(),
    //     ]);

    //     $notification = array(
    //         'message'=>'Customer inserted successfully',
    //         'alert-type'=>'success',
    //     );

    //     return redirect()->route('customer.all')->with($notification);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
    // }// End Method


    public function CustomerStore(Request $request)
    {
        
        $data = new Customer();
        $data->name = $request->name;
        $data->mobile_no = $request->mobile_no;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->created_by = Auth::user()->id;
        $data->created_at = Carbon::now();

  
        if($request->hasFile('customer_image'))
        {
            $image = $request->file('customer_image');
            $ext = $image->extension();
            $image_name = time().'.'.$ext;
            $image->storeAs('/public/upload/customerStorage/',$image_name);
            $data->customer_image = $image_name;
        }
        $data->save();

        $notification = array(
            'message'=>'Customer inserted successfully',
            'alert-type'=>'success',
        );

        return redirect()->route('customer.all')->with($notification);
    }//End Method

}
