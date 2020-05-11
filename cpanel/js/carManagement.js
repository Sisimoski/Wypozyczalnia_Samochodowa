$(document).ready(function () {

    $(".alert").fadeOut();

    

    //dodawnaie samochodu
    $("form#addCarForm").submit(function (e) {
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

        request.done(function (response) {
            if (response == "Pomyślnie dodano samochód") {
                $(".alert").addClass("alert-success");
                $(".alert-success").html(response);
                $(".alert-success").fadeOut(3000);
                $("#LoadCarTable tr").remove();
                zaladujSamochody();
            } else {
                $(".alert").addClass("alert-danger");
                $(".alert-success").fadeOut(3000);
                $(".alert-danger").html(response);

            }
        });

        request.fail(function (response) {
            $(".alert").addClass("alert-danger");
            $(".alert-success").fadeOut(3000);
            $(".alert-danger").html(response);
        });

    });



    //usuwanie samochodu
    $('#deleteCarButton').click(function () {
        var value = $('#deleteCarButton').val();
        var data = {
            vin: value
        }

        request = $.ajax({
            url: "./php/deleteCar.php",
            data: data,
            type: "POST"
        });

        request.done(function (response) {
            $("#LoadCarTable tr").remove();
            zaladujSamochody();
            $('#deleteCarModal').modal('hide');
        });

        request.fail(function (response) {
            console.log(response);
        })
    });
    // edytowanie samochodu
    $('#editCarButton').click(function () {
        var value = $('#editCarButton').val();
        //  var data = { vin: value }
        var data = $(".editCarForm").serialize() + '&vin=' + value;

        request = $.ajax({
            url: "./php/editCar.php",
            data: data,
            type: "POST"
        });

        request.done(function (response) {
            $("#LoadCarTable tr").remove();
            zaladujSamochody();
            $('#editCarModal').modal('hide');
        });

        request.fail(function (response) {
            console.log(response);
        })
    });

    var link  = $(location).attr("href");
    if(link.includes("activeRent.php")){
        zaladujWypozyczenia();
    }
    if(link.includes("rentHistory.php")){
        zaladujHistorieWypozyczen();
    }

    $(document).on("click", "button.returnRentedCar" , function() {
        $(".alert-success").html("");
        $(".alert-error").html("");
        $(".alert").removeClass("alert-success");
        $(".alert").removeClass("alert-danger");
        $(".alert").html('');
        $(".alert").fadeIn();
        $(this).val();

        request = $.ajax({
            url: "./php/returnRentedCar.php",
            data: {id : $(this).val()},
            type: "POST"
        })

        request.done(function (response) {
            console.log(response);
            if (response == "Oddano pojazd") {
                $(".alert").addClass("alert-success");
                $(".alert-success").html(response);
                $(".alert-success").fadeOut(3000);
                $(".activeRentCarsTable tr").remove();
                zaladujWypozyczenia();
            } else {
                $(".alert").addClass("alert-danger");
                $(".alert-success").fadeOut(3000);
                $(".alert-danger").html(response);

            }
        });

        request.fail(function (response){

        });
    });

    $(document).on("click", "button.payRent" , function() {
        $(".alert-success").html("");
        $(".alert-error").html("");
        $(".alert").removeClass("alert-success");
        $(".alert").removeClass("alert-danger");
        $(".alert").html('');
        $(".alert").fadeIn();
        $(this).val()


        request = $.ajax({
            url: "./php/payRentedCar.php",
            data: {id : $(this).val()},
            type: "POST"
        })
    
        request.done(function (response) {
            console.log(response);
            if (response == "Opłacono pojazd") {
                $(".alert").addClass("alert-success");
                $(".alert-success").html(response);
                $(".alert-success").fadeOut(3000);
                $(".activeRentCarsTable tr").remove();
                zaladujWypozyczenia();
            } else {
                $(".alert").addClass("alert-danger");
                $(".alert-success").fadeOut(3000);
                $(".alert-danger").html(response);

            }
        });

        request.fail(function (response){

        });
    });

    $(document).on("click", "button.makeReview" , function() {
        $("#addReviewModal").modal("show");

    });

    $('#dataOd').on('input', function() { 
        $(".historyRentCars tr").remove(); 
        zaladujHistorieWypozyczen();
        
    });

    $('#dataDo').on('input', function() {
        $(".historyRentCars tr").remove();
        zaladujHistorieWypozyczen(); 
        
    });

    
   
    $("#rate").rate({
        max_value: 5,
        step_size: 1,
    });
    
});




