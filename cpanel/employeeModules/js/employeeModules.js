$(document).ready(function () {
    $(".alert").fadeOut();

    $('#newsletterButton').click(function(e){
        $(".alert").removeClass("alert-success");
        $(".alert").removeClass("alert-danger");
        $(".alert").removeClass("alert-warning");
        $(".alert").html('');
        $(".alert").fadeIn();

        var message = $('#newsletterMessage').val();
        if(message != ""){
            
            request = $.ajax({
                url: "php/newsletterWysylanie.php",
                data: {message : message},
                type: "POST"
            });

            request.done(function (response) {
                $(".alert").addClass("alert-success");
                $(".alert-success").html(response);
                $(".alert").fadeOut(3000);
            });

            request.fail(function (response) {
                $(".alert").addClass("alert-warning");
                $(".alert-warning").html(response);
                $(".alert").fadeOut(3000);
            });
        }
        else{
            $(".alert").addClass("alert-warning");
                $(".alert-warning").html("Nie wprowadzono żadnej wiadomości");
                $(".alert").fadeOut(3000);
        }

        e.preventDefault();
    });

    $('#usunKontoButton').click(function () {
        $(".alert").removeClass("alert-success");
        $(".alert").removeClass("alert-danger");
        $(".alert").removeClass("alert-warning");
        $(".alert").html('');
        $(".alert").fadeIn();
        var value = $('#usunKontoButton').val();
        var data = { id: value }
        request = $.ajax({
            url: "php/usunPracownika.php",
            data: data,
            type: "POST"
        });

        request.done(function () {
            
            $("#tabelaPracownicy tr").remove();
            zaladujPracownikow();
            $('#usunKontoModal').modal('hide');
            $(".alert").addClass("alert-success");
            $(".alert-success").html("Usunięto Użytkownika");
            $(".alert").fadeOut(3000);
        });

        request.fail(function () {
            $("#tabelaPracownicy tr").remove();
            zaladujPracownikow();
            $('#usunKontoModal').modal('hide');
            $(".alert").addClass("alert-danger");
            $(".alert-danger").html("Wystąpił nieznany błąd");
            $(".alert").fadeOut(3000);
        });
    });
   
    $("#dodajKontoButton").click(function () {
        $(".alert").removeClass("alert-success");
        $(".alert").removeClass("alert-danger");
        $(".alert").removeClass("alert-warning");
        $(".alert").html('');
        $(".alert").fadeIn();
        var request;
        var data = $(".pracownikAddForm").serialize();
        request = $.ajax({
            url: "php/dodajPracownika.php",
            data: data,
            type: "POST"
        });

        request.done(function () {
            
            $("#tabelaPracownicy tr").remove();
            zaladujPracownikow();
            $('#dodajKontoModal').modal('hide');
            $(".alert").addClass("alert-success");
            $(".alert-success").html("Dodano Użytkownika");
            $(".alert").fadeOut(3000);
        });

        request.fail(function () {
            $("#tabelaPracownicy tr").remove();
            zaladujPracownikow();
            $('#dodajKontoModal').modal('hide');
            $(".alert").addClass("alert-danger");
            $(".alert-danger").html("Wystąpił nieznany błąd");
            $(".alert").fadeOut(3000);

        });
    });

    $("#edytujKontoButton").click(function(){
        $(".alert").removeClass("alert-success");
        $(".alert").removeClass("alert-danger");
        $(".alert").removeClass("alert-warning");
        $(".alert").html('');
        $(".alert").fadeIn();
        var value = $('#edytujKontoButton').val();
        var data = $('.pracownikEditForm').serialize() + "&id="+value;

        request = $.ajax({
            url: "php/edytujPracownika.php",
            data: data,
            type: "POST"
        });

        request.done(function () {
            
            $("#tabelaPracownicy tr").remove();
            zaladujPracownikow();
            $('#edytujKontoModal').modal('hide');
            $(".alert").addClass("alert-success");
            $(".alert-success").html("Edytowano Użytkownika");
            $(".alert").fadeOut(3000);
        });

        request.fail(function (response) {
            $("#tabelaPracownicy tr").remove();
            zaladujPracownikow();
            $('#edytujKontoModal').modal('hide');
            $(".alert").addClass("alert-danger");
            $(".alert-danger").html("Wystąpił nieznany błąd");
            $(".alert").fadeOut(3000);
        });
    });

    $("#acceptCarButton").click(function(){
        
        $('#acceptCarModal').modal('hide');
        console.log("ZAAKCEPTOWANO");
        

    });

    $("#declineCarButton").click(function(){
        $('#acceptCarModal').modal('hide');
        console.log("ODRZUCONO");


    });
    

    $('#dataOd').on('input', function() { 
        $("#tabelaStatus tr").remove(); 
        zaladujStatus();
    });

    $('#dataDo').on('input', function() {
        $("#tabelaStatus tr").remove(); 
        zaladujStatus();
    });

});



