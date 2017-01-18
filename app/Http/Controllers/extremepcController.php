<?php

namespace App\Http\Controllers;

use App\Ex_order;
use Illuminate\Http\Request;

class extremepcController extends Controller
{
    public function importOrder(){
        $orders = Ex_order::all()->where('order_status_id','<>',0);

//        dd($orders);
        return view('home',compact('orders'));
    }
}
