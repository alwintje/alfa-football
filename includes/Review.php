<?php
/**
 * Created by PhpStorm.
 * User: Alwin
 * Date: 19-5-2015
 * Time: 13:02
 */


$query = $db->doquery("SELECT * FROM {{table}} WHERE id='".$_GET['readMore']."' LIMIT 1", "reviews");

if(count($query) > 0){
    $row = mysqli_fetch_array($query);
?>

    <div class="scroll-url container">
        <div class="head">
            <h1><?php echo $row['title']; ?></h1>
        </div>
        <div class="content">

        </div>
    </div>
<?php
}else{
    die("Error");
}