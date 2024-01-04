<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DataTables;

class SubCategoryController extends Controller
{
    
  public function index(Request $request)
  {
    if ($request->ajax()) {
  
      $data = SubCategory::with('Categories')->latest()->get();

      return DataTables::of($data)
              ->addIndexColumn()
              ->addColumn('action', function($row){

                     $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';

                     $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';

                     return $btn;
              })
              ->addColumn('categories', function($row){    
                      $category = $row->categories->name;  
                      return $category;
              })
              ->addColumn('status', function($row){
                      $status  = ($row->status)?('<span><p class="btn btn-success btn-sm" style="width:80px; height:30px">active</p><span>'):('<span><p class="btn btn-warning btn-sm" style="width:80px; height:30px">block </p></span>');
                      return $status;
              })
              ->rawColumns(['action','categories','status'])
              ->make(true);
  }
  
      
      return view('admin.subcategory');
  }

    public function store(Request $request){
         
        $subCategory                     = new SubCategory;
        $subCategory->category_id        =  $request->select_category;
        $subCategory->slug               =  $request->slug;
        $subCategory->status             =  $request->status;
        $subCategory->name               =  $request->name;
        $subCategory->save();

        return response()->json(['message' => "Sub Category successfully added","data" => $subCategory]);
    }

    public function showCategory(){

      $category =  Category::get();
      return response()->json(["category"=> $category]);
    }

    public function subSlug(Request $request){
        $subCategory = $request->sub_category;

        $slug = Str::slug($subCategory);
      return response()->json(['sub'=> $slug]);
    }

    public function edit($id)
    {
        $SubCategory = SubCategory::find($id);
        $categories =  Category::get();
        return response()->json(['categories'=>$categories,'subcategory' => $SubCategory]);
    }

    public function destroy($id)
    {
        SubCategory::find($id)->delete();
      
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
