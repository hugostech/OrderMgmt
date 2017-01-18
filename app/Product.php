<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function description(){
        return $this->hasOne('App\Product_description','product_id');
    }
}
