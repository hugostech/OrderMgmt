<?php

namespace App\Http\Controllers;

use App\Ex_category;
use App\Ex_category_description;
use App\Ex_product_description;
use App\Ex_product;
use bbstudios\ExItem;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function __construct()
    {
//        $this->middleware('AjaxV');
    }

    public function updateMpn($product_id){
        try{
            $product = Ex_product::find($product_id);
            $Ex_product = new ExItem($product->description->name);
            $product->mpn = $Ex_product->grabMpn();
            $product->save();
            return response('alert-success',200);
        }catch (\Exception $e){
            return response('alert-danger',403);
        }


    }

    public function getExCategory($keyword){
        $key = '%'.trim($keyword).'%';
        $temCategorys = Ex_category_description::where('name','like',$key)->get();


        $result = array();
        foreach ($temCategorys as $item){
            $tem = array();
            $tem['id']=$item->category_id;
            $tem['name']=self::categoryFullPath($item->category);
            $result[] = $tem;
        }
//        $final['results']=$result;
        return response()->json($result,200);
//        echo json_encode($result);

    }

    /*
     * return array with all category full path*/
    private function categorysFullPath(){
        $categorys = array();
        $categorylist = Ex_category::all();
        foreach ($categorylist as $item){
            $tem = array();
            $tem['id'] = $item->category_id;

            $tem['name']=self::categoryFullPath($item);
            $tem['status'] = $item->status==0?'list-group-item-danger':'';
            $categorys[] = $tem;
        }
        return $categorys;
    }

    /*
    * return full category path*/
    private function categoryFullPath(Ex_category $category){
        $string = $category->description->name;
        $parent = $category->parentCategory();
        while (!empty($parent)) {
            $string = $parent->description->name.'->'.$string;

            $parent = $parent->parentCategory();
        }
        return htmlspecialchars_decode($string);
    }
}
