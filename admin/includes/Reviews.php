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
<!--                <label for="title">title</label><input name="title" id="title" type="text" class="form-control" required/>-->
<!--                <label for="intro">intro</label><input name="intro" id="intro" type="text" class="form-control" required/>-->
<!--                <label for="content">content</label><textarea name="content" id="content" class="form-control" required></textarea>-->
<!--                <label for="author">author</label><input name="author" id="author" class="form-control" required>-->
<!--                 <label for="rev_date">date</label><br/><input name="rev_date" id="rev_date" class="form-control" required><br/>-->
<!--                <label for="image">image</label><input name="image" id="message" class="form-control" required>-->
                <?php
                    $values = [
                        "title"=>"",
                        "intro"=>"",
                        "content"=>"",
                        "author"=>"",
                        "date"=>"",
                        "image"=>""
                    ];

                    if(isset($_POST['addReview'])){

                        $title = "title='".$db->esc_str($_POST['title'])."'";
                        $intro = "intro='".$db->esc_str($_POST['intro'])."'";
                        $content = "content='".$db->esc_str($_POST['content'])."'";
                        $author = "author='".$db->esc_str($_POST['author'])."'";
                        $date = "rev_date='".$db->esc_str($_POST['rev_date'])."'";
                        $image = "image='".$db->esc_str($_POST['image'])."'";



                        $errors = [];

                        if(strlen($_POST['title']) < 4){$errors[] = "Titel is niet lang genoeg.";}
                        if(strlen($_POST['intro']) < 4){$errors[] = "Intro is niet lang genoeg.";}
                        if(strlen($_POST['content']) < 4){$errors[] = " Inhoud is niet lang genoeg.";}
                        if(strlen($_POST['author']) < 4){$errors[] = " Auteur is niet lang genoeg.";}
                        if(strlen($_POST['rev_date']) < 4){$errors[] = " Datum is niet gekozen.";}
                        //if(strlen($_POST['image']) < 4){$errors[] = " Acteur is niet lang genoeg.";}

                        if(count($errors) == 0){
                            $db->doquery("INSERT INTO {{table}} SET $title, $intro, $content ,$date,$author,$image","reviews");
                        }else{

                            $values = [
                                "title"=>$_POST['title'],
                                "intro"=>$_POST['intro'],
                                "content"=>$_POST['content'],
                                "author"=>$_POST['author'],
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
                <label for="intro">Inleiding</label><input name="intro" id="intro" value="<?php echo $values['intro'];?>" type="text" class="form-control"/>
<!--                <label for="content">Bericht</label><textarea name="content" value="--><?php //echo $values['content'];?><!--" id="content" class="form-control"></textarea>-->
                 <label>Bericht</label>
                <textarea name="content" style="display: none;" id="text"></textarea>
                <div contenteditable="true" class="form-control editable-div" id="text_div"
                     onkeyup="document.querySelector('#text').innerHTML = document.querySelector('#text_div').innerHTML;"><?php echo $values['content'];?>
                </div>

                <label for="author">Maker</label><input name="author" value="<?php echo $values['author'];?>" id="author" class="form-control" >
                <label for="rev_date">Datum</label><br/><input name="rev_date" value="<?php echo $values['rev_date'];?>" id="rev_date" class="form-control"><br/>
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
        inline:true,
        theme:'dark',
        minDate: 0
    });
</script>
