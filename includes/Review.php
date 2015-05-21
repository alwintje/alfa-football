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
        <?php
            if($row['image'] != "") {
        ?>
            <div class="header_image">
                <img src="<?php echo $row['image']; ?> ">
            </div>
        <?php
            }
        ?>

        <div class="head">
            <?php
                echo "<h1>".$row['title']."</h1>";
                $phpDate = strtotime( $row['rev_date'] );
                $mysqlDate = date( 'd-m-Y H:i', $phpDate );
            ?>
            <div class="date"> <?php echo $mysqlDate; ?> <br/> </div>
            <div class="intro"> <?php echo $row['intro']; ?> </div>
        </div>

        <div class="content">
                <?php echo $row['content']; ?>
                <br/>
                <br/>
                <span class="italic">Auteur:
                    <?php

                        $sql = $db->doquery("SELECT * FROM {{table}} WHERE id='".$row['author']."'", "users");
                        $r = mysqli_fetch_array($sql);
                        echo $r['name'] ;

                    ?><br/>
                </span>
        </div>
    </div>
<?php
}else{
    die("Error");
}