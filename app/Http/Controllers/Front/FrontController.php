<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    
    public function index()
    {

        $categories =  Category::with('subCategories:id,category_id,name')
            ->where('show_home','Yes')  
            ->where('status',1) 
            ->orderBy('name','asc')
            ->get();
        return view('front.home',compact('categories'));
    }
}
