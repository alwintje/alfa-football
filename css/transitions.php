<?php
/*** set the content type header ***/
header("Content-type: text/css");



if(isset($_GET['duration'])){
    $duration = $_GET['duration'];
}else{
    $duration = 2000;
}


if(isset($_GET['transition'])){
    $transition = $_GET['transition'];
}else{
    $transition = "linear";
}





                         
if($transition == "linear"){       
    $bezier = "0.250, 0.250, 0.750, 0.750";//linear
}
if($transition == "ease"){
    $bezier = "0.250, 0.100, 0.250, 1.000";//ease
}
if($transition == "ease-in"){
    $bezier = "0.420, 0.000, 1.000, 1.000";//ease-in
}
if($transition == "ease-out"){
    $bezier = "0.000, 0.000, 0.580, 1.000";//ease-out
}
if($transition == "ease-in-out"){
    $bezier = "0.420, 0.000, 0.580, 1.000";//ease-in-out
}



if($transition == "easeInQuad"){
    $bezier = "0.550, 0.085, 0.680, 0.530";//easeInQuad
}
if($transition == "easeInCubic"){
    $bezier = "0.550, 0.055, 0.675, 0.190";//easeInCubic
}
if($transition == "easeInQuart"){
    $bezier = "0.895, 0.030, 0.685, 0.220";//easeInQuart
}
if($transition == "easeInQuint"){
    $bezier = "0.755, 0.050, 0.855, 0.060";//easeInQuint
}
if($transition == "easeInSine"){
    $bezier = "0.470, 0.000, 0.745, 0.715";//easeInSine
}
if($transition == "easeInExpo"){
    $bezier = "0.950, 0.050, 0.795, 0.035";//easeInExpo
}
if($transition == "easeInCirc"){
    $bezier = "0.600, 0.040, 0.980, 0.335";//easeInCirc
}
if($transition == "easeInBack"){
    $bezier = "0.600, -0.280, 0.735, 0.045";//easeInBack
}
if($transition == "easeOutQuad"){
    $bezier = "0.250, 0.460, 0.450, 0.940";//easeOutQuad
}
if($transition == "easeOutCubic"){
    $bezier = "0.215, 0.610, 0.355, 1.000";//easeOutCubic
}
if($transition == "easeOutQuart"){
    $bezier = "0.165, 0.840, 0.440, 1.000";//easeOutQuart
}
if($transition == "easeOutQuint"){
    $bezier = "0.230, 1.000, 0.320, 1.000";//easeOutQuint
}
if($transition == "easeOutSine"){
    $bezier = "0.390, 0.575, 0.565, 1.000";//easeOutSine
}
if($transition == "/easeOutExpo"){
    $bezier = "0.190, 1.000, 0.220, 1.000";//easeOutExpo
}
if($transition == "easeOutCirc"){
    $bezier = "0.075, 0.820, 0.165, 1.000";//easeOutCirc
}
if($transition == "easeOutBack"){
    $bezier = "0.175, 0.885, 0.320, 1.275";//easeOutBack
}
if($transition == "easeInOutQuad"){
    $bezier = "0.455, 0.030, 0.515, 0.955";//easeInOutQuad
}
if($transition == "easeInOutCubic"){
    $bezier = "0.645, 0.045, 0.355, 1.000";//easeInOutCubic
}
if($transition == "easeInOutQuart"){
    $bezier = "0.770, 0.000, 0.175, 1.000";//easeInOutQuart
}
if($transition == "easeInOutQuint"){
    $bezier = "0.860, 0.000, 0.070, 1.000";//easeInOutQuint
}
if($transition == "easeInOutSine"){
    $bezier = "0.445, 0.050, 0.550, 0.950";//easeInOutSine
}
if($transition == "easeInOutExpo"){
    $bezier = "1.000, 0.000, 0.000, 1.000";//easeInOutExpo
}
if($transition == "easeInOutCirc"){
    $bezier = "0.785, 0.135, 0.150, 0.860";//easeInOutCirc
}
if($transition == "easeInOutBack"){
    $bezier = "0.680, -0.550, 0.265, 1.550";//easeInOutBack
}


?>

/*

    © Alwin Kroesen
    Provision ICT

*/

.<?php echo $transition; ?>{
    -webkit-transition: all <?php echo $duration; ?>ms cubic-bezier(<?php echo $bezier; ?>);
       -moz-transition: all <?php echo $duration; ?>ms cubic-bezier(<?php echo $bezier; ?>);
         -o-transition: all <?php echo $duration; ?>ms cubic-bezier(<?php echo $bezier; ?>);
            transition: all <?php echo $duration; ?>ms cubic-bezier(<?php echo $bezier; ?>);

    -webkit-transition-timing-function: cubic-bezier(<?php echo $bezier; ?>);
       -moz-transition-timing-function: cubic-bezier(<?php echo $bezier; ?>);
         -o-transition-timing-function: cubic-bezier(<?php echo $bezier; ?>);
            transition-timing-function: cubic-bezier(<?php echo $bezier; ?>);
}
