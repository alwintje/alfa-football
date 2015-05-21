<?php
/**
 * Created by PhpStorm.
 * User: yaron
 * Date: 20-5-2015
 * Time: 15:11
 */
?>

    <div id="footer" class="scroll-url container">
        <div class="head">
            <h1>&copy; 2015, Yaron en Alwin</h1>
        </div>
    </div>

    <?php
        foreach($javascript as $val){
            echo "<script>\n";
            echo $val."\n";
            echo "</script>\n";
        }
     ?>


</body>
</html>