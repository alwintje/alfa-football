
var now = 1;
var i = 1;
var wait = 0;



$(document).ready(function(){
    
    
    $( ".slider .slides ul" ).addClass( transition );  
    
    $( ".slider .slides ul li" ).each(function(){
        if($( this ).data( "repeat" ) == "no"){
            var repeat = "no-repeat";
        }else{
            var repeat = "";
        }
        var text = $(this).html();
        $( this ).css("background","url('" + $( this ).data( "image" ) + "') center center / cover " + repeat);
        $( this ).html( "<div class='title' style='color: " +
                $( this ).data( "color" ) + ";'>" +
                $( this ).data( "title" ) +
                "<div class='text' style='color: " +
                $( this ).data( "color" ) + ";'>" + text + "</div>"+
                "<div class='read-more'><a href='?readMore="+
                $( this ).data( "id" )+"'>Lees meer</a></div>");

        $( ".slider .slides ul" ).width( $(".slider").parent().width() * i );
        //console.log($(".slider").parent().width());
        $( this ).width( $(".slider").parent().width() );
        $( this ).attr('id', i);
        i++;
    });
    
    
    
    
    $( ".slider" ).html("<div class=\"arrows\"><div class=\"left\"></div><div class=\"right\"></div></div>" + $( ".slider" ).html());
    $( ".right" ).click(function(){
        slide(+1);
    });
    $( ".left" ).click(function(){
        slide(-1);
    });
});
    
    var firstTime = 0;
    function slide(a){
        var check = now+a;
        if(check > 0){
            if(check < i){
                if( wait == 0 ){
                    if(firstTime == 0){
                        $( ".slider .slides ul li" ).each(function(){
                            $( this ).attr('data-left', $( this ).position().left);
                        });
                        firstTime++;
                    }
                    now = now + a;
                    seeSlide(now);
                    wait++;
                    setTimeout(function(){wait--;}, duration);
                }
            }
        }
    }
    function seeSlide(a){
        $( ".slider .slides ul" ).css({transform:"translate3d(-" + $( ".slider .slides ul #"+a ).data("left") + "px, 0, 0)"});
        
    }
    
    
    
    