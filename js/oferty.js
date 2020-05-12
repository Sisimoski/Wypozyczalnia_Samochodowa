$(document).ready(function(){
    //Ładowanei filtrów samochodów
      loadDefaultFilters();

        $("#producentFilter").change(function() {
            if($("#producentFilter").val()!='default'){
                $("#modelFilter").prop( "disabled", false );
                loadModelFilters();
            }
            else{
                $("#modelFilter").prop( "disabled", true );
                $("#yearFilter").prop( "disabled", true );
                $("#modelFilter").val('default');
                $("#yearFilter").val('default');
            }
        })
        $("#modelFilter").change(function() {
            if($("#modelFilter").val()!='default'){
                $("#yearFilter").prop( "disabled", false );
                loadYearFilters();
            }
            else{
                $("#yearFilter").prop( "disabled", true );
                $("#yearFilter").val('default');
            }
 
        })



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
            console.log(response);
            $(".alert").addClass("alert-danger");
            $(".alert-success").fadeOut(3000);   
            $(".alert-danger").html(response);     
        });

    });
//Wyszukwianie po filtorwaniu
    $("#filterButton").click(function() {
        $(".alert-success").html("");
        $(".alert-error").html("");
        $(".alert").removeClass("alert-success");
        $(".alert").removeClass("alert-danger");
        $(".alert").html('');
        $(".alert").fadeIn();
        var data = $(".filterForm").serialize();
        var request;
    
    
        request = $.ajax({
            url: "./php/findCarByFilters.php",
            data: data,
            type: "POST"
        });
    
        request.done(function(response) {
            console.log(response);
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
    var data = $(".filterForm").serialize();

    request = $.ajax({
        url: "./php/loadProducerFilter.php",
        data: data,
        type: "POST"
    });

    request.done(function(response) {
        if(response!=""){
            var obj = JSON.parse(response);      
                for (i = 0; i < obj.length; i++) {     
                    var producent =obj[i][0];
                    $('#producentFilter').append(new Option(producent, producent, false, false));
                //$('#modelFilter').append(new Option(obj[i][1], obj[i][1], true, true));
                //$('#rokFilter').append(new Option(obj[i][2], obj[i][2], true, true));
                }   
        }
    });

    request.fail(function(response) {
        $(".alert").addClass("alert-danger");
        $(".alert-success").fadeOut(3000);   
        $(".alert-danger").html(response);     
    });

};

function loadModelFilters() {
    $('#modelFilter').empty();
    $('#modelFilter').append(new Option('Wszystkie','default', true, true));
    var request;
    var data = $(".filterForm").serialize();

    request = $.ajax({
        url: "./php/loadModelFilter.php",
        data: data,
        type: "POST"
    });

    request.done(function(response) {
        if(response!=""){
            var obj = JSON.parse(response);      
                for (i = 0; i < obj.length; i++) {     
                    var model=obj[i][0];
                $('#modelFilter').append(new Option(model,model, true, true));
                }   
                $('#modelFilter').val('default');
        }
    });

    request.fail(function(response) {
        $(".alert").addClass("alert-danger");
        $(".alert-success").fadeOut(3000);   
        $(".alert-danger").html(response);     
    });

};

function loadYearFilters() {
    $('#yearFilter').empty();
    $('#yearFilter').append(new Option('Wszystkie','default', true, true));
    var request;
    var data = $(".filterForm").serialize();

    request = $.ajax({
        url: "./php/loadYearFilter.php",
        data: data,
        type: "POST"
    });

    request.done(function(response) {
        if(response!=""){
            var obj = JSON.parse(response);      
                for (i = 0; i < obj.length; i++) {     
                    var year=obj[i][0];
                $('#yearFilter').append(new Option(year,year, true, true));
                }   
                $('#yearFilter').val('default');
        }
    });

    request.fail(function(response) {
        $(".alert").addClass("alert-danger");
        $(".alert-success").fadeOut(3000);   
        $(".alert-danger").html(response);     
    });

};