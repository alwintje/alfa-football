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

                    $query = $db->doquery("SELECT * FROM {{table}} WHERE deleted='0' ORDER BY rev_date DESC LIMIT 10","reviews");

                    while($row = mysqli_fetch_array($query)){

                        $reviews->addReview($row['id'],$row['title'], $row['intro'], false,$row['image']);
                    }
                    echo $reviews->generateHtml();
                ?>
            </ul>
        </div>
    </div>
</div>
<?php

    $teamsQuery = $db->doquery("SELECT * FROM {{table}}","teams");
    $teams = [];
    while($row = mysqli_fetch_array($teamsQuery)){
        $teams[$row['id']] = $row['name'];
    }

?>
<div id="games" class="scroll-url container">
    <div class="head">
        <h1>Gespeelde wedstrijden</h1>
    </div>
    <div class="content">
        <?php
        $query = $db->doquery("SELECT * FROM {{table}} WHERE date < NOW()","games");
        if(mysqli_num_rows($query) > 0) {
            ?>
            <table class="table">
                <thead>
                <tr>
                    <th>Thuis</th>
                    <th>Uit</th>
                    <th>Datum</th>
                    <th>Gespeelde tijd</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($row = mysqli_fetch_array($query)) {

                ?>
                    <tr>
                        <td> <?php echo $teams[$row['team_home']] ?></td>
                        <td> <?php echo $teams[$row['team_away']] ?></td>
                        <td> <?php echo $row['date']; ?></td>
                        <td> <?php echo $row['played_time']; ?></td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        <?php
        }
        ?>
    </div>
    <div class="head">
        <h1>Aankomende wedstrijden</h1>
    </div>
    <div class="content">
        <?php
            $query = $db->doquery("SELECT * FROM {{table}} WHERE date > NOW()","games");
            if(mysqli_num_rows($query) > 0) {
        ?>
            <table class="table">
                <thead>
                <tr>
                    <th>Thuis</th>
                    <th>Uit</th>
                    <th>Datum</th>
                    <th>Gespeelde tijd</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    while ($row = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td> <?php echo $teams[$row['team_home']] ?></td>
                        <td> <?php echo $teams[$row['team_away']] ?></td>
                        <td> <?php echo $row['date']; ?></td>
                        <td> <?php echo $row['played_time']; ?></td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        <?php
            }
        ?>
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


    <div id="contact" class="scroll-url container">
        <div class="head">
            <h1>Contact</h1>
        </div>
        <div class="content">
            <p> Plaats:  Hardenberg </p>
            <p> adress: straat 7, 7676AK  </p>
            <p> Tell: 06 203 233 99  </p>
            <p> Email: alfa@informatie.nl  </p><br>
            <p>Of stuur ons een mail!</p>
            <br>
            <div class="form">
                <?php
                require_once("Database.php");
                $db = new Database();
                $db->opendb();

                $values = [
                    "name"=>"",
                    "message"=>"",
                    "email"=>""
                ];

                if(isset($_POST['contact'])){
                    $name = "name='".mysql_real_escape_string($_POST['name'])."'";
                    $message = "message='".mysql_real_escape_string($_POST['message'])."'";
                    $email = "email='".mysql_real_escape_string($_POST['email'])."'";

                    $errors = [];

                    if(strlen($_POST['name']) < 4){$errors[] = "Naam is niet lang genoeg.";}
                    if(strlen($_POST['message']) < 4){$errors[] = "Het bericht is niet lang genoeg.";}
                    if(strlen($_POST['email']) < 4){$errors[] = "Het email adress klopt niet";}

                    if(count($errors) == 0){
                        $db->doquery("INSERT INTO {{table}} SET $name, $message, $email ","contact");
                    }else{
                        $values = [
                            "name"=>$_POST['name'],
                            "message"=>$_POST['message'],
                            "email"=>$_POST['email'],
                        ];
                        foreach($errors as $val){
                            echo $val."<br />";
                        }
                    }
                    //$template = str_replace( "{{{$a}}}", $b, $template);
                }
                ?>
                <form method="post" action="#contact">
                    <label for="name">Naam</label>
                    <input name="name" id="name" value="<?php echo $values['name'];?>"  type="text" class="form-control" required/>

                    <label for="email">Email</label>
                    <input name="email" id="email" value="<?php echo $values['email'];?>" type="text" class="form-control" required/>

                    <label for="message">Bericht</label>
                    <textarea name="message"  id="message" class="form-control" required><?php echo $values['message'];?></textarea>
                    <br />
                    <input class="btn btn-default" type="submit" name="contact" value="Verzenden">
                    <br/>
                    <br/>
                </form>
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
            $html .= "<li data-repeat='no' ";
            $html .= "data-title='".$val['title']."' ";
            $html .= "data-color='".$val['color']."' ";
            $html .= "data-id='".$val['id']."' ";
            $html .= "data-readmore='".$val['readmore']."' ";
            if($val['image'] != false && $val['image'] != ""){
                $html .= "data-image='".$val['image']."' ";
            }
            $html .= " >".$val['content']."</li>";
        }
        return $html;
    }

}







