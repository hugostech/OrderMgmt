<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 19/01/17
 * Time: 12:12 AM
 */

namespace bbstudios;


use PHPHtmlParser\Dom;

class ExItem extends baseItem
{
    public function __construct($name)
    {
        $this->dom = new Dom();
        $this->name = $name;
    }
}