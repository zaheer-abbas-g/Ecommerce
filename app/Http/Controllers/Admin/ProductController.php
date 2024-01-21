<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    public function index(){

      
        return view('admin.product.products');
    }

    public function createProduct(){

        $data=[];
        $categories = Category::select('id','name')->orderBy('name','ASC')->get();
        $brand = Brand::select('id','name')->orderBy('name','ASC')->get();
        $sub_categories = SubCategory::select('id','name')->orderBy('name','ASC')->get();
        $data['categories'] = $categories;
        $data['brand'] = $brand;
        $data['SubCategories'] = $sub_categories;
        // dd($data['SubCategories']);
        return view('admin.product.create_products',$data);
    }

    public function productSlug(Request $request){
        
        $slug = $request->slug_name;
        $slug = Str::slug($slug);
        return response()->json(['slug'=>$slug]);
    }
    public function store(Request $request){

        $data = $request->all();
            $product                  = new Product;
            $product->title           = $request->title;
            $product->slug            = $request->slug;
            $product->description     = $request->description;
            $product->sku             = $request->sku;
            $product->barcode         = $request->barcode;
            $product->category_id     = $request->category;
            $product->sub_category_id = $request->sub_category;
            $product->brand_id        = $request->brand;
            $product->price           = $request->price;
            $product->compare_price   = $request->compare_price;
            $product->is_featured     = $request->is_featured;
            $product->track_quantity  = $request->track_qty;
            $product->quantity        = $request->qty;
            $product->status          = $request->status;
            // $product->save();

        return response()->json(['data' => $product,'alldata'=>$data]);
    }

    public function productSubCategory(Request $request){

        $category_id = $request->category_id;
        $SubCategory = SubCategory::where('category_id',$category_id)->get();
        return response()->json(['subcategories'=> $SubCategory]);
    }

    public function createProductzone(Request $request){
        
            // $pimage = new ProductImage;
            // $image = time().'.'.$request->image->extension();
            // $request->image->move(public_path('product images'),$image);
            // $image = explode(',',$image);
            // $pimage->image = $image;
            // $pimage->save($image);

            $images=array();
           $data='';
            if($files=$request->file('image')){
                foreach($files as $file){
                    $name=$file->getClientOriginalName();
                    $file->move('image',$name);
                    $images[]=$name;
                }
            }

            foreach($images as $img){
                $data= ProductImage::create([
                    'image' => $img,
                    'product_id' => 1
                ]);
            }
            return response()->json([
                'status' =>true,
                'image' =>  $data,    
            ]);
    }
}
