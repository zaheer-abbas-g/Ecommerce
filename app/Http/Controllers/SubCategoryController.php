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
  
      $data = SubCategory::with('Categories:id,name')
                          ->select('id','name','slug','status','category_id','showhome')
                          ->latest()->get();
          return DataTables::of($data)
              ->addIndexColumn()
              ->addColumn('action', function($row){

                     $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit  btn-sm editProduct"> <i class="fas fa-edit" style="font-size:36px;color:success"></i> </a>';

                     $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class=" btn-sm deleteProduct"><i class="far fa-trash-alt" style="font-size:36px;color:red"></i></a>';

                     return $btn;
              })
              ->addColumn('categories', function($row){    
                      $category = $row;  
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
        
       $updateOrCreate = SubCategory::updateOrCreate(
            [
                'id' => $request->sub_category_id
            ],
            [
                'category_id' => $request->select_category,
                'name'=>  $request->name,
                'slug'  => $request->slug,
                'status'=> $request->status,
                'showhome' => $request->showhome 
            ]);
      
        return response()->json(['message' => "Sub Category successfully added","data" => $updateOrCreate]);
    }

    public function showCategory(){

      $category =  Category::select('id','name')->get();
      return response()->json(["category"=> $category]);
    }

    public function subSlug(Request $request){
        $subCategory = $request->sub_category;

        $slug = Str::slug($subCategory);
        return response()->json(['sub'=> $slug]);
    }

    public function edit($id)
    {
        $SubCategory = SubCategory::with('Categories')->where('id',$id)->get();
        return response()->json($SubCategory);
    }

    public function destroy($id)
    {
        SubCategory::find($id)->delete();
      
        return response()->json(['message'=>'sub category deleted successfully.']);
    }
}
