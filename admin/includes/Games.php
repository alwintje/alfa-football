<div id="admin_games" class="scroll-url container">
    <div class="head">
        <h1>Voeg een wedstrijd toe</h1>
    </div>
    <div class="content">
        <div class="form">
            <?php

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
            }
            ?>
            <form method="post" action="#contact">
                <label for="name">Thuis team</label><input name="name" id="name" value="<?php echo $values['name'];?>"  type="text" class="form-control" required/>
                <label for="message">Score Thuis</label><input name="message"  id="message" value="<?php echo $values['message'];?>" class="form-control" required>
                <label for="email">Gast team</label><input name="email" id="email" value="<?php echo $values['email'];?>" type="text" class="form-control" required/>
                <label for="message">Score Gast</label><input name="message"  id="message" value="<?php echo $values['message'];?>" class="form-control" required>
                <label for="message">Speeltijd</label><input name="message"  id="message" value="<?php echo $values['message'];?>" class="form-control" required>
                <label for="message">date</label><input name="message"  id="message" value="<?php echo $values['message'];?>" class="form-control" required>
                <br />
                <input class="btn btn-default" type="submit" name="contact" value="Verzenden">
                <br />
                <br />
            </form>
        </div>
    </div>
