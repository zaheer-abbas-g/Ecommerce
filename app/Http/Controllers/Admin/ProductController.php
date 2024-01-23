<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductImageRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DataTables;

class ProductController extends Controller
{
    public function index(Request $request){


       if($request->ajax()){
            $product =  Product::with('product_images:id,product_id,image')->orderBy('id','DESC')->get();
            return Datatables::of($product)
                    ->addIndexColumn()
                    ->addColumn('action',function($row){

                            $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="btn-sm editProduct"><i class="fas fa-edit" style="font-size:36px;color:success"></i></a>';

                            $btn = $btn.'<a href="javascript:void(0)"  data-toggle="tooltip"  data-id="'.$row->id.'"  data-original-title="Delete"   class="btn-sm deleteProduct"><i class="far fa-trash-alt" style="font-size:36px;color:red"></i></a>';
                            return $btn;
                        })
                    ->addColumn('price',function($product){
                        return "$".$product->price;
                    })   
                    ->addColumn('status',function($product){
                            
                          if($product->status==1){
                           return '<p class="btn btn-success btn-sm" style="width:80px; height:30px">active</p><span></a>';
                        }
                        else{
                            return '<p class="btn btn-warning btn-sm" style="width:80px; height:30px">block</p><span></a>';
                        }     
                    })
                    ->addColumn('image',function($product){
                          
                            $image = $product->product_images;  
                            foreach ($image as $key => $images) {
                                
                                $path = asset('productimages/'); 
                                if(!empty($images->image)){
                                    return "<img src=$path/$images->image width='100px' height='90px'>";
                                }
                                else{
                                    return "<img  src='http://localhost:8000/admin_assets/img/dummy-image-square.jpg' width='100px' height='90px'>";
                                }
                            }
                    })
                    ->rawColumns(['action','price','status','image'])
                    ->make(true);
       }
      
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
    public function store(ProductRequest $request){


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
            $product->save();                                                                     

        return response()->json(['data' => $product,'product_id'=> $product->id]);
    }

    public function productSubCategory(Request $request){

        $category_id = $request->category_id;
        $SubCategory = SubCategory::where('category_id',$category_id)->get();
        return response()->json(['subcategories'=> $SubCategory]);
    }

    public function createProductzone(Request $request){
        // dd($request->proudctid);
            $image_data ='';
            $store_image = [];
            if($request->has('image')){
                foreach ($request->image as $key => $images) {
                    $imageName = time().'.'.$images->extension();
                    $images->move(public_path('productimages'),$imageName);

                    $store_image[] = $imageName;
                }

                foreach ($store_image as $key => $img) {
                        $image_data = ProductImage::create(
                            [
                                'image' => $img,
                                'product_id' => $request->proudctid,
                               
                            ]
                    );
                }
            }

            return response()->json(['image'=> $image_data]);
    
    
    
        }
}
