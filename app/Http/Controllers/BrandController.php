<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DataTables;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
  
            $data = Brand::latest()->get();
  
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($d){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$d->id.'" data-original-title="Edit" class="edit  btn-sm editProduct"><i class="fas fa-edit" style="font-size:36px;color:success"></i> </a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$d->id.'" data-original-title="Delete" class="btn-sm deleteProduct"><i class="far fa-trash-alt" style="font-size:36px;color:red"></i></a>';
    
                            return $btn;
                    })
                    ->addColumn('status',function($data){
                        // $btn = '<a href="javascript:void(0)"  ><i class="fas fa-edit" style="font-size:36px;color:success"></i> </a>';
                            // $btn = '<a href="javascript:void(0)"> <span><p class="btn btn-success btn-sm" style="width:80px; height:30px">active</p><span></a>';
                            $data = ($data->status==1)?'<a href="javascript:void(0)"> <span><p class="btn btn-success btn-sm" style="width:80px; height:30px">active</p><span></a>':'<a href="javascript:void(0)"> <span><p class="btn btn-warning btn-sm" style="width:80px; height:30px">block</p><span></a>';
                            return $data;
                    })
                    ->rawColumns(['action','status'])
                    ->make(true);
        }
        
        return view('admin.brands');
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.create_brands');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           $brand = Brand::updateOrCreate(
            [
                'id'=> $request->brand_id
            ],
             [
                 'name' => $request->name,
                 'slug' => $request->slug,
                 'status' => $request->status,
             ]);
        return response()->json(['message'=> 'Brand sussessfully added']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
                $brand = Brand::findOrFail($id);
                return response()->json($brand);
    }

  

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {   
                $brand = Brand::find($id);
                $brand->delete();
                
                return response()->json(['message'=>'brand successfully deleted']);
    }

    public function slug(Request $request){

                $brand_slug = $request->brand_slug; 
                $slug = Str::slug($brand_slug);
                
                return response()->json(["slug_brand"=>$slug]);
    }
}