function usunKontoButtonClick(self) {
    self = $(self);
    $('#usunKontoButton').attr("value", self.val());
}

function editKontoButtonClick(self){
    self = $(self);
    $('#edytujKontoButton').attr("value", self.val());

    request = $.ajax({
        url: "php/zaladujDanePracownika.php",
        data: {id: self.val()},
        type: "POST"
    });

    request.done(function(response){
        console.log(response);
        if(response.match("Wystąpił błąd")){
            console.log(response);
        }
        else{
            var obj = JSON.parse(response);

            
            
            $("#imieEdit").val(obj[0]["imie"]);
            $("#nazwiskoEdit").val(obj[0]["nazwisko"]);
            $("#emailEdit").val(obj[0]["email"]);
            $("#cityEdit").val(obj[0]["miejscowosc"]);
            $("#inputStateEdit").val(obj[0]["wojewodztwo"]);
            $("#ulicaEdit").val(obj[0]["ulica"]);
            $("#numerDomuEdit").val(obj[0]["nr_domu"]);
            $("#kodEdit").val(obj[0]["kod_pocztowy"]);
            $("#telefonEdit").val(obj[0]["nr_tel"]);
            $("#komorkaEdit").val(obj[0]["nr_kom"]);
            $("#dodatkowe_informacjeEdit").val(obj[0]["dodatkowe_informacje"]);
            $("#inputRoleEdit").val(obj[0]["rodzaj_uzytkownika"]);
            $("#inputActivationEdit").val(obj[0]["czy_aktywowany"]);

            var data_zatrudnienia = new Date(obj[0]["data_zatrudnienia"]).toISOString().split('T')[0];
            $("#dataZatrudnieniaEdit").val(data_zatrudnienia);

            
            if(obj[0]["data_zwolnienia"] != null){
                var data_zwolnienia = new Date(obj[0]["data_zwolnienia"]).toISOString().split('T')[0];
                $("#dataZwolnieniaEdit").val(data_zwolnienia);
            }
            else{
                $("#dataZwolnieniaEdit").val('');

            }
            
        }
    });

    request.fail(function(response){
        console.log(response);
    })

}

function acceptCarButtonClick(self){
    self = $(self);
    $('#acceptCarButton').attr("value", self.val());
    $('#declineCarButton').attr("value", self.val());
    

    var data = {vin: self.val()}

        request = $.ajax({
            url: "php/zaladujAkceptacjePojazdu.php",
            data: data,
            type: "POST"
        });

        request.done(function (response) {
            var obj = JSON.parse(response);

           $("#acceptCarProducent").val(obj[0]["producent"]);
           $("#acceptCarModel").val(obj[0]["model"]);
           $("#acceptCarRok").val(obj[0]["rok"]);
           $("#acceptCarKolor").val(obj[0]["kolor"]);
           $("#acceptCarOpis").val(obj[0]["opis"]);
           $("#acceptCarNumerTablicy").val(obj[0]["numer_tablicy_rejestracyjnej"]);
           $("#acceptCarVIN").val(self.val());
           $("#acceptCarPicture").attr("src", "/CarPictures/"+obj[0]["fotografia"] );
        });

        request.fail(function (response) {
            console.log(response);
        });
}

