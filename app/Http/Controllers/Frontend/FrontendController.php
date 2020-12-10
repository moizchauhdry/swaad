<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class FrontendController extends Controller
{
    public function index()
    {   
        $categories = Category::where('status','1')->inRandomOrder()->get();
        return view ('frontend.pages.index',compact('categories'));
    }
}
