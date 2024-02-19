<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){

     
        $shop['categories'] = Category::where('status',1)->orderBy('name','ASC')->get();

        $shop['brands'] = Brand::where('status',1)->orderBy('name','ASC')->get();

        $shop['products'] =  Product::with('product_images')->where('status',1)->get();

        return view('front.shop',['shop'=> $shop]);
    }
}
