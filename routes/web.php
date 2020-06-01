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

Route::get('/unactive_category/{id}','CategoryController@unactive_category' );
Route::get('/active_category/{id}','CategoryController@active_category' );

Route::get('/edit-category/{id}','CategoryController@edit_category' );

Route::post('/update-category/{id}','CategoryController@update_category' );

Route::get('/delete-category/{id}','CategoryController@delete_category' );


