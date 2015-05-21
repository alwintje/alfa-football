<?php

   /////////////////////////////////
  //      BASIS KLEUREN          //
 //     Licht blauw: #5BCFF3    //
//    Donker blauw: #123046    //
////////////////////////////////


$includeFolder = "includes";
require_once($includeFolder."/Database.php");
$db = new Database();
$db->opendb();

$head = [];
$head['base'] = false;
$head['stylesheets'] = [];
$head['stylesheets'][] = "bootstrap.css";
$head['stylesheets'][] = "index.css";
$head['stylesheets'][] = "header.css";
$head['stylesheets'][] = "contents.css";
$head['stylesheets'][] = "component.css";
$head['stylesheets'][] = "transitions.php?duration=1000&transition=easeInCirc";
$head['stylesheets'][] = "slider.css";
$head['stylesheets'][] = "custom.css";

$head['javascript'] = "

        smoothScroll.init({
            speed: 1000,
            easing: 'easeInOutCubic',
            updateURL: false,
            offset: 120
        });
        var duration = 1000;
        var transition = 'easeInCirc';
";
$head['jsFiles'][] = "modernizr.custom";
$head['jsFiles'][] = "menu";
$head['jsFiles'][] = "jquery.min";
$head['jsFiles'][] = "smooth-scroll";
$head['jsFiles'][] = "modernizr.custom";
$head['jsFiles'][] = "js";
$head['jsFiles'][] = "slider";
$head['jsFiles'][] = "script";

require_once($includeFolder."/Head.php");

    if(isset($_GET['readMore'])){
        $menu = array(
            "?terug#home"  =>  "Terug",
        );
        require_once($includeFolder."/Header.php");
        require_once($includeFolder."/Review.php");

    }else{
        $menu = array(
            "#home"  =>  "Home",
            "#games"  =>  "Wedstrijden",
            "#oranje"  =>  "Oranje",
            "#contact"  =>  "Contact",
            "search" => true,
        );
        require_once($includeFolder."/Start.php");
        require_once($includeFolder."/Header.php");
        require_once($includeFolder."/Content.php");
    }
    require_once($includeFolder."/Footer.php");
?>