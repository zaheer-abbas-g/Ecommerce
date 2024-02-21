<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request, $categorySlug=null,$subCategorySlug=null){

        $shop['categories'] = Category::where('status',1)->orderBy('name','ASC')->get();

        $shop['brands'] = Brand::where('status',1)->orderBy('name','ASC')->get();

        // print_r($categorySlug);die;
        
        $categorySelected = '';
        $subCategorySelected = '';
        ///// Apply filters here

        $shop['products'] = Product::with('product_images') 
                            ->where('status',1);

                            if(!empty($categorySlug)){
                                $category = Category::where('slug',$categorySlug)->first();
                                $shop['products'] = $shop['products']->where('category_id',$category->id); 
                                $categorySelected = $category->id;
                            }

                            if(!empty($subCategorySlug)){
                                $subcategory = SubCategory::where('slug',$subCategorySlug)->first();
                                $shop['products'] = $shop['products']->where('sub_category_id',$subcategory->id);
                                $subCategorySelected =  $subcategory->id;
                            }


        $shop['products'] =  $shop['products']
                            ->orderBy('id','DESC')->get();
      
        // dd(   $shop['products'] );
        return view('front.shop',['shop'=> $shop,'categorySelected'=> $categorySelected,'subCategorySelected'=> $subCategorySelected]);
    }
}
