/**
 * Created by Alwin on 20-5-2015.
 */


$(document).ready(function (){
    document.querySelector("#search").onkeyup = function(e){

        var searchString = document.querySelector("#search").value;
        var collumn = "title,intro,content";
        var table = "reviews";
        var searchContent = document.querySelector("#searchContent");
        if(searchString == "") {
            searchContent.style.display = "none";
        }else{
            $.ajax({
                type: "POST",
                url: "includes/search.php",
                data: {collumn: collumn,table: table,search: searchString},
                dataType: 'json'
            }).done(function(data){

                searchContent.style.display = "block";
                searchContent.innerHTML = "";
                if(data.length == 0){
                    searchContent.style.display = "none";
                }
                createDivs(searchContent, searchString);
                for(var i =0;i < data.length;i++){
                    createDivs(searchContent, "<a href='?readMore="+data[i].id+"'>"+data[i].title+"</a> <br />");
                }

                //console.log(data);
            });
        }
    }
});

function createDivs(parent, title){
    var el = document.createElement("div");
    el.innerHTML = title;
    parent.appendChild(el);


}