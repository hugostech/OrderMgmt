<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ex_category extends Model
{
    protected $connection = 'extremepc_mysql';
    protected $table = 'oc_ex_category';
    protected $primaryKey = 'category_id';

    public $timestamps = false;

    public function parentCategory(){
        if($this->parent_id<>0){
            return Ex_category::find($this->parent_id);
        }else{
            return null;
        }
    }
    public function description(){
        return $this->hasOne('App\Ex_category_description','category_id');
    }
    public function products(){
        return $this->belongsToMany('App\Ex_product','oc_ex_product_to_category','category_id','product_id');
    }

    public function equal(Ex_category $other){

        if($this->category_id == $other->category_id){
            return true;
        }else{
            return false;
        }
    }
}
