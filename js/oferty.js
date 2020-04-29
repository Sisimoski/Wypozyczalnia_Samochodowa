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
            if(response == "Znaleziono wyniki"){
                console.log(response);
            }
            else{
               // $(".alert").addClass("alert-danger");
               // $(".alert-success").fadeOut(3000);     
               // $(".alert-danger").html(response);  
                console.log(response);  
            }
        });
    
        request.fail(function(response) {
            $(".alert").addClass("alert-danger");
            $(".alert-success").fadeOut(3000);   
            $(".alert-danger").html(response);     
        });
    
        
    });
    
}