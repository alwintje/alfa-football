<?php
/**
 * Created by PhpStorm.
 * User: Alwin
 * Date: 19-5-2015
 * Time: 18:09
 */
class RssReader{

    private $url = "";

    public function setUrl($url){
        $this->url = $url;
    }

    public function getUrl(){
        return $this->url;
    }

    public function generateCode(){

        $xmlDoc = new DOMDocument();
        $xmlDoc->load($this->url);
        $x=$xmlDoc->getElementsByTagName('item');
        $posts = array();
        for ($i=0; $i<=3; $i++) {
            $item_title=$x->item($i)->getElementsByTagName('title')
                ->item(0)->childNodes->item(0)->nodeValue;
            $item_link=$x->item($i)->getElementsByTagName('link')
                ->item(0)->childNodes->item(0)->nodeValue;
            $item_desc=$x->item($i)->getElementsByTagName('description')
                ->item(0)->childNodes->item(0)->nodeValue;
            $posts[] = array(
                "title" => $item_title,
                "link" => $item_link,
                "description" => $item_desc,
            );
        }
        return $posts;

    }


}