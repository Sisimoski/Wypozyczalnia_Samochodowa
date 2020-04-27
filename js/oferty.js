$(document).ready(function(){

    console.log("aria-disabled='true'");
})

function updatePaginator(pageID, pages){
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