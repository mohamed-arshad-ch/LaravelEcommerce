<?php

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
// Frontend Route.........................
Route::get('/','HomeConroller@index'); 







//Backend Route............................

Route::get('/admin','AdminController@index'); 

Route::get('/dashbord','AdminController@show_dashbord'); 

Route::post('/admin-dashbord','AdminController@dashbord' );

Route::get('/logout','AdminController@logout'); 


//category Route

Route::get('/add-category','CategoryController@index'); 
Route::get('/all-category','CategoryController@all_category'); 

Route::post('/save-category','CategoryController@save_category' );