function zaladujPracownikow() {
    request = $.ajax({
        url: "php/ladowaniePracownikow.php",
    })

    request.done(function (response) {
        try {
            var obj = JSON.parse(response);
            
            for (i = 0; i < obj.length; i++) {
                if (obj[i]["czy_aktywowany"] == 0) {
                    var status = "Nie Aktywowany";
                }
                else {
                    var status = "Aktywowany"
                }
                $("#tabelaPracownicy").append(" <tr><th scope='row'>" + (i + 1) + "</th><td>" + obj[i]['imie'] + "</td><td>" + obj[i]['nazwisko'] + "</td><td>" + obj[i]['data_zatrudnienia'] + "</td><td>" + obj[i]['data_zwolnienia'] + "</td><td>" + status + "</td><td><button type='button' class='btn btn-warning' id='edytujDaneButtonValue' data-toggle='modal' data-target='#edytujKontoModal' onclick='editKontoButtonClick(this)' value=" + obj[i]["id_uzytkownik"] + ">Edytuj Dane</button ><button type='button' class='usunKontoButtonValue btn btn-danger' value='" + obj[i]["id_uzytkownik"] + "' data-toggle='modal' data-target='#usunKontoModal' onclick='usunKontoButtonClick(this)'>Usuń Pracownika</button> </td></tr>");
            }
        }
        catch(error){
            console.log(error);
        }
    });

    request.fail(function (response) {
        console.log("Error" + response);
    });
}

function zaladujStatus() {
    $("#alert").html("");
    var data = $(".statusPojazdowDane").serialize();
    request = $.ajax({
        url: "php/zaladujStatus.php",
        data: data,
        type: "POST"
    })

    request.done(function (response) {
        if (response == "Brak pojazdow") {
            $("#alert").html("Brak pojazdów w podanym zakresie czasu");
        }
        else {
            console.log(response);
            var obj = JSON.parse(response);
            console.log(obj);

            for (i = 0; i < obj.length; i++) {
                if (obj[i][4] == "0")
                    var status = "Nie Przyjęty";
                else
                    var status = "Przyjęty";
                if (obj[i][5] == "0")
                    var platnosc = "Nieopłacone";
                else
                    var platnosc = "Opłacone";
                if (obj[i][6] == "0")
                    var realizacja = "Nie zrealizowane";
                else
                    var realizacja = "Zrealizowane";
                $("#tabelaStatus").append(" <tr><th scope='row'>" + i + "</th><td>" + obj[i][0] + "</td><td>" + obj[i][1] + "</td><td>" + obj[i][2] + " " + obj[i][3] + "</td><td>" + status + "</td><td>" + platnosc + "</td><td>" + realizacja + "</td></tr>");
            }
        }
    })
    request.fail(function (response) {
        console.log("Error" + response);
    });
};

function zaladujAkceptacje(){
        $(".alert").removeClass("alert-success");
        $(".alert").removeClass("alert-danger");
        $(".alert").removeClass("alert-warning");
        $(".alert").html('');
        $(".alert").fadeIn();

    request = $.ajax({
        url: "php/zaladujAkceptacje.php",
    });

    request.done(function (response) {
        if(response != "Brak pojazdow do zaakceptowania"){
            $("#acceptStatus tr").remove(); 
            var obj = JSON.parse(response);
            console.log(response);
            for (i = 0; i < obj.length; i++) {
                $("#acceptStatus").append("<tr><th scope='row'>" + (i + 1) + "</th><td>"
                 + obj[i]['imie'] + "</td><td>"
                 + obj[i]["nazwisko"] + "</td><td>"
                 + obj[i]["miejscowosc"] + "</td><td>"
                 + obj[i]["ulica"] + "</td><td>"
                 + obj[i]["producent"] + " "+obj[i]["model"]+ "</td><td>"

                 + "<button type='button' class='acceptCarButtonValue btn btn-primary' value='" 
                 + obj[i]["vin"] 
                 + "' data-toggle='modal' data-target='#acceptCarModal' onclick='acceptCarButtonClick(this)'>Sprawdź pojazd</button>" 
                 + "</td></tr>"
                );
            }
        }
        else{
            $(".alert").addClass("alert-warning");
            $(".alert").html(response);
            $(".alert").fadeOut(3000);
        }

    });

    request.fail(function (response) {
        
    });
}