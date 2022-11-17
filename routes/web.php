<?php

use App\Http\Controllers\AppControllers\PostController;
use App\Http\Controllers\AppControllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'dashboard','middleware'=>['auth','verified']],function(){
   
    Route::get('/',[DashboardController::class, 'index'])->name('dashboard');
   
    Route::group(['prefix'=>'post'],function(){
        Route::get('/',[PostController::class,'index'])->name('post.index');
        Route::get('create',[PostController::class,'create'])->name('post.create');
        Route::get('show/{id}',[PostController::class,'create'])->name('post.show');
        Route::post('store',[PostController::class,'store'])->name('post.store');
        Route::get('edit/{id}',[PostController::class,'update'])->name('post.edit');
        Route::put('update/{id}',[PostController::class,'update'])->name('post.update');
        Route::delete('destroy/{id}',[PostController::class,'destroy'])->name('post.destroy');
    });


});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
