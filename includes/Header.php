<?php
/**
 * Created by PhpStorm.
 * User: Alwin
 * Date: 18-5-2015
 * Time: 11:24
 */
?>

<div id="header">
    <div class="inner">
        <div class="logo" >
            <a href="#start" data-scroll>
                <img src="img/logo.png" alt="logo"/>
            </a>
        </div>
        <div class="navigation">
            <ul>
                <?php
                    $search = false;
                    foreach($menu as $key => $val){
                        if($key == "search" && $val == true){
                            $search = true;
                        }else{
                            $scroll = substr($key, 0, 1) == "#" ? "data-scroll" : "";
                            echo "<li><a href='".$key."' $scroll target='_top' >".$val."</a> </li>";
                        }
                    }
                    if($search){
                        echo "<li>";
                        echo "<input type='text' id='search' placeholder='Zoeken..' autocomplete='off'/>";
                        echo "</li>";
                    }
                ?>
            </ul>
            <?php
                // Staat hier i.v.m. validatie, anders staat een div in de ul tag.
                if($search){
                    echo "<div id='searchContent'></div>";
                }
            ?>
        </div>
    </div>
</div>
<div id="header-pos">

</div>