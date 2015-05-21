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
    private $where = [];
    private $update = [];



    public function setTable($table){
        $this->table = $table;
        return $this;
    }

    public function addWhere($collumn, $value){
        $value = $db->esc_str($value);
        if(count($this->where) == 0){
            $this->where = "WHERE ".$collumn."='".$value."'";
        }else{
            $this->where .= " ".$collumn."='".$value."'";
        }
        return $this;
    }

    public function addUpdate($collumn, $value){
        $value = $db->esc_str($value);

        if(count($this->update) == 0){
            $this->update = "SET ".$collumn."='".$value."'";
        }else{
            $this->update .= " ".$collumn."='".$value."'";
        }
        return $this;
    }

    public function getUpdate(){
        $db->doquery("UPDATE {{table}} ".$this->update." ".$this->where, $this->table);
    }





}