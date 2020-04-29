$(document).ready(function(){

})

function updatePaginator(pageID, pages){

    if( pages == 0){
        $("#previousPage").addClass("d-none");
        $("#nextPage").addClass("d-none");
        $(".card-content").html("Brak pojazdów w Bazie");
    }
    else{
        if(pageID == 1){
            $("#previousPage").addClass("disabled");
        }
        else{
            $("#previousPage").removeClass("disabled");
        }

        var page = '#pageID-'+pageID;
        $(page).addClass("active");


        if(pageID == pages){
            $("#nextPage").addClass("disabled");
        }
        else{
            $("#nextPage").removeClass("disabled");
        }
}
}