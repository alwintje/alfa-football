<?php
/**
 * Created by PhpStorm.
 * User: Alwin
 * Date: 19-5-2015
 * Time: 16:53
 */
?>

<div id="tokens" class="scroll-url container">
    <div class="head">
        <h1>Token aanmaken</h1>
    </div>
    <div class="content">
        <?php
            if(isset($_POST['token'])){
                if($_POST['datetimepicker'] != 0){

                    $query = $db->doquery("SELECT id FROM {{table}} ORDER BY id DESC LIMIT 1","tokens");
                    if(mysqli_num_rows($query) != 0){
                        $r = mysqli_fetch_array($query);
                    }else{
                        $r = ["id"=>"0"];
                    }
                    $db->doquery("INSERT INTO {{table}} SET token='".md5($r['id'])."', date='".$_POST['datetimepicker']."'","tokens");
                    echo " Token aangemaakt.<br />";
                    echo " Token: ".md5($r['id'])."<br />";
                    echo " <code>&lt;a href=\"admin/?token=".md5($r['id'])."#register\"&gt;Klik hier om te registreren&lt;/a&gt;</code><br />";
                }else{
                    echo "Geen datum gekozen<br />";
                }
            }
        ?>
        <form method="post" action="admin/#addUser" target="_top">
            <input name="datetimepicker" id="datetimepicker" type="text" class="form-control"/>
            <br />
            <input type="submit" name="token" value="Genereer token" class="btn btn-default" />
        </form>
    </div>
    <div class="head">
        <h1>Niet gebruikte tokens</h1>
    </div>
    <div class="content">
        <?php
            $q = $db->doquery("SELECT * FROM {{table}} WHERE used=false","tokens");
            echo "<table class='table'>";
            echo "<tr><th>Token</th><th>Verloop Datum</th></tr>";
            while($row = mysqli_fetch_array($q)){
                echo "<tr>";
                echo "<td>";
                echo $row['token'];
                echo "</td>";
                echo "<td>";
                echo date("d-m-Y",$row['date']);
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        ?>
    </div>
</div>
<script>

    jQuery('#datetimepicker').datetimepicker({
        inline:true,
        theme:'dark',
        minDate: 0,
        format:'unixtime'
    });
</script>