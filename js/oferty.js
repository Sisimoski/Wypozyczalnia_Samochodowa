$(document).ready(function(){
    //Wyszukiwarka samochodu
    $("#findCarButton").click(function() {
        $(".alert-success").html("");
        $(".alert-error").html("");
        $(".alert").removeClass("alert-success");
        $(".alert").removeClass("alert-danger");
        $(".alert").html('');
        $(".alert").fadeIn();
        var data = $(".findCarForm").serialize();
        var request;
    
    
        request = $.ajax({
            url: "./php/findCar.php",
            data: data,
            type: "POST"
        });
    
        request.done(function(response) {
            window.location.replace(response);
        });
    
        request.fail(function(response) {
            $(".alert").addClass("alert-danger");
            $(".alert-success").fadeOut(3000);   
            $(".alert-danger").html(response);     
        });
    
        
    });

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


    
        if(pageID == pages){
            $("#nextPage").addClass("disabled");
        }
        else{
            $("#nextPage").removeClass("disabled");
        }
}
}