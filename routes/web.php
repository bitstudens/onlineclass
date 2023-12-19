<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Testcontroller;

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

// Route::redirect('/testpath', '/bladea');

//formhandling routes
Route::view('/formhandling', 'formhandling.form')->name('formhandling');
Route::post('/formhandling-submit', [Testcontroller::class,'handleData'])->name('formhandling.submit');
Route::view('/product-form', 'formhandling.productForm')->name('product.form');
Route::post('/product-submit', [Testcontroller::class,'handleProduct'])->name('product.submit');
Route::get('/product-index', [Testcontroller::class,'index'])->name('product.index');
Route::get('/product-edit/{id}', [Testcontroller::class,'edit'])->name('product.edit');
Route::put('/product-update/{id}', [Testcontroller::class,'update'])->name('product.update');
Route::get('/product-delete/{id}', [Testcontroller::class,'delete'])->name('product.delete');



Route::view('/testpath', 'test')->name('testpath');
Route::view('/fsdfsdfsdfs', 'bladea')->name('bladea');
Route::view('/bladed', 'bladeb')->name('bladed');
Route::view('/form', 'form')->name('form');
// Route::redirect('/form', '/bladed')->name('form');
Route::view('/service', 'landingpage.service')->name('service');
Route::view('/cars', 'landingpage.cars')->name('cars');
// Route::get('/testpathcontroller', 'App\Http\Controllers\Testcontroller@testMethod');
Route::get('/dashboard', [Testcontroller::class,'testMethod'])->name('dashboard');
// Route::any('/testpost', [Testcontroller::class,'testPostMethod'])->name('test.post');
Route::match(['get','post'],'/testpost', [Testcontroller::class,'handleData'])->name('test.post');
