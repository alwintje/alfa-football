
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

            if(scrollForElement < elements[i]['topHeight']-131 && scrollForElement > elements[i]['top']-131 ){

                if(history.pushState) {
                    history.pushState(null, null, location.protocol+'//'+location.host+location.pathname+"#"+elements[i]['id']);

                }
                else {
                    location.hash = location.href.replace(location.hash,'')+"#"+elements[i]['id'];
                }
                var menuItem = document.querySelector("#header .navigation ul li a[href='#"+elements[i]['id']+"']");
                //addClass(menuItems,"active");
                if(menuItem != null && menuItem != undefined){
                    var menuItems = document.querySelectorAll("#header .navigation ul li a");
                    for(var j=0;j<menuItems.length;j++){
                        menuItems[j].setAttribute("class", "");
                    }
                    menuItem.setAttribute("class", "active");
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
