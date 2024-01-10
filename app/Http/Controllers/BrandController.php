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
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
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
        // $dd = $request->all();
           $brand = Brand::updateOrCreate(
            [
                'name' => $request->name,
                'slug' => $request->name,
                'status' => $request->name,
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
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        //
    }

    public function slug(Request $request){

        $brand_slug = $request->brand_slug; 
        $slug = Str::slug($brand_slug);
        
        return response()->json(["slug_brand"=>$slug]);
    }
}
