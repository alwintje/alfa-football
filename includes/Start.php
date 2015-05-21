<div id="start" class="scroll-url">
        <div id="boxgallery" class="boxgallery" data-effect="effect-1">
            <div class="panel"><img src="img/1.jpg" alt="Image 1"/></div>
            <div class="panel"><img src="img/2.jpg" alt="Image 2"/></div>
            <div class="panel"><img src="img/3.jpg" alt="Image 3"/></div>
            <div class="panel"><img src="img/4.jpg" alt="Image 4"/></div>
        </div>
        <header class="codrops-header">
            <div class="background">
                <img src="img/logo_start.png" alt="logo start"/>
                <h1>
                    <span>
                        Alwin Kroesen en Yaron Lambers
                    </span>
                </h1>
                <nav class="codrops-demos">
                    <a class="start-button" href="#home" data-scroll>Start</a>
                </nav>
            </div>
        </header>
</div><!-- /container -->

<script src="js/classie.js"></script>
<script src="js/boxesFx.js"></script>

<?php
$javascript[] = "
        new BoxesFx( document.getElementById( 'boxgallery' ) );
    ";
?>