function deleteCarButtonClick(self) {
    self = $(self);
    $('#deleteCarButton').attr("value", self.val());
}

function editCarButtonClick(self) {
    self = $(self);
    $('#editCarButton').attr("value", self.val());

    var value = $('#editCarButton').val();

    var data = {
        vin: value
    }



    request = $.ajax({
        url: "./php/loadEditCarInfo.php",
        data: data,
        type: "POST"
    });

    request.done(function (response) {
        if (response != "") {
            var obj = JSON.parse(response);
        }
        $("#producentEdit").val(obj[0][0]);
        $("#modelEdit").val(obj[0][1]);
        $("#rok_produkcjiEdit").val(obj[0][2]);
        $("#kolorEdit").val(obj[0][3]);
        $("#opisEdit").val(obj[0][4]);
        $("#cenaEdit").val(obj[0][5]);
        $("#segmentEdit").val(obj[0][6]);
        $("#typ_silnikaEdit").val(obj[0][7]);
        $("#mocEdit").val(obj[0][8]);
        $("#pojemnosc_silnikaEdit").val(obj[0][9]);
        $("#srednie_spalenieEdit").val(obj[0][10]);
        $("#skrzynia_biegowEdit").val(obj[0][11]);
        $("#ilosc_miejscEdit").val(obj[0][12]);
        $("#pojemnosc_bagaznikaEdit").val(obj[0][13]);
        $("#zasiegEdit").val(obj[0][14]);

    });

    request.fail(function (response) {
        console.log(response);
    })

}

//ładnwoanie samochodów
function zaladujSamochody() {

    request = $.ajax({
        url: "./php/loadCars.php",
    })

    request.done(function (response) {
        if (response != "") {
            var obj = JSON.parse(response);
            for (i = 0; i < obj.length; i++) {
                if (obj[i][3] == 3) {
                    obj[i][3] = "Niezatwierdzony";

                } else if (obj[i][3] == 2) {
                    obj[i][3] = "Wypożyczony";
                } else {
                    obj[i][3] = "Niewypożyczony";
                }
                $("#LoadCarTable").append(" <tr><th scope='row'>" + (i + 1) + "</th><td>" + obj[i]["producent"]+' '+obj[i]["model"] + "</td><td>" + obj[i][2] + "</td><td>" + obj[i][3] + "</td><td><div class='d-flex justify-content-between'><button type='button' class='editCarButtonValue btn btn-sm btn-outline-primary flex-fill' value='" + obj[i]["vin"] + "' data-toggle='modal' data-target='#editCarModal' onclick='editCarButtonClick(this) '>Edytuj</button><button type='button' class='deleteCarButtonValue btn btn-sm btn-danger ml-2 flex-fill' value='" + obj[i]["vin"] + "' data-toggle='modal' data-target='#deleteCarModal' onclick='deleteCarButtonClick(this) '>Usuń</button></div></td></tr>");
            }
        }else{
            $("#LoadCarTable").append("<tr><td colspan='5'><h6>Brak dodanych Pojazdów</h6></td></tr>");
        }


    });

    request.fail(function (response) {
        console.log("Error" + response);

    });
}

