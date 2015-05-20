<?php
/**
 * Created by PhpStorm.
 * User: Alwin
 * Date: 20-5-2015
 * Time: 15:12
 */
require_once("../../includes/Database.php");
if(isset($_GET['reviews'])){
    echo $_POST['start'];
    echo "<br />";
    echo $_POST['end'];
}