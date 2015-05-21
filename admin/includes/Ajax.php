<?php
/**
 * Created by PhpStorm.
 * User: Alwin
 * Date: 20-5-2015
 * Time: 15:12
 */
require_once("../../includes/Database.php");
$db = new Database();
$db->opendb();
if(isset($_GET['reviews'])){
    $sql = $db->doquery("SELECT * FROM {{table}} ORDER BY rev_date DESC LIMIT ".$_POST['start'].",".$_POST['end'], "reviews");
    $list = [];
    while($row = mysqli_fetch_array($sql)){
        $i = count($list);
        $list[$i] = $row;
    }
    echo json_encode($list);

}
if(isset($_GET['reviewsMax'])){
    $sql = $db->doquery("SELECT id FROM {{table}}", "reviews");
    echo mysqli_num_rows($sql);
}
?>