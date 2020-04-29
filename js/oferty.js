$(document).ready(function(){
    //Ładowanei filtrów samochodów
   loadDefaultFilters();


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

function loadDefaultFilters() {
    var request;

    request = $.ajax({
        url: "./php/loadFilters.php",
        type: "POST"
    });

    request.done(function(response) {
        if(response!=""){
            var obj = JSON.parse(response);
            for (i = 0; i < obj.length; i++) {     
                $('#producentFilter').append(new Option(obj[i][0], obj[i][0], true, true));
                $('#modelFilter').append(new Option(obj[i][1], obj[i][1], true, true));
                $('#rokFilter').append(new Option(obj[i][2], obj[i][2], true, true));
            }   
        }
    });

    request.fail(function(response) {
        $(".alert").addClass("alert-danger");
        $(".alert-success").fadeOut(3000);   
        $(".alert-danger").html(response);     
    });

};