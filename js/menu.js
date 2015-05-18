
var menuTopPos = 0;

window.onload = function(){
    var header = document.getElementById("header");
    menuTopPos = position(header).y;
    console.log(menuTopPos);



    window.onscroll = function(){
        var header = document.getElementById("header");
        var headerPos = document.getElementById("header-pos");
        if(window.scrollY >= menuTopPos){
            header.style.position = "fixed";
            headerPos.style.display = "block";
        }else{
            header.style.position = "relative";
            headerPos.style.display = "none";
        }
    };
};

function position(element) {
    var xPosition = 0;
    var yPosition = 0;

    while(element) {
        xPosition += (element.offsetLeft - element.scrollLeft + element.clientLeft);
        yPosition += (element.offsetTop - element.scrollTop + element.clientTop);
        element = element.offsetParent;
    }
    return { x: xPosition, y: yPosition };
}