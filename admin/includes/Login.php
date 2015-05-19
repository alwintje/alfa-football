<?php
/**
 * Created by PhpStorm.
 * User: Alwin
 * Date: 19-5-2015
 * Time: 11:20
 */
?>

<div id="login" class="container">
    <div class="head">
        <h1>Login</h1>
    </div>
    <div class="content">
        <?php
            if(isset($_POST['login'])){
                echo "Gebruikersnaam of wachtwoord fout.";//
            }
        ?>
        <form method="post" action="admin/#login" target="_top">
            <label for="username">Gebruikernaam</label><input name="username" id="username" type="text" class="form-control"/>
            <label for="password">Wachtwoord</label><input name="password" id="password" type="password" class="form-control"/>
            <br />
            <input type="submit" name="login" value="Inloggen" class="btn btn-default" />
        </form>
    </div>
</div>


<div id="register" class="scroll-url container">
    <div class="head">
        <h1>Register</h1>
    </div>
    <div class="content">
        <?php

            if(isset($_POST['register'])){

                $username = $_POST['username'];
                $password = $_POST['password'];
                $secondPass = $_POST['secondPassword'];
                $name = $_POST['name'];
                $email = $_POST['email'];

                $reg = $security->checkRegister($username,$name,$password,$secondPass, $email);
                foreach($reg as $val){
                    echo $val.'<br />';
                }
            }
        ?>
        <form method="post" action="admin/#register" target="_top">
            <label for="username">Gebruikernaam</label><input name="username" id="username" type="text" class="form-control"/>
            <label for="password">Wachtwoord</label><input name="password" id="password" type="password" class="form-control"/>
            <label for="secondPassword">Herhaal wachtwoord</label><input name="secondPassword" id="secondPassword" type="password" class="form-control"/>
            <label for="name">Naam</label><input name="name" id="name" type="text" class="form-control"/>
            <label for="email">Email</label><input name="email" id="email" type="text" class="form-control"/>

            <br />
            <input type="submit" name="register" value="Registreer" class="btn btn-default" />
        </form>
    </div>
</div>