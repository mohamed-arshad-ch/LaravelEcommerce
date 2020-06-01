<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use Session;
session_start();

class CategoryController extends Controller
{
    public function index(){

        return view('admin.add_category');
    }

    public function all_category(){

        $all_category_info=DB::table('tbl_category')->get();
        $manage_category=view('admin.all_category')
            ->with('all_category_info',$all_category_info);

            return view('admin_layout')
                    ->with('admin.all_category',$manage_category);













        // return view('admin.all_category');
    }

    public function save_category(Request $request){

        $data=array();
         $data['id'] =  $request->id;
         $data['category_name'] =  $request->category_name;
         $data['category_description'] =  $request->category_description;
         $data['publication_status'] =  $request->publication_status;

         DB::table('tbl_category')->insert($data);
         Session::put('message','Category Succssesfully Added');
         return Redirect::to('/add-category');

    }


    public function unactive_category($id){

        DB::table('tbl_category')
            ->where('id',$id)
            ->update(['publication_status' => 0]);
            Session::put('message','Category Unactive Succssesfully ');
            return Redirect::to('/all-category');


    }

    public function active_category($id){

        DB::table('tbl_category')
            ->where('id',$id)
            ->update(['publication_status' => 1]);
            Session::put('message','Category active Succssesfully ');
            return Redirect::to('/all-category');


    }

    public function edit_category($id){


        $category_info= DB::table('tbl_category')
                        ->where('id',$id)
                        ->first();

        $category_info=view('admin.edit_categoory')
            ->with('category_info',$category_info);

            return view('admin_layout')
                    ->with('admin.edit_categoory',$category_info);

        //return view('admin.edit_categoory');
        

    }

    public function update_category(Request $request,$id){

        $data=array();
        $data['category_name'] =  $request->category_name;
        $data['category_description'] =  $request->category_description;

        // dd($data);

        DB::table('tbl_category')
            ->where('id',$id)
            ->update($data);

            Session::put('message','Update Succssesfully ');
            return Redirect::to('/all-category');
        

    }

    public function delete_category($id){
        // dd($id);
        DB::table('tbl_category')
            ->where('id',$id)
            ->delete();

            Session::put('message','Delete Succssesfully ');
            return Redirect::to('/all-category');

    }
}
