<?php
/**
 * Created by PhpStorm.
 * User: Alwin
 * Date: 21-5-2015
 * Time: 14:06
 */

class Update{

    private $table = "";
    private $do = "UPDATE {{table}}";
    private $where = "";
    private $update = "";
    private $db = false;
    private $err = 0;

    public function setTable($table){
        $this->table = $table;
        return $this;
    }

    public function addWhere($collumn, $value){
        if($this->db == false){
            if($this->err == 0){
                echo "Database vergeten te linken.<br />\n";
                echo "Gebruik: <code>->setDb(\$db)</code>.<br />\n";
                $this->err++;
            }
        }else{
            $value = $this->db->esc_str($value);
        }
        if(strlen($this->where) == 0){
            $this->where = "WHERE ".$collumn."='".$value."'";
        }else{
            $this->where .= ", ".$collumn."='".$value."'";
        }
        return $this;
    }

    public function addUpdate($collumn, $value){
        if($this->db == false){
            if($this->err == 0){
                echo "Database vergeten te linken.<br />\n";
                echo "Gebruik: <code>->setDb(\$db)</code>.<br />\n";
                $this->err++;
            }
        }else{
            $value = $this->db->esc_str($value);
        }

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
        if($this->db == false){
            if($this->err == 0){
                echo "Database vergeten te linken?<br />\n";
                echo "Gebruik: <code>->setDb(\$db)</code>.<br />\n";
                $this->err++;
            }

        }
        if(strlen($this->update) == 0){
            echo "Niks om toe te voegen of aan te passen.<br />\n";
            echo "Gebruik: <code>->addUpdate(\"Kolom\",\"Waarde\")</code><br />\n";
            $this->err++;
        }
        if($this->err == 0){
            $this->db->doquery($this->do . " " . $this->update . " " . $this->where, $this->table);
        }
        //$sql = $this->db->doquery("SELECT * FROM {{table}}","reviews");
        //echo mysqli_num_rows($sql);
        //echo $this->do." ".$this->update." ".$this->where;
    }





}