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
                    if(isset($_POST['addReview'])){
                        $title = "title='".mysql_real_escape_string($_POST['title'])."'";
                        $intro = "intro='".mysql_real_escape_string($_POST['intro'])."'";
                        $content = "content='".mysql_real_escape_string($_POST['content'])."'";
                        $author = "author='".mysql_real_escape_string($_POST['author'])."'";
                        $date = "rev_date='".mysql_real_escape_string($_POST['rev_date'])."'";
                        $image = "image='".mysql_real_escape_string($_POST['image'])."'";
                        $errors = [];
                        if(count($title) < 4){$errors[] = "Titel is niet lang genoeg.";}
                        if(count($title) < 4){$errors[] = "Titel is niet lang genoeg.";}
                        if(count($title) < 4){$errors[] = "Titel is niet lang genoeg.";}

                        if(count($errors) == 0){
                            $db->doquery("INSERT INTO {{table}} SET $title, $intro, $content ,$date,$author,$image","reviews");
                        }else{

                            foreach($errors as $val){
                                echo $val."<br />";
                            }
                        }
                    }
                ?>

                <label for="title">Titel</label><input name="title" id="title" type="text" class="form-control"/>
                <label for="intro">Inleiding</label><input name="intro" id="intro" type="text" class="form-control"/>
                <label for="content">Bericht</label><textarea name="content" id="content" class="form-control"></textarea>
                <label for="author">Maker</label><input name="author" id="author" class="form-control" >
                <label for="rev_date">Datum</label><br/><input name="rev_date" id="rev_date" class="form-control"><br/>
                <label for="image">Afbeelding</label><input name="image" id="message" class="form-control" >
                <br />
                <input type="submit" class="btn btn-default" name="addReview" value="Verstuur"/>
            </form>
        </div>
    </div>
</div>

<script>

    jQuery('#rev_date').datetimepicker({
        inline:true,
        theme:'dark',
        minDate: 0
    });
</script>
