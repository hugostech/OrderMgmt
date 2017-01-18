<?php

namespace App\Http\Controllers;

use App\Ex_order;
use bbstudios\ExItem;
use Illuminate\Http\Request;

class extremepcController extends Controller
{
    public function importOrder(){

        $item = new ExItem('Acer Predator G9-793-71YU GTX1070 Gaming Notebook, 17.3" 1080p FullHD Intel i7-6700HQ 16GB DDR4 256GB SSD + 2TB HDD DVDRW GTX1070 8GB GDDR5 Graphics, Win10Home 64bit 1yr VR Ready NH.Q17SA.004');
        $item->grabMpn();
//        $orders = Ex_order::all()->where('order_status_id','<>',0);

//        dd($orders);
//        return view('home',compact('orders'));
    }
}