function zaladujWypozyczenia(){
    request = $.ajax({
        url: "./php/loadRentedCars.php",
    })

    request.done(function (response) {
        if (response != "") {
            var obj = JSON.parse(response);
            for (i = 0; i < obj.length; i++) {
                
                obj[i]['czy_oplacono'] == 0 ? obj[i]['czy_oplacono'] = 'Nie opłacone' : obj[i]['czy_oplacono'] = 'Opłacony';
                obj[i]['czy_zrealizowano'] == 0 ? obj[i]['czy_zrealizowano'] = 'Nie zrealizowane' : obj[i]['czy_zrealizowano'] = 'Zrealizowane';
    
                $(".activeRentCarsTable").append("<tr><th scope='row'>" + (i + 1) + "</th><td>"+obj[i]["producent"]+" "+obj[i]["model"]+"</td><td>"+obj[i]["data_zlozenia"]+"</td><td>"+obj[i]["data_odbioru"]+"</td><td>"+obj[i]["data_zwrotu"]+"</td><td>"+obj[i]["czy_oplacono"]+"</td><td>"+obj[i]["czy_zrealizowano"]+"</td> <td class='rentCarfunctions"+obj[i]["id_wypozyczenia"]+"'></td> </tr>");
               
                if(obj[i]["czy_oplacono"] == 'Nie opłacone'){
                    $(".rentCarfunctions"+obj[i]["id_wypozyczenia"]).append("<button type='button' class='payRent btn btn-sm btn-success ml-2 flex-fill' value='" + obj[i]["id_wypozyczenia"] + "'>Opłać</button>");
                }
                else {
                    $(".rentCarfunctions"+obj[i]["id_wypozyczenia"]).append("<button type='button' class='returnRentedCar btn btn-sm btn-primary ml-2 flex-fill' value='" + obj[i]["id_wypozyczenia"] + "'>Oddaj Pojazd</button>");
                }
                 
            }
        }else{
            $(".activeRentCarsTable").append("<tr><td colspan='8'><h6>Brak wypożyczonych Pojazdów</h6></td></tr>");
      }


    });

    request.fail(function (response) {
        console.log("Error" + response);

    });
}

function zaladujHistorieWypozyczen(){
    var data = $(".historiaPojazdow").serialize();
    request = $.ajax({
        url: "./php/loadHistoryRents.php",
        data: data,
        type: "POST"
    })

    request.done(function (response) {
        if (response != "Brak pojazdow") {
            
            var obj = JSON.parse(response);
            for (i = 0; i < obj.length; i++) {
                obj[i]['czy_oplacono'] == 0 ? obj[i]['czy_oplacono'] = 'Nie opłacone' : obj[i]['czy_oplacono'] = 'Opłacony';
                obj[i]['czy_zrealizowano'] == 0 ? obj[i]['czy_zrealizowano'] = 'Nie zrealizowane' : obj[i]['czy_zrealizowano'] = 'Zrealizowane';
    
                $(".historyRentCars").append("<tr><th scope='row'>" + (i + 1) + "</th><td>"+obj[i]["producent"]+" "+obj[i]["model"]+"</td><td>"+obj[i]["data_zlozenia"]+"</td><td>"+obj[i]["data_odbioru"]+"</td><td>"+obj[i]["data_zwrotu"]+"</td><td>"+obj[i]["czy_oplacono"]+"</td><td>"+obj[i]["czy_zrealizowano"]+"</td> <td class='historyRentCars"+obj[i]["id_wypozyczenia"]+"'></td> </tr>");
               
                if(obj[i]["czy_opinia"] == '0'){
                    $(".historyRentCars"+obj[i]["id_wypozyczenia"]).append("<button type='button' class='makeReview btn btn-sm btn-success ml-2 flex-fill' value='" + obj[i]["id_wypozyczenia"] + "'>Wystaw Opinię</button>");
                }
                 
            }
        }else{
            $(".historyRentCars").append("<tr><td colspan='8'><h6>Brak wypożyczonych Pojazdów</h6></td></tr>");
      }


    });

    request.fail(function (response) {
        console.log("Error" + response);

    });
}



