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
            echo "<base href='../' target='_top'/>";
        }
        foreach($head['stylesheets'] as $val) {
            echo "<link rel='stylesheet' type='text/css' href='css/" . $val . "' />\n";
        }
        echo "\n";
        foreach($head['jsFiles'] as $val) {
            if($val == "js"){
                echo "<script>";
                    echo $head['javascript'];
                echo "</script>\n";
            }else{
                echo "<script src='js/".$val.".js'></script>\n";
            }
        }
    ?>

</head>
<body>
