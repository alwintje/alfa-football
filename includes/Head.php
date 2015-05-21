<?php
/**
 * Created by PhpStorm.
 * User: Alwin
 * Date: 21-5-2015
 * Time: 17:02
 */




?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1; maximum-scale=1; user-scalable=false;width=device-width, height=device-height" >

    <title>Alfa-football</title>

    <?php
        if($head['base']){
            echo "<base href='../' target='_top'/>\n\n";
        }
        $stylesheets = [
            "css/bootstrap.css",
            "css/index.css",
            "css/header.css",
            "css/component.css",
            "css/contents.css",
        ];

        foreach($stylesheets as $val) {
            echo "<link rel='stylesheet' type='text/css' href='" . $val . "' />\n";
        }

        foreach($head['stylesheets'] as $val) {
            echo "<link rel='stylesheet' type='text/css' href='" . $val . "' />\n";
        }
        echo "\n";

        $jsFiles = [
            "js/menu",
            "js/jquery.min",
            "js/smooth-scroll",
        ];
    foreach($jsFiles as $val) {
        echo "<script src='".$val.".js'></script>\n";
    }
        foreach($head['jsFiles'] as $val) {
            if($val == "js"){
                echo "<script>";
                    echo $head['javascript'];
                echo "</script>\n";
            }else{
                echo "<script src='".$val.".js'></script>\n";
            }
        }
        $javascript = [];
    ?>

</head>
<body>
