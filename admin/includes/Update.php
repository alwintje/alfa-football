<?php
/**
 * Created by PhpStorm.
 * User: Alwin
 * Date: 21-5-2015
 * Time: 14:06
 */

if(!isset($db)){
    require_once($_GET['url']."Database.php");
    $db = new Database();
    $db->opendb();

}

class Update{

    private $table = "";
    private $do = "UPDATE {{table}}";
    private $where = "";
    private $update = "";
    private $db = "";


    public function setTable($table){
        $this->table = $table;
        return $this;
    }

    public function addWhere($collumn, $value){
        $value = $this->db->esc_str($value);
        if(strlen($this->where) == 0){
            $this->where = "WHERE ".$collumn."='".$value."'";
        }else{
            $this->where .= ", ".$collumn."='".$value."'";
        }
        return $this;
    }

    public function addUpdate($collumn, $value){
        $value = $this->db->esc_str($value);

        if(strlen($this->update) == 0){
            $this->update = "SET ".$collumn."='".$value."'";
        }else{
            $this->update .= ", ".$collumn."='".$value."'";
        }
        return $this;
    }
    public function setType($type){
        if($type == "insert"){
            $this->do = "INSERT INTO {{table}}";
        }else{
            $this->do = "UPDATE {{table}}";
        }
        return $this;
    }
    public function setDb($db){
        $this->db = $db;
        return $this;
    }

    public function doquery(){
        $this->db->doquery($this->do." ".$this->update." ".$this->where, $this->table);
        //$sql = $this->db->doquery("SELECT * FROM {{table}}","reviews");
        //echo mysqli_num_rows($sql);
        //echo $this->do." ".$this->update." ".$this->where;
    }





}