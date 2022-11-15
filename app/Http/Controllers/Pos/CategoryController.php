<?php

namespace App\Http\Controllers\Pos;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
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


    public function  CategoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit',compact('category'));
    }// End Method


    // public function CategoryUpdate(Request $request)
    // {
    //     $category_id = $request->id;
    //     Category::findOrFail($category_id)->update([
    //         'name'=> $request->name,
    //         'updated_by'=> Auth::user()->id,
    //         'updated_at'=> Carbon::now(),
    //     ]);

    //     $notification = array(
    //         'message'=>'Category updated successfully',
    //         'alert-type'=>'success',
    //     );

    //     return redirect()->route('category.all')->with($notification); 

    // }// End Method by easylearningbd.com Kazi Ariyan


    public function CategoryUpdate(Request $request)
    {
        $category_id = $request->id;
        
        $data = Category::where(['id'=>$category_id])->first();
        // dd($data);
        $data->name = $request->name;
        $data->updated_by = Auth::user()->id;
        $data->updated_at = Carbon::now();
        $data->save();

        if($data)
        {
         $notification = array(
             'message' => 'Category updated Successfully', 
             'alert-type' => 'success'
         );
     
        }
        else
        {
             $notification = array(
                 'message' => 'Category not updated', 
                 'alert-type' => 'error'
             );
        }// End if else BY m.k
 
         return redirect()->route('category.all')->with($notification);

    } // End Method BY Aman Sir


    
    // public function CategoryDelete($id)
    // {
    //     Category::findOrFail($id)->delete();

    //     $notification = array(
    //         'message' => 'Category Deleted Successfully', 
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->back()->with($notification);
    // } // End Method by easylearningbd.com Kazi Ariyan


    public function CategoryDelete($id)
    {
       $categoryDelete = DB::table('categories')->where(['id'=>$id])->delete();

       if($categoryDelete)
       {
        $notification = array(
            'message' => 'Category Deleted Successfully', 
            'alert-type' => 'success'
        );
    
       }
       else
       {
            $notification = array(
                'message' => 'Category not Deleted ', 
                'alert-type' => 'error'
            );
       }// End if else BY m.k

  
        
        return redirect()->back()->with($notification);
    }// End Method BY Aman Sir



        
    public function status(Request $request,$status,$id)
    {
        $model = Category::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('message','category status updated');
        return redirect('/category/all');
    }
    



}
