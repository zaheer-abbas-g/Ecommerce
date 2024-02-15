<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File; 


class CategoryController extends Controller
{

    public function index(){

            $category = Category::select('id','name','slug','status','show_home','image')
            ->get();
            return response()->json($category);

    }
    
    public function store(CategoryRequest $request){

        // print_r($request->showHome); die;
        // return response()->json($request->category_id); 

        // die;
        $imageName = '';
        if($request->hasFile('input1')){
            $imageName = time().".".$request->input1->extension();
            $request->input1->move(public_path('images'),$imageName);
        }
            $save_data =  Category::updateOrCreate(
                [
                'id' => $request->category_id
                ],
                [
                    'name'      => $request->name,
                    'slug'      => $request->slug,
                    'image'     => $imageName,
                    'status'    => $request->status,
                    'show_home' => $request->showHome
                ]
            );
       
            return response()->json(['status'=> 'true','message'=> 'succefully added',"data"=> $save_data ]);
    }

    public function change_slug(Request $request){

           $change_slug = $request->title;
           if(!empty($change_slug)){
                $slug = Str::slug($change_slug);
           }
          return response()->json([
                'slug' =>  $slug 
          ]);
    }

    public function edit($id){

          $edit_category = Category::find($id);
          return response()->json($edit_category);
    }

    public function destroy($id){

          $category_data = Category::find($id);
          $image_path = "images/".$category_data->image;
          if(File::exists($image_path)){
                unlink($image_path);
          };
          $category_data->delete();
        return response()->json(["message"=> "Category has been deleted","data"=> $category_data]);
    }
}
