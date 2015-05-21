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
$head['stylesheets'][] = "css/transitions.php?duration=1000&transition=easeInCirc";
$head['stylesheets'][] = "css/slider.css";
$head['stylesheets'][] = "css/custom.css";

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
$head['jsFiles'][] = "js/modernizr.custom";
$head['jsFiles'][] = "js/menu";
$head['jsFiles'][] = "js/jquery.min";
$head['jsFiles'][] = "js/smooth-scroll";
$head['jsFiles'][] = "js/modernizr.custom";
$head['jsFiles'][] = "js";
$head['jsFiles'][] = "js/slider";
$head['jsFiles'][] = "js/script";

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