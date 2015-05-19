<?php
/**
 * Created by PhpStorm.
 * User: Alwin
 * Date: 18-5-2015
 * Time: 14:09
 */


?>

<div id="home" class="slider scroll-url">
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
<div id="played_games" class="scroll-url container">
    <div class="head">
        <h1>Gespeelde wedstrijden</h1>
    </div>
    <div class="content">

    </div>
</div>

<div id="upcoming_games" class="scroll-url container">
    <div class="head">
        <h1>Aankomende wedstrijden</h1>
    </div>
    <div class="content">
        asdasdasdasd
        asd
        sadasd
        as
        dsa
        d
        sa
        dsa
        d
    </div>
</div>



<?php


class Reviews{

    private $reviews = array();


    public function addReview($id,$title,$content,$color=false, $image=false){
        $this->reviews[$id] = array();
        $this->reviews[$id]['id'] = $id;
        $this->reviews[$id]['title'] = $title;
        $this->reviews[$id]['content'] = $content;

        $color = $color == false ? "#FFFFFF" : $color;
        $this->reviews[$id]['color'] = $color;

        $this->reviews[$id]['image'] = $image;
    }

    public function generateHtml(){
        $html = "";
        foreach($this->reviews as $val){
            $html .= "<li data-repeat='no'";
            $html .= "data-title='".$val['title']."'";
            $html .= "data-color='".$val['color']."'";
            $html .= "data-id='".$val['id']."'";
            if($val['image'] != false && $val['image'] != ""){
                $html .= "data-image='".$val['image']."'";
            }
            $html .= ">".$val['content']."</li>";
        }
        return $html;
    }

}

?>





