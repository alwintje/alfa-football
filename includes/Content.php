<?php
/**
 * Created by PhpStorm.
 * User: Alwin
 * Date: 18-5-2015
 * Time: 14:09
 */


?>

<div id="home" class="reviews slider scroll-url">
    <div class="background">
        <div class="slides">
            <ul>
                <?php
                    $reviews = new Reviews();

                    $query = $db->doquery("SELECT * FROM {{table}} LIMIT 10","reviews");

                    while($row = mysqli_fetch_array($query)){

                        $reviews->addReview($row['id'],$row['title'], $row['intro'], false,$row['image']);
                    }
                    echo $reviews->generateHtml();
                ?>
            </ul>
        </div>
    </div>
</div>
<div id="searchContent" class="container">
</div>

<div id="games" class="scroll-url container">
    <div class="head">
        <h1>Gespeelde wedstrijden</h1>
    </div>
    <div class="content">
        <?php

            $query = $db->doquery("SELECT * FROM {{table}}","games");

            if(count($query) > 0){
                while($row = mysqli_fetch_array($query)){?>
                 <table>
                     <tr>
                        <th>Id</th> <th>Thuis</th> <th>Uit</th> <th>Thuis score</th> <th> Uit score</th> <th>Datum</th>
                     <tr>
                     <tr>
                        <td> <?php echo $row['id']; ?></td>
                        <td> <?php echo $row['team_home']; ?></td>
                        <td> <?php echo $row['team_away']; ?></td>
                        <td> <?php echo $row['date'];?></td>
                        <td> <?php echo $row['end_date'];?></td>
                         <?php
                              }
                         }
                         ?>
                     </tr>
                 </table>
    </div>
    <div class="head">
        <h1>Aankomende wedstrijden</h1>
    </div>
    <div class="content">
        <?php
            $query = $db->doquery("SELECT * FROM {{table}}","games");

            if(count($query) > 0){
                while ($row = mysqli_fetch_array($query)){?>
                    <table>
                        <tr>
                            <th>Id</th> <th>Thuis</th> <th>Uit</th>  <th> Datum </th>
                        <tr>
                        <tr>
                            <td> <?php echo $row['id']; ?></td>
                            <td> <?php echo $row['team_home']; ?></td>
                            <td> <?php echo $row['team_away']; ?></td>
                            <td> <?php echo $row['date'];?></td>
                            <td> <?php echo $row['end_date'];?></td>
                            <?php
                                }
                            }
                            ?>
                        </tr>
                    </table>
    </div>
</div>

<div id="oranje" class="rss-feed slider scroll-url">
    <div class="background">
        <div class="slides">
            <ul>
                <?php

                $reviews = new Reviews();

                require_once($includeFolder."/RssReader.php");
                $rss = new RssReader();
                $rss->setUrl("http://www.meemetoranje.nl/feed/");


                foreach($rss->generateCode() as $val){

                    $reviews->addReview(false,$val['title'], $val['description'],false,false,$val['link']);
                }
                echo $reviews->generateHtml();
                ?>
            </ul>
        </div>
    </div>
</div>


<?php


class Reviews{

    private $reviews = array();


    public function addReview($i,$title,$content,$color=false, $image=false, $link=false){
        $id = $i == false ? count($this->reviews) : $i;
        $this->reviews[$id] = array();
        $this->reviews[$id]['id'] = $id;
        $this->reviews[$id]['title'] = $title;
        $this->reviews[$id]['content'] = $content;

        $color = $color == false ? "#FFFFFF" : $color;
        $this->reviews[$id]['color'] = $color;

        $this->reviews[$id]['image'] = $image;
        if($link == false){

        }else{

        }
        if($i != false && $link == false){
            $this->reviews[$id]['readmore'] = "?readMore=".$i;
        }elseif($link != false){
            $this->reviews[$id]['readmore'] = $link;
        }else{
            $this->reviews[$id]['readmore'] = false;
        }
    }

    public function generateHtml(){
        $html = "";
        foreach($this->reviews as $val){
            $html .= "<li data-repeat='no'";
            $html .= "data-title='".$val['title']."'";
            $html .= "data-color='".$val['color']."'";
            $html .= "data-id='".$val['id']."'";
            $html .= "data-readmore='".$val['readmore']."'";
            if($val['image'] != false && $val['image'] != ""){
                $html .= "data-image='".$val['image']."'";
            }
            $html .= ">".$val['content']."</li>";
        }
        return $html;
    }

}







