<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ex_category_description extends Model
{
    protected $connection = 'extremepc_mysql';
    protected $table = 'oc_ex_category_description';
    protected $primaryKey = 'category_id';

    public $timestamps = false;

    public function category(){
        return $this->belongsTo('App\Ex_category','category_id');
    }
}
