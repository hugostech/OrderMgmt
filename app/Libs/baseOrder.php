<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 18/01/17
 * Time: 9:50 PM
 */

namespace bbstudios;

use App\Order;

abstract class baseOrder
{
    private $items;

    abstract protected function create();
    protected function save(){

    }
}