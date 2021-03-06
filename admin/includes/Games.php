<div id="admin_games" class="scroll-url container">
    <div class="head">
        <h1>Voeg een wedstrijd toe</h1>
    </div>
    <div class="content">
        <div class="form" >
            <?php

            $values = [
                "team_home"=>"",
                "score_home"=>"",
                "team_away"=>"",
                "score_away"=>"",
                "played_time"=>"",
                "date"=>""
            ];

            if(isset($_POST['games'])){
                $errors = [];

                if(strlen($_POST['team_home']) < 1){$errors[] = "Naam is niet lang genoeg.";}
                if(strlen($_POST['score_home']) < 1){$errors[] = "Het bericht is niet lang genoeg.";}
                if(strlen($_POST['team_away']) < 1){$errors[] = "Het email adress klopt niet";}
                if(strlen($_POST['score_away']) < 1){$errors[] = "Naam is niet lang genoeg.";}
                if(strlen($_POST['played_time']) < 1){$errors[] = "Het bericht is niet lang genoeg.";}
                if(strlen($_POST['date']) < 1){$errors[] = "Het email adress klopt niet";}

                if(count($errors) == 0){

                    $update = new Update();
                    $update->setDb($db)
                        ->setType("insert")
                        ->addUpdate("team_home",$_POST['team_home'])
                        ->addUpdate("team_away",$_POST['team_away'])
                        ->addUpdate("score_home",$_POST['score_home'])
                        ->addUpdate("score_away",$_POST['score_away'])
                        ->addUpdate("played_time",$_POST['played_time'])
                        ->addUpdate("date",$_POST['date'])
                        ->setTable("games")
                        ->doquery();
                    echo "Toegevoegd";
                }else{
                    $values = [
                        "team_home"=>$_POST['team_home'],
                        "score_home"=>$_POST['score_home'],
                        "team_away"=>$_POST['team_away'],
                        "score_away"=>$_POST['score_away'],
                        "played_time"=>$_POST['played_time'],
                        "date"=>$_POST['date'],
                    ];
                    foreach($errors as $val){
                        echo $val."<br />";
                    }
                }
            }

            ?>
            <form method="post" action="" target="_top">
                <label for="team_home">Thuis team</label>
                <select name="team_home" id="team_home" class="form-control" required />
                    <?php
                        $sqlTeams = $db->doquery("SELECT * FROM {{table}} ORDER BY name ASC","teams");
                        while($row = mysqli_fetch_array($sqlTeams)){
                            echo "<option value='".$row['id']."'>".$row['name']."</option>";
                        }
                    ?>
                </select>
                <label for="score_home">Score Thuis</label>
                <input name="score_home"  id="score_home" value="<?php echo $values['score_home'];?>" class="form-control" required />

                <label for="team_away">Gast team</label>
                <select name="team_away" id="team_away" class="form-control" required />
                    <?php
                        $sqlTeams = $db->doquery("SELECT * FROM {{table}} ORDER BY name ASC","teams");
                        while($row = mysqli_fetch_array($sqlTeams)){
                            echo "<option value='".$row['id']."'>".$row['name']."</option>";
                        }
                    ?>
                </select>
                <label for="score_away">Score Gast</label>
                <input name="score_away"  id="score_away" value="<?php echo $values['score_away'];?>" class="form-control" required />

                <label for="played_time">Speeltijd</label>
                <input name="played_time"  id="played_time" value="<?php echo $values['played_time'];?>" class="form-control" required />

                <label for="date">datum</label>
                <input name="date" autocomplete="off" id="date" value="<?php echo $values['date'];?>" class="form-control" required />

                <br />
                <input class="btn btn-default" type="submit" name="games" value="Verzenden">
                <br />
                <br />
            </form>
        </div>
    </div>
</div>
<?php
$javascript[] = "

        jQuery('#date').datetimepicker({
            minDate: 0
        });
    ";
?>


