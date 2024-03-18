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
            // dd( $shop['categories']);
        $shop['brands'] = Brand::where('status',1)->orderBy('name','ASC')->get();

        // print_r($categorySlug);die;
        
        $categorySelected = '';
        $subCategorySelected = '';
        $brandsArray = [];
        $sort = '';
        $brandsArray = $request->get('brand');

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

                                                
                            if(!empty($brandsArray)){

                                $brandsArray = explode(',',$brandsArray);
                                $shop['products'] =  $shop['products']->whereIn('brand_id',$brandsArray);
                            }

                            // if($request->get('price_max') !='' && $request->get('price_min') !=''){
                            //     $shop['products'] =  $shop['products']->whereBetween('price',[$request->get('price_max'),$request->get('price_min')]);

                            // }
                                    // dd($request->get('sort'));
                            if($request->get('sort') != ''){

                                    if($request->get('sort') == 'latest'){
                                            $shop['products'] =  $shop['products']->orderBy('id','desc');  
                                    }
                                    else if($request->get('sort') == 'price_asc'){
                                        $shop['products'] =  $shop['products']->orderBy('id','asc');  
                                    }
                                    else{
                                        $shop['products'] =  $shop['products']->orderBy('id','desc');  
                                    }
                            }
                            else{
                                        
                                     $shop['products'] =  $shop['products']->orderBy('id','desc'); 
                            }

                          $sort = $request->get('sort');
                            $shop['products'] =  $shop['products']
                                                ->orderBy('id','DESC')
                                                ->get();
      
    
        return view('front.shop',['shop'=> $shop,'categorySelected'=> $categorySelected,
        'subCategorySelected'=> $subCategorySelected,'brandsarray' => $brandsArray],compact('sort'));
    } 

    public function product($slug){


        $product =  Product::where('slug',$slug)->with('product_images')->first();

        if($product == null){
            abort(404);
        }

        return view('front.product',compact('product'));
    }
}
