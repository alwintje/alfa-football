<?php
/**
 * Created by PhpStorm.
 * User: Alwin
 * Date: 21-5-2015
 * Time: 15:39
 */
?>

<div id="teams" class="scroll-url container">
    <div class="head">
        <h1>Teams</h1>
    </div>
    <div class="content">
        <?php
            if(isset($_POST['addTeam'])){
                if(strlen($_POST['name']) > 2){
                    $update = new Update();
                    $update->setDb($db)
                        ->setType("insert")
                        ->setTable("teams")
                        ->addUpdate("name",$_POST['name'])
                        ->doquery();
                }else{
                    echo "Naam is niet lang genoeg.";
                }
            }
        ?>
        <form action="admin/#teams" target="_top" method="post">
            <label for="name">Naam</label>
            <input type="text" name="name" id="name" class="form-control" />
            <br />
            <input type="submit" name="addTeam" value="Toevoegen" class="btn btn-default">
        </form>
        <table class="table">
            <tr>
                <th>
                    Namen teams
                </th>
            </tr>
            <?php
                $sql = $db->doquery("SELECT * FROM {{table}} ORDER BY name ASC","teams");
                while($row = mysqli_fetch_array($sql)){
                    echo "<tr>";
                    echo "<td>";
                    echo $row['name'];
                    echo "</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
</div>