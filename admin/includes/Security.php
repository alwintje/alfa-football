<?php
/**
 * Created by PhpStorm.
 * User: Alwin
 * Date: 19-5-2015
 * Time: 10:50
 */
require_once("../includes/Database.php");

class Security{

    public $db;
    public function Security(){
        $this->db = new Database();
        $this->db->opendb();
    }

    public function checksession(){

        $row = false;

        if (isset($_SESSION['football'])) {
            $theuser = explode("//", $_SESSION['football']);
            $query = $this->db->doquery("SELECT * FROM {{table}} WHERE username='$theuser[0]' AND password='$theuser[1]'", "users");

            if (mysqli_num_rows($query) != 1) {
                die("Er is iets mis met de sessions (Error 1).");
                unset($_SESSION['football']);
            }
            $row = mysqli_fetch_array($query);
        }

        return $row;
    }
    public function checkRegister($username,$name,$pass,$secondPass, $email){
        $query = $this->db->doquery("SELECT username FROM {{table}} WHERE username='$username'","users");

        $errors = array();

        if($username == ""){$errors[] = "Gebruikernsaam is niet ingevult.";}
        if(mysqli_num_rows($query) != 0){$errors[] = "Gebruikersnaam bestaat al.";}
        if($pass == ""){$errors[] = "Wachtwoord is niet ingevult.";}
        if($pass != $secondPass){$errors[] = "Wachtwoorden komen niet overeen.";}
        if($name == ""){$errors[] = "Naam is niet ingevult.";}
        if($email == ""){$errors[] = "Email is niet ingevult.";}


        if(count($errors) == 0){
            $this->db->doquery("INSERT INTO {{table}} SET username='$username', displayname='$name', password='".md5($pass)."'","users");
            return array("Gebruiker aangemaakt");
        }else{
            return $errors;
        }
    }

    public function checkLogin($username,$password){
        $query = $this->db->doquery("SELECT * FROM {{table}} WHERE username='$username' AND password='".md5($password)."'","users");
        if(mysqli_num_rows($query) > 0){
            $_SESSION['football'] = $username."//".md5($password);
            return true;
        }else{
            return false;
        }
    }


    public function logout(){
        unset($_SESSION['football']);
        header("location: ?");
    }
}