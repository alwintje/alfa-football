<?php
/**
 * Created by PhpStorm.
 * User: Alwin
 * Date: 20-5-2015
 * Time: 09:43
 */


$search = new Search();
$search->setCollumn($_POST['collumn'])
    ->setTable($_POST['table'])
    ->setSearchString($_POST['search']);

if(isset($_POST['limit'])){
    $search->setLimit($_POST['limit']);
}else{
    $search->setLimit(100);
}


    //->getResult();


echo json_encode($search->getResult());


class Search{

    private $table = "";
    private $searchString = "";
    private $collumn = "";
    private $limit = 0;

    public function setTable($table){
        $this->table = $table;
        return $this;
    }
    public function getTable(){
        return $this->table;
    }
    public function setLimit($limit){
        $this->limit = $limit;
        return $this;
    }
    public function getLimit(){
        return $this->limit;
    }
    public function setSearchString($string){
        $this->searchString = $string;
        return $this;
    }
    public function getSearchString(){
        return $this->searchString;
    }

    public function setCollumn($collumn){
        $this->collumn = $collumn;
        return $this;
    }

    public function getCollumn(){
        return $this->collumn;
    }
    public function getResult(){
        require_once("Database.php");
        $db = new Database();
        $db->opendb();


        $coll = explode(",",$this->collumn);
        if(count($coll > 1)){
            $string = $coll[0]." LIKE '%".$this->searchString."%'";
            for($i=1; $i < count($coll);$i++){
                $string .= " OR ".$coll[$i]." LIKE '%".$this->searchString."%'";
            }
        }else{
            $string = $this->collumn." LIKE '%".$this->searchString."%'";
        }

        //$query = $db->doquery("SELECT * FROM {{table}} WHERE content LIKE '%te%' COLLATE utf8_general_ci",$this->table);
        $query = $db->doquery("SELECT * FROM {{table}} WHERE $string ORDER BY id DESC LIMIT 15",$this->table);

        $list = [];
//        $list[] = $this->collumn;
//        $list[] = $this->table;
//        $list[] = $this->searchString;
//        $list[] = "SELECT * FROM {{table}} WHERE ".$this->collumn." LIKE '%".$this->searchString."%' COLLATE utf8_general_ci";
        while($row = mysqli_fetch_array($query)){
            if(isset($row['deleted'])){
                if($row['deleted'] == false){
                    $i = count($list);
                    $list[$i] = $row;
                }
            }else{
                $i = count($list);
                $list[$i] = $row;
            }
        }
        return $list;
    }


}