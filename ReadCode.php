<?php
/**
 * Created by PhpStorm.
 * User: Alwin
 * Date: 22-5-2015
 * Time: 10:35
 */
$r = new ReadCode();
$r->getFiles("")->getAllFiles();


echo "Lines: ".$r->getLines();
echo "<br />";
echo "Characters: ".$r->getCharacters()."<br />";
echo "&copy; Alwin Kroesen";



class ReadCode
{
    private $lines = 0;
    private $characters;
    private $files = [];
    public function read($file){

        $handle = fopen($file, "r");
        while (($line = fgets($handle)) !== false) {
            if(strlen($line) > 1){
                $this->lines++;
                $this->characters += strlen($line);
            }
        }
        fclose($handle);
        return $this;
    }
    public function getAllFiles(){
        foreach($this->files as $val){
            $this->read($val);
        }
        return $this;
    }

    public function getLines(){
        return $this->lines;
    }
    public function getCharacters(){
        return $this->characters;
    }

    public function getFiles($path){

        foreach (glob($path."*") as $filename) {
            //$r->read($filename);
            $exp = explode(".",$filename);
            if(count($exp) > 1){
                if(end($exp) == "php" || end($exp) == "js" || end($exp) == "css"){
                    $this->files[] = $filename;
                }
            }else{
                $this->getFiles($filename."/");
            }
        }
        return $this;
    }
}
