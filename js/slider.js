
var now = [1,1];
var j = [1,1];
var wait = [0,0];
var sliders = ["reviews","rss-feed"];

var img;
$(document).ready(function(){
    
    for(var i=0; i<sliders.length; i++){

        $( "."+sliders[i]+" .slides ul" ).addClass( transition );

        $( "."+sliders[i]+" .slides ul li" ).each(function(){
            if($( this ).data( "repeat" ) == "no"){
                var repeat = "no-repeat";
            }else{
                var repeat = "";
            }

            $(this).find("img").each(function(){
                img = $(this).attr("src");
                $(this).remove();
            });
            var text = $(this).html();
            $( this ).data( "image", img);
            $( this ).css("background","url('" + $( this ).data( "image" ) + "') center center / cover " + repeat);


            var readMore = $(this).data("readmore") == false ? "" :
                "<div class='read-more'><a href='"+$(this).data("readmore")+
                "'>Lees meer</a></div>";


            $( this ).html( "<div class='all' style='color: " +
                    $( this ).data( "color" ) + ";'>" +
                    $( this ).data( "title" ) +
                    "<div class='text' style='color: " +
                    $( this ).data( "color" ) + ";'>" + text + "</div>"+
                    readMore);

            $( "."+sliders[i]+" .slides ul" ).width( $("."+sliders[i]).parent().width() * j[i] );
            //console.log($(".slider").parent().width());
            $( this ).width( $("."+sliders[i]).parent().width() );
            $( this ).attr('class', "id"+j[i]);
            j[i]++;
        });




        $( "."+sliders[i] ).html("<div class=\"arrows\"><div class=\"left\"></div><div class=\"right\"></div></div>" + $( "."+sliders[i] ).html());
        if(i == 0){
            $( "."+sliders[0]+" .arrows .right" ).click(function(){
                slide(+1,0);
            });
            $( "."+sliders[0]+" .arrows .left" ).click(function(){
                slide(-1,0);
            });
        }else{

            $( "."+sliders[1]+" .arrows .right" ).click(function(){
                slide(+1,1);
            });
            $( "."+sliders[1]+" .arrows .left" ).click(function(){
                slide(-1,1);
            });
        }

    }
});
    
    var firstTime = [0,0];
    function slide(a,i){
        console.log(a,i);
        var check = now[i]+a;
        if(check > 0){
            if(check < j[i]){
                if( wait[i] == 0 ){
                    if(firstTime[i] == 0){
                        $( "."+sliders[i]+" .slides ul li" ).each(function(){
                            $( this ).attr('data-left', $( this ).position().left);
                        });
                        firstTime[i]++;
                    }
                    now[i] = now[i] + a;
                    seeSlide(now[i],i);
                    wait[i]++;
                    setTimeout(function(){wait[i]--;}, duration);
                }
            }
        }
    }
    function seeSlide(a,i){
        console.log(a,i);
        $( "."+sliders[i]+" .slides ul" ).css({
            transform:"translate3d(-" + $( "."+sliders[i]+" .slides ul .id"+a ).data("left") + "px, 0, 0)"
        });
        
    }
    
    
    
    