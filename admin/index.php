<?php
/**
 * Created by PhpStorm.
 * User: Alwin
 * Date: 19-5-2015
 * Time: 10:44
 */
session_start();
$includeFolder = "includes/";
require_once("../".$includeFolder."Database.php");
$db = new Database();
$db->opendb();
require_once($includeFolder."Update.php");



require_once($includeFolder."Security.php");
$security = new Security();
$security->Security();

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $security->checkLogin($username,$password);
}
if(isset($_GET['logout'])){
    $security->logout();
}

$head = [];
$head['base'] = true;
$head['stylesheets'] = [];
$head['stylesheets'][] = "admin/css/admin.css";
$head['stylesheets'][] = "css/jquery.datetimepicker.css";

$head['javascript'] = "
    smoothScroll.init({
        speed: 1000,
        easing: 'easeInOutCubic',
        updateURL: false,
        offset: 120
    });
";
$head['jsFiles'][] = "js/datetimepicker.min";
$head['jsFiles'][] = "admin/js/script";
$head['jsFiles'][] = "";
$head['jsFiles'][] = "js";



require_once("../".$includeFolder."Head.php");

    if($security->checksession() == false){
        $menu = array(
            "?"  =>  "Terug naar de website",
        );
        require_once("../".$includeFolder."Header.php");
        require_once($includeFolder."Login.php");
    }else{
        $menu = array(
            "#reviews"      =>  "Artikelen",
            "#admin_games"  =>  "Wedstrijden",
            "#teams"        =>  "Teams",
            "#tokens"       =>  "Tokens",
            "admin/?logout" =>  "loguit",
        );
        require_once("../".$includeFolder."Header.php");
        require_once($includeFolder."Reviews.php");
        require_once($includeFolder."Games.php");
        require_once($includeFolder."Teams.php");
        require_once($includeFolder . "Tokens.php");
        require_once("../".$includeFolder . "Footer.php");

    }

?>
