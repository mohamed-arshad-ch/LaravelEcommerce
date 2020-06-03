<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use Session;
session_start();

class ManufactureController extends Controller
{
   public function index(){

      return view('admin.add_manufacture');

    }

    public function save_manufacture(Request $request){

        $data=array();
         $data['id'] =  $request->id;
         $data['manufacture_name'] =  $request->manufacture_name;
         $data['manufacture_description'] =  $request->manufacture_description;
         $data['publication_status'] =  $request->publication_status;

         DB::table('tbl_manufacture')->insert($data);
         Session::put('message','Manufacture Succssesfully Added');
         return Redirect::to('/add-manufacture');

    }

    public function all_manufacture(){

        $all_manufacture_info=DB::table('tbl_manufacture')->get();
        $manage_manufacture=view('admin.all_manufacture')
            ->with('all_manufacture_info',$all_manufacture_info);

            return view('admin_layout')
                    ->with('admin.all_manufacture',$manage_manufacture);


       
    }


    

    public function unactive_manufacture($id){

        DB::table('tbl_manufacture')
            ->where('id',$id)
            ->update(['publication_status' => 0]);
            Session::put('message','Manufacture Unactive Succssesfully ');
            return Redirect::to('/all-manufacture');


    }

    
    public function active_manufacture($id){

        DB::table('tbl_manufacture')
            ->where('id',$id)
            ->update(['publication_status' => 1]);
            Session::put('message','Manufacture active Succssesfully ');
            return Redirect::to('/all-manufacture');


    }
}
