$(document).ready(function() { 
    zaladujSamochody();
    //dodawnaie samochodu
    $("form#addCarForm").submit(function(e) {
        e.preventDefault();  
        $(".alert-success").html("");
        $(".alert-error").html("");
        $(".alert").removeClass("alert-success");
        $(".alert").removeClass("alert-danger");
        $(".alert").html('');
        $(".alert").fadeIn();
    
        var data = new FormData(this);
        var request;
    
        request = $.ajax({
            url: "./php/addCar.php",
            data: data,
            type: "POST",
            contentType: false,
            processData: false
        });

        request.done(function(response) {
            if(response == "Pomyślnie dodano samochód"){
                $(".alert").addClass("alert-success");
                $(".alert-success").html(response);
                $(".alert-success").fadeOut(3000);     
                $("#LoadCarTable tr").remove();
                zaladujSamochody();                       
            }
            else{
                $(".alert").addClass("alert-danger");
                $(".alert-success").fadeOut(3000);     
                $(".alert-danger").html(response);            
                
            }
        });
    
        request.fail(function(response) {
            $(".alert").addClass("alert-danger");
            $(".alert-success").fadeOut(3000);   
            $(".alert-danger").html(response);    
        });
        
    });
    
    //ładnwoanie samochodów
    function zaladujSamochody() {

        request = $.ajax({
            url: "./php/loadCars.php",
        })
        
        request.done(function (response) {         

                if(response!=""){
                var obj = JSON.parse(response);
            
                for (i = 0; i < obj.length; i++) {     
                    if(obj[i][2]==3){
                        obj[i][2]="Niezatwierdzony";
    
                    }   
                    else if(obj[i][2]==2){
                        obj[i][2]="Wypożyczony";
                    }
                    else {
                        obj[i][2]="Niewypożyczony";
                    }
                    $("#LoadCarTable").append(" <tr><th scope='row'>" + (i + 1) + "</th><td>" + obj[i][0] + "</td><td>" + obj[i][1] + "</td><td>" + obj[i][2]  + "</td><td><button type='button' class='btn btn-success' id='editCar' data-toggle='modal' data-target='#' onclick='editCarButtonClick(this)' value=" + obj[i]["id_pracownik"] + ">Edytuj Dane</button ><button type='button' class='deleteCarButtonValue btn btn-danger' value='" + obj[i]["vin"] + "' data-toggle='modal' data-target='#deleteCarModal' onclick='deleteCarButtonClick(this) '>Usuń Samochód</button> </td></tr>");
                    }
                }
          
        });
    
        request.fail(function (response) {
            console.log("Error" + response);
        });
    }

    //usuwanie samochodu
    $('#deleteCarButton').click(function () {
        var value = $('#deleteCarButton').val();
        var data = { vin: value }

        request = $.ajax({
            url: "./php/deleteCar.php",
            data: data,
            type: "POST"
        });

        request.done(function (response) {
            $("#LoadCarTable tr").remove();
            zaladujSamochody();
        });

        request.fail(function (response) {
            console.log(response);
        })
    });    
});



    
function deleteCarButtonClick(self) {
    self = $(self);
    $('#deleteCarButton').attr("value", self.val());
}