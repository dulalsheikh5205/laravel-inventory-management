<?php

namespace App\Http\Controllers\Pos;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function CategoryAll()
    {
         // $categories = Category::all();
         $categories = Category::latest()->get();
         return view('backend.category.category_all',compact('categories'));

    }// End Method


    public function CategoryAdd()
    {
        return view('backend.category.category_add');

    }// End Method


    //     public function CategoryStore(Request $request)
    // {
    //     Category::insert([
    //         'name'=> $request->name,
    //         'created_by'=> Auth::user()->id,
    //         'created_at'=> Carbon::now(),
    //     ]);

    //     $notification = array(
    //         'message'=>'Category  inserted successfully',
    //         'alert-type'=>'success',
    //     );

    //     return redirect()->route('category.all')->with($notification);

    // }// End Method by easylearningbd.com Kazi Ariyan


    public function CategoryStore(Request $request)
    {        
        $data = new Category();
        $data->name = $request->name;
        $data->created_by = Auth::user()->id;
        $data->created_at = Carbon::now();
        $data->save();

        
        if($data)
       {
        $notification = array(
            'message' => 'Category inserted Successfully', 
            'alert-type' => 'success'
        );
    
       }
       else
       {
            $notification = array(
                'message' => 'Category not inserted ', 
                'alert-type' => 'error'
            );
       }// End if else BY m.k

        return redirect()->route('category.all')->with($notification);

    }// End Method BY Aman Sir



}
