<?php

namespace App\Http\Controllers\Pos;

use Image;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
    // }// End Method by easylearningbd.com Kazi Ariyan


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
            'message'=>'Customer updated with image successfully',
            'alert-type'=>'success',
        );

        return redirect()->route('customer.all')->with($notification);
    }// End Method BY Aman Sir


    public function CustomerEdit($id)
    {
        // $customer = Customer::findOrFail($id);
        $customer = Customer::find($id);
        return view('backend.customer.customer_edit',compact('customer'));
        
    }// End Method


    // public function CustomerUpdate(Request $request)
    // {
    //     $customer_id = $request->id;
    //     if($request->file('customer_image'))
    //     {
    //         $image = $request->file('customer_image');
    //         $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); // 32254.png 
    //         Image::make($image)->resize(200,200)->save('upload/customer/'.$name_gen);
    //         $save_url = 'upload/customer/'.$name_gen;

    //         Customer::findOrFail($customer_id)->update([
    //             'name'=>$request->name,
    //             'mobile_no'=>$request->mobile_no,
    //             'email'=>$request->email,
    //             'address'=>$request->address,
    //             'customer_image'=>$save_url,
    //             'updated_by'=>Auth::user()->id,
    //             'updated_at'=>Carbon::now(),
    //         ]);

    //         $notification = array(
    //             'message'=>'Customer updated with image successfully',
    //             'alert-type'=>'success',
    //         );

    //         return redirect()->route('customer.all')->with($notification);

    //     }else{

            
    //         Customer::findOrFail($customer_id)->update([
    //             'name'=>$request->name,
    //             'mobile_no'=>$request->mobile_no,
    //             'email'=>$request->email,
    //             'address'=>$request->address,
    //             'updated_by'=>Auth::user()->id,
    //             'updated_at'=>Carbon::now(),
    //         ]);

    //         $notification = array(
    //             'message'=>'Customer updated without image successfully',
    //             'alert-type'=>'success',
    //         );

    //         return redirect()->route('customer.all')->with($notification);

    //     } // end else

    // }// End Method by easylearningbd.com Kazi Ariyan
    


    public function CustomerUpdate(Request $request)
    {
        $customer_id = $request->id;
        
        $customer = Customer::where(['id'=>$customer_id])->first();
        // dd($customer);
        $customer->name = $request->name;
        $customer->mobile_no = $request->mobile_no;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->updated_by = Auth::user()->id;
        $customer->updated_at = Carbon::now();
        
        if($request->hasFile('customer_image'))
        {
            
          
            if(Storage::exists('/public/upload/customerStorage/'.$customer->customer_image))
            {
                Storage::delete('/public/upload/customerStorage/'.$customer->customer_image);
            }

            $image = $request->file('customer_image');
            $ext = $image->extension();
            $image_name = time().'.'.$ext;
            $image->storeAs('/public/upload/customerStorage/',$image_name);
            $customer->customer_image = $image_name;
        }

            
            $customer->save();
    
            $notification = array(
                'message'=>'Customer updated with image successfully',
                'alert-type'=>'success',
            );
    
            return redirect()->route('customer.all')->with($notification);
        
        
    } // End Method BY Aman Sir

    // public function CustomerDelete($id)
    // {
    //     $customers = Customer::findOrFail($id);
    //     $img = $customers->customer_image;
    //     unlink($img);


    //     Customer::findOrFail($id)->delete();

    //     $notification = array(
    //         'message' => 'Customer Deleted Successfully', 
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->back()->with($notification);
    // }// End Method by easylearningbd.com Kazi Ariyan

    public function CustomerDelete($id)
    {
        $customerImage = DB::table('customers')->where(['id'=>$id])->get();
        // dd($customerImage);
        if(Storage::exists('/public/upload/customerStorage/'.$customerImage[0]->customer_image))
        {
            Storage::delete('/public/upload/customerStorage/'.$customerImage[0]->customer_image);
        }

        DB::table('customers')->where(['id'=>$id])->delete();

        $notification = array(
                    'message' => 'Customer Deleted Successfully', 
                    'alert-type' => 'success'
                );
        
                return redirect()->back()->with($notification);

    }// End Method BY Aman Sir

    
    
    public function status(Request $request,$status,$id)
    {
        $model = Customer::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('message','customer status update');
        return redirect('/customer/all');
    }
    
    

    }
