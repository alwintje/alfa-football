<?php
/**
 * Created by PhpStorm.
 * User: yaron
 * Date: 18-5-2015
 * Time: 18:47
 */
?>

<div id="contact" class="scroll-url container">
    <div class="head">
        <h1>Contact</h1>
    </div>
    <div class="content">
        <div class="form">
            <form method="post" action="includes/PostContactForm.php">
                <label for="name">Naam</label><input name="name" id="name" type="text" class="form-control" required/>
                <label for="email">Email</label><input name="email" id="email" type="text" class="form-control" required/>
                <label for="message">bericht</label><textarea name="message" id="message" class="form-control" required></textarea>
                <br />
                <button class="btn btn-default">Verzend</button>
            </form>
        </div>
    </div>
</div>