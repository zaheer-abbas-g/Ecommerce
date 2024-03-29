<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  
     // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $categories =  Category::select('name')
                        ->orderBy('name','desc')
                        ->get();

                        // print_r($categories);die;
                return view('user.home',compact('categories'));
    }
}
