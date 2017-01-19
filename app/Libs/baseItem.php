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

        $mpn = '';

        while(count($keyword)>1){
            $key = self::keyToString($keyword);

            $mpn = self::eliveMpn($key);

            if (empty($mpn)){
                $mpn = self::pbCrawler($key);
                if (!empty($mpb)){
                    return $mpn;
                }
            }else{
                return $mpn;
            }



            array_pop($keyword);
        }
        return $mpn;
    }

    private function keyToString($keyword){
        $word = '';
        foreach ($keyword as $item){
            $word.=$item;
            $word.='+';
        }
        return substr($word,0,strlen($word)-1);
    }

    private function pbCrawler($word){
        try{
            $url = "https://www.pbtech.co.nz/search?sf=$word";
            $this->dom->loadFromUrl($url);
            $a = $this->dom->find('.item_description')[0];
            if(is_null($a)){
                return null;
            }
            $a = $a->find('a')[0];
            $a = $a->getAttribute('href');
            $url = "https://www.pbtech.co.nz/$a";
            $this->dom->loadFromUrl($url);
            $span = $this->dom->find('span[name=mpn]')[0];
            return trim($span->text);
        }catch (\Exception $e){
            return null;
        }
    }

    private function pbProductContent(){
        echo $this->dom->find('.p_tab_content_dd')[0]->html;
    }

    private function eliveMpn($word){
        try{
            $url = "https://www.elive.co.nz/search.php?term=$word";

            $this->dom->loadFromUrl($url);

            $a = $this->dom->find('span.product-title')[0]->find('a')[0];
            $url = 'https://www.elive.co.nz/'.$a->getAttribute('href');
            $this->dom->loadFromUrl($url);
            $a = $this->dom->find('.product-shipping-info')[0];
            $lis =  $a->find('li');
            foreach ($lis as $li){
                if(trim($li->find('strong')[0]->innerHtml)=='Model Number:'){
                    return trim($li->find('.content')[0]->text);
                }
            }
            return null;
        }catch (\Exception $e){
            return null;
        }


    }


}