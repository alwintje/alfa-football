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
    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla in interdum lectus. Nunc rutrum felis sit amet velit lobortis pharetra.
        Duis sit amet tristique sapien, a bibendum odio. Curabitur dictum eget quam vel imperdiet. Nulla at mauris sit amet erat varius convallis.
        Sed sit amet libero tellus. Fusce tincidunt risus sit amet semper iaculis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
        posuere cubilia Curae; Nunc interdum dui sit amet tortor aliquam mollis. Praesent quam nulla, iaculis id massa sit amet, venenatis commodo mi.
        orem in diam finibus, porttitor imperdiet ex pulvinar.

        Donec iaculis augue ac mi malesuada, sit amet venenatis
        ex pellentesque. Aenean placerat diam neque, ut dapibus nisi facilisis a.
        Suspendisse magna nunc, vulputate eu lorem nec, mattis malesuada ligula.
        Vivamus vulputate vitae sem et posuere. Praesent laoreet sapien ut lacus
        ultricies accumsan. In in justo tempor, posuere turpis eu, semper neque. Nunc quis nibh eu odio lacinia volutpat in nec dolor.

        Quisque ac est molestie, consequat turpis sit amet, elementum mi. Curabitur bibendum condimentum quam eu congue.
        Sed nec ipsum felis. Pellentesque sit amet mollis magna, nec venenatis arcu. Nullam at condimentum elit. Nullam sed consequat odio.
        Vestibulum sagittis lacinia imperdiet. Nam faucibus quam nec mauris ultrices, a fringilla tortor pellentesque. Aliquam sapien odio,
        congue eu risus vitae, dapibus sodales nulla. Proin nec blandit justo. Pellentesque laoreet mauris vel augue tincidunt iaculis.
        Sed ac commodo lacus.
    </p>
    </div>
</div>

<div id="upcoming_games" class="scroll-url container">
    <div class="head">
        <h1>Aankomende wedstrijden</h1>
    </div>
    <div class="content">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla in interdum lectus. Nunc rutrum felis sit amet velit lobortis pharetra.
        Duis sit amet tristique sapien, a bibendum odio. Curabitur dictum eget quam vel imperdiet. Nulla at mauris sit amet erat varius convallis.
        Sed sit amet libero tellus. Fusce tincidunt risus sit amet semper iaculis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
        posuere cubilia Curae; Nunc interdum dui sit amet tortor aliquam mollis. Praesent quam nulla, iaculis id massa sit amet, venenatis commodo mi.
        orem in diam finibus, porttitor imperdiet ex pulvinar.

        Donec iaculis augue ac mi malesuada, sit amet venenatis
        ex pellentesque. Aenean placerat diam neque, ut dapibus nisi facilisis a.
        Suspendisse magna nunc, vulputate eu lorem nec, mattis malesuada ligula.
        Vivamus vulputate vitae sem et posuere. Praesent laoreet sapien ut lacus
        ultricies accumsan. In in justo tempor, posuere turpis eu, semper neque. Nunc quis nibh eu odio lacinia volutpat in nec dolor.

        Quisque ac est molestie, consequat turpis sit amet, elementum mi. Curabitur bibendum condimentum quam eu congue.
        Sed nec ipsum felis. Pellentesque sit amet mollis magna, nec venenatis arcu. Nullam at condimentum elit. Nullam sed consequat odio.
        Vestibulum sagittis lacinia imperdiet. Nam faucibus quam nec mauris ultrices, a fringilla tortor pellentesque. Aliquam sapien odio,
        congue eu risus vitae, dapibus sodales nulla. Proin nec blandit justo. Pellentesque laoreet mauris vel augue tincidunt iaculis.
        Sed ac commodo lacus.
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





