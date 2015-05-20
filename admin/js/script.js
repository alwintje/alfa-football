



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
        url: "admin/includes/Ajax.php?reviews",
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
        var table = document.createElement("table");
        table.style.width = "100%";
        for(var i =0;i < data.length;i++){
            //createDivs(searchContent, "<a href='?readMore="+data[i].id+"'>"+data[i].title+"</a> <br />");
            console.log(data[i].title);
            var tr = document.createElement("tr");
            var td = document.createElement("td");
            td.innerHTML = data[i].title;
            tr.appendChild(td);
            td = document.createElement("td");
            td.innerHTML = data[i].rev_date;
            tr.appendChild(td);
            table.appendChild(tr);
        }
        content.appendChild(table);

        //console.log(data);
    });



}