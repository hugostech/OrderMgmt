<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 18/01/17
 * Time: 10:14 PM
 */

namespace bbstudios;


use PHPHtmlParser\Dom;

abstract class baseItem
{
    use \communicationTool;
    protected $status;
    protected $name;
    protected $dom;
//    abstract protected function create();


    protected function save(){

    }

    public function grabMpn(){

//        $keyword = str_replace(',',' ',$this->name);
//        $keyword = str_replace('.',' ',$keyword);
        $keyword = preg_split("/[\s,]+/",$this->name);
        $keyword = array_slice($keyword,0,7);

//        $url = "https://www.pbtech.co.nz/search?sf=$keyword";
//        $page = self::getContent($url);
//        dd($page);
//        $url = "https://www.elive.co.nz/search.php?term=$keyword";
//        dd($url);

//        $dom->loadFromUrl($url);

//        $a = $dom->find('.info_mfc')[0];
//        dd($a);
//        echo $a->text; // "click here"
//        dd($html);
//        echo $page;
        echo self::pbCrawler($keyword);
    }

    private function pbCrawler($keyword){
        if (count($keyword)>1){
            $word = '';
            foreach ($keyword as $item){
                $word.=$item;
                 $word.='+';
            }
            $word = substr($word,0,strlen($word)-1);
            $url = "https://www.pbtech.co.nz/search?sf=$word";
//            dd($this->dom);
            $this->dom->loadFromUrl($url);

            $a = $this->dom->find('.info_mfc')[0];
            if (is_null($a)){
                array_pop($keyword);
                return self::pbCrawler($keyword);
            }else{
                return $a->text;
            }
        }else{
            return null;
        }

    }


}