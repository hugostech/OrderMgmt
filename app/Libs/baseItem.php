<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 18/01/17
 * Time: 10:14 PM
 */

namespace bbstudios;


abstract class baseItem
{
    private $status;
    abstract protected function create();
    protected function save(){

    }
}