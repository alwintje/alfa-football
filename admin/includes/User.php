<?php
/**
 * Created by PhpStorm.
 * User: Alwin
 * Date: 19-5-2015
 * Time: 10:50
 */
class User{

    private $id = 0;
    private $username = "";
    private $name = "";
    private $email = "";


    function getId(){
        return $this->id;
    }
    function getUsername(){
        return $this->username;
    }
    function getName(){
        return $this->name;
    }
    function getEmail(){
        return $this->email;
    }

    function setId(){
        return $this->id;
    }
    function setUsername(){
        return $this->username;
    }
    function setName(){
        return $this->name;
    }
    function setEmail(){
        return $this->email;
    }


}