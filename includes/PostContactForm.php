<?php
/**
 * Created by PhpStorm.
 * User: yaron
 * Date: 19-5-2015
 * Time: 09:59
 */

//$host = "localhost";
//$user = "root";
//$pass = "";
//
//mysql_connect($host, $user, $pass);
//
//$dbName = "school";
//
//$con = mysql_connect("localhost", "root", "");
//mysql_select_db($dbName);
//
//if(mysql_error()){
//    echo "connection to the database failed!";
//}
//
//if(mysql_query("INSERT INTO football_contact(name, email, message)VALUES(
//        '".mysql_real_escape_string($_POST['name'])."',
//        '".mysql_real_escape_string($_POST['email'])."',
//        '".mysql_real_escape_string($_POST['message'])."'
//    )"))
//{

require_once("Database.php");
$db = new Database();
$db->opendb();

$name = "name='".mysql_real_escape_string($_POST['name'])."'";
$message = "message='".mysql_real_escape_string($_POST['message'])."'";
$email = "email='".mysql_real_escape_string($_POST['email'])."'";

    $db->doquery("INSERT INTO {{table}} SET $name, $message, $email ","contact");

