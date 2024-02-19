<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    
    public function index()
    {

        $categories =  Category::with('subCategories:id,category_id,name')
            ->where('show_home','Yes')  
            ->where('status',1) 
            ->orderBy('name','ASC')
            ->orderBy('id','DESC')
            ->get();
            
            
            $products = Product::with('product_images')
            ->where('is_featured',"Yes")
            ->where('status',1)
            ->orderBy('id','DESC')
            ->take(8)
            ->get();
            
                                
                                
        $latestproducts = Product::with('product_images')
            ->where('status',1)
            ->orderBy('id','DESC')
            ->take(8)
            ->get();
            
        // dd($latestproducts);
        return view('front.home',compact('categories','products','latestproducts'));
    }


}
