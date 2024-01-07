<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('user.home');
// });

// Route::get('/user-register', function () {
//     return view('user.register');
// });

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// });


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware'=>['auth']],function(){
    Route::get('/user-home', [App\Http\Controllers\HomeController::class, 'index']);
});

Route::prefix('admin')->middleware(['auth','is_admin'])->group(function(){
        Route::get('/dashboard', function () {
                return view('admin.dashboard');
        });

        
        
    Route::get('/category',function(){
        return view('admin.categories');
    });
    Route::get('/sub-category',function(){
        return view('admin.subcategory');
    });
    // Route::get('/brands',function(){
    //     return view('admin.brands');
    // });
    Route::get('/products',function(){
        return view('admin.products');
    });
    Route::get('/orders',function(){
        return view('admin.orders');
    }); 
    Route::get('/users',function(){
        return view('admin.users');
    });

    Route::get('/pages',function(){
        return view('admin.pages');
    });

    Route::get('/create-category',function(){
        return view('admin.create_category');
    });
    Route::get('/create-subcategory',function(){
        return view('admin.create_subcategory');
    });
    // Route::get('/create-brands',function(){
    //     return view('admin.create_brands');
    // });
    Route::get('/create-products',function(){
        return view('admin.create_products');
    });
    Route::get('/create-users',function(){
        return view('admin.create_user');
    });
    Route::get('/create-pages',function(){
        return view('admin.create_page');
    });
    Route::get('/discount',function(){
        return view('admin.discount');
    });
    Route::get('/order-detail',function(){
        return view('admin.order_detail');
    });

    
    Route::post("/category-store",[CategoryController::class,"store"])->name('category.store');
    Route::get("/change-slug",[CategoryController::class,"change_slug"])->name('change.slug');
    Route::post("/category-slug",[CategoryController::class,"index"])->name('category.index');
    
    Route::get("/category-edit/{id}",[CategoryController::class,'edit']);
    Route::get("/category-delete/{id}",[CategoryController::class,'destroy']);
    

    //////////// Sub Category //////////
    Route::get('/category-sub-edit/{id}',[SubCategoryController::class,'edit']);
    Route::get('/category-sub-delete/{id}',[SubCategoryController::class,'destroy']);
    Route::post('/sub-category',[SubCategoryController::class,"store"]);
    Route::get('/show-category',[SubCategoryController::class,"showCategory"]);
    
    Route::get('users', [SubCategoryController::class, 'index'])->name('users.index');
    Route::get('slug', [SubCategoryController::class, 'subSlug'])->name('sub.slug');



    /////////// Brand //////////////

    Route::get('/brand',[BrandController::class,'index']);
    Route::get('/brand/create',[BrandController::class,'create']);
    Route::post('/brand',[BrandController::class,'store']);
});


