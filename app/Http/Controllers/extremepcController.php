<?php

namespace App\Http\Controllers;

use App\Ex_order;
use App\Ex_product;
use App\Jobs\crawlerPB;
use App\Product;
use App\Product_description;
use bbstudios\ExItem;
use Illuminate\Http\Request;
use App\Ex_product_description;
use Illuminate\Support\Facades\DB;

class extremepcController extends Controller
{
    public function importOrder(){

//        $item = new ExItem('Acer Predator G9-793-71YU GTX1070 Gaming Notebook, 17.3" 1080p FullHD Intel i7-6700HQ 16GB DDR4 256GB SSD + 2TB HDD DVDRW GTX1070 8GB GDDR5 Graphics, Win10Home 64bit 1yr VR Ready NH.Q17SA.004');
//        $item->grabMpn();
//        $orders = Ex_order::all()->where('order_status_id','<>',0);

//        dd($orders);
//        return view('home',compact('orders'));
//        try{
            $skip = 50;

            $ex_products = Ex_product::where('status',1)->where('price','>',30)->offset($skip)->limit(50)->get();
            while(count($ex_products)>1){


                foreach ($ex_products as $item){
                    self::insertProdcut($item);

                }


                $skip += 50;

                $ex_products = Ex_product::where('status',1)->where('price','>',30)->offset($skip)->limit(50)->get();

            }
            echo 'success';



    }
    private function insertProdcut($item){
        try{
            DB::beginTransaction();
            $local_product = new Product();
            $local_product->quantity = $item->quantity;
            $local_product->model = $item->model;
            $local_product->save();

            $tem = $item->description;
            $description = new Product_description();
            $description->product_id = $local_product->id;
            $description->name = isset($tem)?$tem->name:'null';
            $description->save();
            DB::commit();
            return true;
        }catch (\Exception $e){
            DB::rollBack();
            return false;
        }

    }
    public function grabMpn(){
//        $skip = 0;
        $products = Product::where('mpn',null)->limit(5)->get();

//        while(count($products)>1){

            foreach ($products as $product) {
//                dd($product->id);
                $job = (new crawlerPB($product))
                    ->delay(20);

                dispatch($job);

            }
//            $skip += 50;
//            $products = Product::offset($skip)->limit(50)->get();

//        }
        echo '1';
//        $products = Product::where('mpn','<>','')->get();
//        dd($products);
//        $item = new ExItem('Acer Predator G9-793-71YU GTX1070 Gaming Notebook, 17.3" 1080p FullHD Intel i7-6700HQ 16GB DDR4 256GB SSD + 2TB HDD DVDRW GTX1070 8GB GDDR5 Graphics, Win10Home 64bit 1yr VR Ready NH.Q17SA.004');
//        $item->grabMpn();
    }
    public function findProduct(){
        $product = new ExItem('HP Omen 15.6 Inch i5-6300HQ 2.3GHz 8GB RAM 1TB HDD GTX960M Gaming Laptop with Windows 10');
        echo $product->grabMpn();
    }
}
