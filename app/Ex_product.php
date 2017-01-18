<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ex_product extends Model
{
    protected $connection = 'extremepc_mysql';
    protected $table = 'oc_ex_product';
    protected $primaryKey = 'product_id';
    public $timestamps = false;
    protected $fillable = array(
        'model', 'quantity', 'stock_status_id', 'shipping', 'price',
        'tax_class_id', 'weight', 'weight_class_id', 'subtract', 'sort_order', 'status','date_added'
    );
    public function description(){
        return $this->hasOne('App\Ex_product_description','product_id');
    }

}
