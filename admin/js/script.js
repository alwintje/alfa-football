



$(document).ready(function(){


    content.innerHTML = "moii";

    reviews();
});

var rev_start = 0;
var rev_end = 10;
function reviews(){

    var content = document.querySelector("#reviewContents");

    $.ajax({
        type: "POST",
        url: "admin/includes/ajax.php?reviews",
        data: {start: rev_start,end: rev_end},
        dataType: 'json'
    }).done(function(data){
        //
        //searchContent.style.display = "block";
        //searchContent.innerHTML = "";
        //if(data.length == 0){
        //    searchContent.style.display = "none";
        //}
        //createDivs(searchContent, searchString);
        //for(var i =0;i < data.length;i++){
        //    createDivs(searchContent, "<a href='?readMore="+data[i].id+"'>"+data[i].title+"</a> <br />");
        //}

        console.log(data);
    });
}