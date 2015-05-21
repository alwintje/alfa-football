



$(document).ready(function(){



    reviews();
});

var rev_start = 0;
var rev_end = 10;
function reviews(){

    var content = document.querySelector("#reviewContents");
    content.innerHTML = "";


    $.ajax({
        type: "POST",
        url: "admin/includes/Ajax.php?reviews",
        data: {start: rev_start,end: rev_end},
        dataType: 'json'
    }).done(function(data){

        $.ajax({
            url: "admin/includes/Ajax.php?reviewsMax"
        }).done(function(rev_max){
            // button previous
            if(rev_start != 0){
                var bttnPrev = document.createElement("input");
                bttnPrev.type = "button";
                bttnPrev.value = "Vorige";
                content.appendChild(bttnPrev);

                bttnPrev.onclick = function(){
                    rev_end -= 10;
                    rev_start -= 10;
                    reviews();
                };
            }

            // button next
            if(rev_max > rev_end){
                var bttnNext = document.createElement("input");
                bttnNext.type = "button";
                bttnNext.value = "Volgende";
                content.appendChild(bttnNext);

                bttnNext.onclick = function(){
                    rev_end += 10;
                    rev_start += 10;
                    reviews();
                };
            }

            var table = document.createElement("table");
            table.setAttribute("class", "table");
            table.style.width = "100%";
            for(var i =0;i < data.length;i++){

                var tr = document.createElement("tr");

                var td = document.createElement("td");
                td.innerHTML = data[i].title;
                tr.appendChild(td);

                td = document.createElement("td");
                td.innerHTML = data[i].rev_date;
                tr.appendChild(td);

                tr.dataset.id = data[i].id;
                tr.style.cursor = "pointer";
                tr.onclick = function(e){
                    var id = e.target.parentNode.dataset.id;
                    window.location.href = "admin/?editRev="+id+"#reviews";
                };
                table.appendChild(tr);
            }
            content.appendChild(table);
        });

    });

}