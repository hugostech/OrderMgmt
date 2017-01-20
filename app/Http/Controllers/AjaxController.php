<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('AjaxV');
    }

    public function getExCategory($keyword){
        $key = trim($keyword);
        Ex
//        if ()){
//
//        }else{
//            return response()->json(['status'=>'danger','name'=>'there is no category id'],200)->header('Content-type: application/json');
//        }
    }
}
