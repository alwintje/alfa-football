<div id="games" class="scroll-url container">
    <div class="head">
        <h1>Voeg een wedstrijd uitslag  toe</h1>
    </div>
    <div class="content">
        <div class="form">
            <form method="post" action="admin/#games" target="_top" >
                <?php


                if(isset($_POST['verzend_score'])){

                    $user = $security->checksession();

                    $team_home = "home='".$db->esc_str($_POST['team_home'])."'";
                    $team_away = "away='".$db->esc_str($_POST['team_away'])."'";
                    $date = "date='".$db->esc_str($_POST['date'])."'";
                    $played_time = "time='".$db->esc_str($_POST['played_time'])."'";

                        $db->doquery("INSERT INTO {{table}} SET $team_home, $team_away, $date ,$played_time","games");
                                    }
                ?>

                <label for="title"> Thuis Team </label><input name="home" id="team_home" " type="text" class="form-control"/>
                <label for="intro">Gast Team</label><input name="away" id="team_away"  type="text" class="form-control"/>
                <label for="intro">Datum</label><input name="date" id="date"  type="text" class="form-control"/>
                <label for="intro">Gespeelde tijd</label><input name="time" id="played_time" type="text" class="form-control"/>

                <input type="submit" class="btn btn-default" name="verzend_score" value="Verstuur"/>
            </form>
        </div>
    </div>
</div>

<script>

    jQuery('#rev_date').datetimepicker({
        minDate: 0
    });
</script>