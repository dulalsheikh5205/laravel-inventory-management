<?php

namespace App\Http\Controllers\Pos;

use App\Models\Unit;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
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

    // public function ProductStore(Request $request)
    // {
    //     Product::insert([
    //         'name'=> $request->name,
    //         'supplier_id'=>$request->supplier_id,
    //         'unit_id'=>$request->unit_id,
    //         'category_id'=>$request->category_id,
    //         'quantity'=>'0',
    //         'created_by'=> Auth::user()->id,
    //         'created_at'=> Carbon::now(),
    //     ]);

    //     $notification = array(
    //         'message'=>'Product inserted successfully',
    //         'alert-type'=>'success',
    //     );

    //     return redirect()->route('product.all')->with($notification);
    // }// End Method by easylearningbd.com Kazi Ariyan


    public function ProductStore(Request $request)
    {        
        $data = new Product();
        $data->name = $request->name;
        $data->supplier_id = $request->supplier_id;
        $data->unit_id = $request->unit_id;
        $data->category_id = $request->category_id;
        $data->quantity= '0';
        $data->created_by = Auth::user()->id;
        $data->created_at = Carbon::now();
        $data->save();

        
        if($data)
       {
        $notification = array(
            'message' => 'Product inserted Successfully', 
            'alert-type' => 'success'
        );
    
       }
       else
       {
            $notification = array(
                'message' => 'Product not inserted ', 
                'alert-type' => 'error'
            );
       }// End if else BY m.k

        return redirect()->route('product.all')->with($notification);

    }// End Method BY Aman Sir


    public function ProductEdit($id)
    {
        $supplier = Supplier::all();
        $unit = Unit::all();
        $category = Category::all();

        $product = Product::findOrFail($id);

        return view('backend.product.product_edit',compact('product','supplier','unit','category'));


    }// End Method


    // public function ProductUpdate(Request $request)
    // {
    //     $product_id = $request->id;

    //     Product::findOrFail($product_id)->update([
    //         'name'=> $request->name,
    //         'supplier_id'=>$request->supplier_id,
    //         'unit_id'=>$request->unit_id,
    //         'category_id'=>$request->category_id,
    //         'updated_by'=> Auth::user()->id,
    //         'updated_at'=> Carbon::now(),
    //     ]);

    //     $notification = array(
    //         'message'=>'Product updated successfully',
    //         'alert-type'=>'success',
    //     );

    //     return redirect()->route('product.all')->with($notification);
    // }// End Method by easylearningbd.com Kazi Ariyan


    public function ProductUpdate(Request $request)
    {
        $product_id = $request->id;
        
        $data = Product::where(['id'=>$product_id])->first();
        // dd($data);
        $data->name = $request->name;
        $data->supplier_id = $request->supplier_id;
        $data->unit_id = $request->unit_id;
        $data->category_id = $request->category_id;
        $data->updated_by = Auth::user()->id;
        $data->updated_at = Carbon::now();
        $data->save();

        if($data)
        {
         $notification = array(
             'message' => 'Product updated Successfully', 
             'alert-type' => 'success'
         );
     
        }
        else
        {
             $notification = array(
                 'message' => 'Product not updated', 
                 'alert-type' => 'error'
             );
        }// End if else BY m.k
 
         return redirect()->route('product.all')->with($notification);

    } // End Method BY Aman Sir



    // public function ProductDelete($id)
    // {
    //     Product::findOrFail($id)->delete();

    //         $notification = array(
    //             'message' => 'Product Deleted Successfully', 
    //             'alert-type' => 'success'
    //         );
    
    //         return redirect()->back()->with($notification);

    // }// End Method by easylearningbd.com Kazi Ariyan



    public function ProductDelete($id)
    {
       $productDelete = DB::table('products')->where(['id'=>$id])->delete();

       if($productDelete)
       {
        $notification = array(
            'message' => 'Product Deleted Successfully', 
            'alert-type' => 'success'
        );
    
       }
       else
       {
            $notification = array(
                'message' => 'Product not Deleted ', 
                'alert-type' => 'error'
            );
       }// End if else BY m.k

  
        
        return redirect()->back()->with($notification);
    }// End Method BY Aman Sir


    public function status(Request $request,$status,$id)
    {
        $model = Product::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('message','product status updated');
        return redirect('/product/all');
    }// End Method
    
}
