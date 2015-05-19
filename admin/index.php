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


require_once($includeFolder."Security.php");
$security = new Security();
$security->Security();

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $security->checkLogin($username,$password);
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1; maximum-scale=1; user-scalable=false;width=device-width, height=device-height" >

    <title>Alfa-football</title>
    <base href="../" target="_blank"/>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/index.css" rel="stylesheet" />
    <link href="css/header.css" rel="stylesheet" />
    <link href="css/contents.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <link href="admin/css/admin.css" rel="stylesheet" />

    <script src="js/menu.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script src="js/smooth-scroll.js" ></script>
    <script>
        smoothScroll.init({
            speed: 1000,
            easing: 'easeInOutCubic',
            updateURL: false,
            offset: 120
        });
    </script>
</head>
<body>
    <?php
        if($security->checksession() == false){
            $menu = array(
                "?"  =>  "Terug naar de website",
            );
            require_once("../".$includeFolder."/Header.php");
            require_once($includeFolder."Login.php");
        }

    ?>
</body>
</html>
