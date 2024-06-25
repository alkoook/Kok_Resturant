<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CatController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\UserController;

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
storage::disk('public')->put('images','kok');

Route::get('/', [UserController::class,'show_meals'] )->name('main');




route::get('/test',function(){return view('test');});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Users
Route::get('/user_order/{id}', [UserController::class, 'order'])->name('user_order');
Route::get('/old_orders/{id}', [UserController::class, 'show_old_orders'])->name('old_orders');
Route::get('/show_admins', [UserController::class, 'show_admins'])->name('show_admins');
Route::post('/create_user', [UserController::class, 'create_user'])->name('create_user');
Route::get('/edit_user/{id}', [UserController::class, 'edit_user'])->name('edit_user');
Route::post('update_user/{id}', [UserController::class, 'update_user'])->name('update_user');
Route::get('/delete_user/{id}', [UserController::class, 'delete_user'])->name('delete_user');






//Orders
route::get('show_orders/',[OrderController::class,'show_orders'])->name('show_orders');
route::post('create_order/',[OrderController::class,'create_order'])->name('create_order');
route::get('accept_order/{id}',[OrderController::class,'accept_order'])->name('accept_order');
route::get('delete_order/{id}',[OrderController::class,'delete_order'])->name('delete_order');
route::get('success_order/{id}',[OrderController::class,'success_order'])->name('success_order');




//Categories
route::get('show_cats',[CatController::class,'show_cats'])->name('show_cats');
route::post('create',[CatController::class,'create'])->name('create_cat');
route::get('edit_cat/{id}',[CatController::class,'edit'])->name('edit_cat');
route::post('update_cat/{id}',[CatController::class,'update'])->name('update_cat');
route::get('delete_cat/{id}',[CatController::class,'delete'])->name('delete_cat');



//Products
route::get('show_meals',[ProductController::class,'show_meals'])->name('show_meals');
route::post('create_meal',[ProductController::class,'create_meal'])->name('create_meal');
route::get('delete_meal/{id}',[ProductController::class,'delete_meal'])->name('delete_meal');
route::get('edit_meal/{id}',[ProductController::class,'edit_meal'])->name('edit_meal');
route::post('update_meal/{id}',[ProductController::class,'update_meal'])->name('update_meal');
require __DIR__.'/auth.php';
