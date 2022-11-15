<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function CategoryAll()
    {
         // $categories = Category::all();
         $categories = Category::latest()->get();
         return view('backend.category.category_all',compact('categories'));

    }// End Method
}
