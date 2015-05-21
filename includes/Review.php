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

    <div class="container">
        <div class="header_image">
            <img src="<?php echo $row['image']; ?> ">
        </div>


        <div class="head">
            <h1><?php echo $row['title']; ?></h1>
                <div class="date"> <?php echo $row['rev_date']; ?> <br/> </div>
                <div class="intro"> <?php echo $row['intro']; ?> </div>
        </div>

        <div class="content">
                <?php echo $row['content']; ?><br/>
                <?php echo $row['author']; ?><br/>
        </div>
    </div>
<?php
}else{
    die("Error");
}