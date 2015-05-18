
var menuTopPos = 0;
var elements = [];
var changeHash = false;

window.onload = function(){
    var header = document.getElementById("header");
    menuTopPos = position(header).y;


    var blocks = document.getElementsByClassName("scroll-url");
    for(var i = 0;i < blocks.length;i++){
        elements[i] = [];
        elements[i]['top'] = position(blocks[i]).y;
        elements[i]['topHeight'] = position(blocks[i]).y+blocks[i].offsetHeight;
        elements[i]['id'] = blocks[i].id;
    }



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
        var scrollForElement = window.scrollY;
        for(var i=0;i < elements.length;i++){

            if(scrollForElement < elements[i]['topHeight']-121 && scrollForElement > elements[i]['top']-121 ){
                if(history.pushState) {
                    history.pushState(null, null, "#"+elements[i]['id']);
                }
                else {
                    location.hash = "#"+elements[i]['id'];
                }
                //window.location.hash = "#"+elements[i]['id'];
            }
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
