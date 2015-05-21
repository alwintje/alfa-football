<?php
/**
 * Created by PhpStorm.
 * User: yaron
 * Date: 20-5-2015
 * Time: 13:11
 */
?>

<div id="reviews" class="scroll-url container">
    <div class="head">
        <h1>Maak een nieuwe review</h1>
    </div>
    <div class="content">
        <div class="form">
            <form method="post" action="admin/#reviews" target="_top" >
                <?php
                    $values = [
                        "title"=>"",
                        "intro"=>"",
                        "content"=>"",
                        "date"=>"",
                        "image"=>""
                    ];

                    if(isset($_POST['addReview'])){

                        $user = $security->checksession();

                        $title = "title='".$db->esc_str($_POST['title'])."'";
                        $intro = "intro='".$db->esc_str($_POST['intro'])."'";
                        $content = "content='".$db->esc_str($_POST['content'])."'";
                        $author = "author='".$user['id']."'";
                        $date = "rev_date='".$db->esc_str($_POST['rev_date'])."'";
                        $image = "image='".$db->esc_str($_POST['image'])."'";



                        $errors = [];

                        if(strlen($_POST['title']) < 4){$errors[] = "Titel is niet lang genoeg.";}
                        if(strlen($_POST['intro']) < 4){$errors[] = "Intro is niet lang genoeg.";}
                        if(strlen($_POST['content']) < 4){$errors[] = " Inhoud is niet lang genoeg.";}
                        if(strlen($_POST['rev_date']) < 4){$errors[] = " Datum is niet gekozen.";}
                        //if(strlen($_POST['image']) < 4){$errors[] = " Acteur is niet lang genoeg.";}

                        if(count($errors) == 0){
                            $db->doquery("INSERT INTO {{table}} SET $title, $intro, $content ,$date,$author,$image","reviews");
                        }else{

                            $values = [
                                "title"=>$_POST['title'],
                                "intro"=>$_POST['intro'],
                                "content"=>$_POST['content'],
                                "date"=>$_POST['rev_date'],
                                "image"=>$_POST['image'],
                            ];
                            foreach($errors as $val){
                                echo $val."<br />";
                            }
                        }
                    }
                ?>

                <label for="title">Titel</label><input name="title" id="title" value="<?php echo $values['title'];?>" type="text" class="form-control"/>
                <label for="intro">Inleiding</label>
                <textarea name="intro" style="display: none;" id="intro"></textarea>
                <div contenteditable="true" class="form-control editable-div" id="intro_div"
                     onkeyup="document.querySelector('#intro').innerHTML = document.querySelector('#intro_div').innerHTML;">
                    <?php echo $values['intro'];?>
                </div>
                 <label>Bericht</label>
                <textarea name="content" style="display: none;" id="text"></textarea>
                <div contenteditable="true" class="form-control editable-div" id="text_div"
                     onkeyup="document.querySelector('#text').innerHTML = document.querySelector('#text_div').innerHTML;">
                    <?php echo $values['content'];?>
                </div>

                <label for="rev_date">Datum</label><br/><input name="rev_date" value="<?php echo $values['date'];?>" id="rev_date" class="form-control" required="required"><br/>
                <label for="image">Afbeelding</label><input name="image" value="<?php echo $values['image'];?>" id="image" class="form-control" >
                <br />
                <input type="submit" class="btn btn-default" name="addReview" value="Verstuur"/>
            </form>
        </div>
    </div>
    <div class="head">
        <h1>Reviews</h1>
    </div>
    <div class="content" id="reviewContents">

    </div>
</div>

<script>

    jQuery('#rev_date').datetimepicker({
        minDate: 0
    });
</script>
