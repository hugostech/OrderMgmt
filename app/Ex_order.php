<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ex_order extends Model
{
    protected $connection = 'extremepc_mysql';
    protected $table = 'oc_ex_order';
    protected $primaryKey = 'order_id';
}
