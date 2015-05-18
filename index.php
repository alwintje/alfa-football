<?php
    $includeFolder = "includes";

   /////////////////////////////////
  //      BASIS KLEUREN          //
 //     Licht blauw: #5BCFF3    //
//    Donker blauw: #123046    //
////////////////////////////////

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1; maximum-scale=1; user-scalable=false;width=device-width, height=device-height" >

    <title>Alfa-football</title>

    <link href="css/index.css" rel="stylesheet" />
    <link href="css/header.css" rel="stylesheet" />
    <link href="css/Games.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <link rel="stylesheet" href="css/transitions.php?duration=1000&transition=easeInCirc">
    <link rel="stylesheet" href="css/slider.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css" />

    <script src="js/modernizr.custom.js"></script>
    <script src="js/menu.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script>
        var duration = 1000;
        var transition = 'easeInCirc';// easeInCirc easeInQuad
    </script>
    <script src="js/slider.js" ></script>


</head>
<body>
    <?php
        require_once($includeFolder."/Start.php");
        require_once($includeFolder."/Header.php");
        require_once($includeFolder."/Content.php");
        require_once($includeFolder."/Games.php");
    ?>
    <div style="height: 3000px;"></div>
    <?php
        require_once($includeFolder."/Footer.php");
    ?>
</body>
</html>