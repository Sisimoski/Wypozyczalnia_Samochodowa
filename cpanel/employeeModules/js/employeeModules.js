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

        request.done(function (response) {
            console.log(response);
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
        $(".alert").removeClass("alert-success");
        $(".alert").removeClass("alert-danger");
        $(".alert").removeClass("alert-warning");
        $(".alert").html('');
        $(".alert").fadeIn();
        
        $('#acceptCarModal').modal('hide');
        request = $.ajax({
            url: "php/zaakceptujPojazd.php",
            data: {idCar : $('#acceptCarButton').val()},
            type: "POST"
        });

        request.done(function (response) {
            zaladujAkceptacje();
            $(".alert").addClass("alert-success");
            $(".alert-success").html(response);
            $(".alert").fadeOut(3000);
        });

        request.fail(function (response) {
           
        });
        

    });

    $("#declineCarButton").click(function(){
        $(".alert").removeClass("alert-success");
        $(".alert").removeClass("alert-danger");
        $(".alert").removeClass("alert-warning");
        $(".alert").html('');
        $(".alert").fadeIn();
        
        $('#acceptCarModal').modal('hide');
        request = $.ajax({
            url: "php/odrzucPojazd.php",
            data: {idCar : $('#declineCarButton').val()},
            type: "POST"
        });

        request.done(function (response) {
            zaladujAkceptacje();
            $(".alert").addClass("alert-success");
            $(".alert-success").html(response);
            $(".alert").fadeOut(3000);
        });

        request.fail(function (response) {
           
        });


    });

    $("#dodajRabatBtn").click(function(){
        $(".alert").removeClass("alert-success");
        $(".alert").removeClass("alert-danger");
        $(".alert").removeClass("alert-warning");
        $(".alert").html('');
        $(".alert").fadeIn();

        data = $(".dodawanieRabatuForm").serialize();
        
        $('#dodawanieRabatuModal').modal('hide');
        request = $.ajax({
            url: "php/dodajRabat.php",
            data: data,
            type: "POST"
        });

        request.done(function (response) {
            if(response == "Utworzono Kod Rabatowy"){
                zaladujKodyRabatowe();
                $(".alert").addClass("alert-success");
                $(".alert-success").html(response);
                $(".alert").fadeOut(3000);
            }
            else{
                zaladujKodyRabatowe();
                $(".alert").addClass("alert-warning");
                $(".alert-warning").html(response);
                $(".alert").fadeOut(3000);
            }
        });

        request.fail(function (response) {
           
        });
    })
    

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

function usunKodRabatowyBtn(self){
    $(".alert").removeClass("alert-success");
    $(".alert").removeClass("alert-danger");
    $(".alert").removeClass("alert-warning");
    $(".alert").html('');
    $(".alert").fadeIn();

    self = $(self);

    request = $.ajax({
        url: "php/usunKodRabatowy.php",
        data: {id: self.val()},
        type: "POST"
    });

    request.done(function(response){
        zaladujKodyRabatowe();
        $(".alert").addClass("alert-success");
        $(".alert-success").html(response);
        $(".alert").fadeOut(3000);

    });

    request.fail(function(response){
        console.log(response);
    })

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
    

    var data = {id: self.val()}
    console.log(data);

        request = $.ajax({
            url: "php/zaladujAkceptacjePojazdu.php",
            data: data,
            type: "POST"
        });

        request.done(function (response) {
            console.log(response);
            var obj = JSON.parse(response);

           $("#acceptCarProducent").val(obj[0]["producent"]);
           $("#acceptCarModel").val(obj[0]["model"]);
           $("#acceptCarRok").val(obj[0]["rok"]);
           $("#acceptCarKolor").val(obj[0]["kolor"]);
           $("#acceptCarOpis").val(obj[0]["opis"]);
           $("#acceptCarNumerTablicy").val(obj[0]["numer_tablicy_rejestracyjnej"]);
           $("#acceptCarVIN").val(obj[0]["vin"]);
           $("#acceptCarPicture").attr("src", "/CarPictures/"+obj[0]["fotografia"] );
        });

        request.fail(function (response) {
            console.log(response);
        });
}

function acceptReviewButtonClick(self){
    $(".alert").removeClass("alert-success");
    $(".alert").removeClass("alert-danger");
    $(".alert").removeClass("alert-warning");
    $(".alert").html('');
    $(".alert").fadeIn();
    self = $(self);

    request = $.ajax({
        url: "php/zaakceptujOpinie.php",
        data: {id: self.val()},
        type: "POST"
    });

    request.done(function(response){
        zaladujAkceptacjeOpinii();
        $(".alert").addClass("alert-success");
        $(".alert-success").html(response);
        $(".alert").fadeOut(3000);
    });

    request.fail(function(response){
        console.log(response);
    })
}

function declineReviewButtonClick(self){
    $(".alert").removeClass("alert-success");
    $(".alert").removeClass("alert-danger");
    $(".alert").removeClass("alert-warning");
    $(".alert").html('');
    $(".alert").fadeIn();
    self = $(self);

    request = $.ajax({
        url: "php/odrzucOpinie.php",
        data: {id: self.val()},
        type: "POST"
    });

    request.done(function(response){
        zaladujAkceptacjeOpinii();
        $(".alert").addClass("alert-success");
        $(".alert-success").html(response);
        $(".alert").fadeOut(3000);
    });

    request.fail(function(response){
        console.log(response);
    })
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
                $("#tabelaPracownicy").append(" <tr><th scope='row'>" + (i + 1) + "</th><td>" + obj[i]['imie'] + "</td><td>" + obj[i]['nazwisko'] + "</td><td>" + obj[i]['data_zatrudnienia'] + "</td><td>" + obj[i]['data_zwolnienia'] + "</td><td>" + status + "</td><td><div class='d-flex justify-content-between'><button type='button' class='btn btn-sm btn-outline-primary flex-fill' id='edytujDaneButtonValue' data-toggle='modal' data-target='#edytujKontoModal' onclick='editKontoButtonClick(this)' value=" + obj[i]["id_uzytkownik"] + ">Edytuj Konto</button ><button type='button' class='usunKontoButtonValue btn btn-sm btn-danger ml-2 flex-fill' value='" + obj[i]["id_uzytkownik"] + "' data-toggle='modal' data-target='#usunKontoModal' onclick='usunKontoButtonClick(this)'>Usuń Konto</button></div> </td></tr>");
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
            $("#tabelaStatus tr").remove();
            $("#tabelaStatus").append("<tr><td colspan='7'><h6>Brak Wypożyczonych Pojazdów w podanym zakresie czasu</h6></td></tr>");
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
            for (i = 0; i < obj.length; i++) {
                $("#acceptStatus").append("<tr><th scope='row'>" + (i + 1) + "</th><td>"
                 + obj[i]['imie'] + "</td><td>"
                 + obj[i]["nazwisko"] + "</td><td>"
                 + obj[i]["miejscowosc"] + "</td><td>"
                 + obj[i]["ulica"] + "</td><td>"
                 + obj[i]["producent"] + " "+obj[i]["model"]+ "</td><td>"

                 + "<button type='button' class='acceptCarButtonValue btn btn-primary' value='" 
                 + obj[i]["id_specyfikacja_samochodu"] 
                 + "' data-toggle='modal' data-target='#acceptCarModal' onclick='acceptCarButtonClick(this)'>Sprawdź pojazd</button>" 
                 + "</td></tr>"
                );
            }
        }
        else{
            $("#acceptStatus tr").remove();
            $("#acceptStatus").append("<tr><td colspan='7'><h6>Brak Pojazdów do Akceptacji</h6></td></tr>");
        }

    });

    request.fail(function (response) {
        
    });
}

function zaladujAkceptacjeOpinii(){
    $(".alert").removeClass("alert-success");
        $(".alert").removeClass("alert-danger");
        $(".alert").removeClass("alert-warning");
        $(".alert").html('');
        $(".alert").fadeIn();

    request = $.ajax({
        url: "php/zaladujAkceptacjeOpinii.php",
    });

    request.done(function (response) {
        if(response != "Brak opinii do zaakceptowania"){
            $(".akceptacjaOpiniiTabela tr").remove(); 
            var obj = JSON.parse(response);
            for (i = 0; i < obj.length; i++) {
                string = '';
                for(j=0;j<obj[i]['ocena'];j++)
                    string+= "<div class='bx bxs-star' style='color: gold'></div>";
                for(k=0;k< (5 - obj[i]['ocena']);k++)
                    string+= "<div class='bx bx-star' style='color: gold'></div>";

                $(".akceptacjaOpiniiTabela").append("<tr><th scope='row'>" + (i + 1) + "</th><td>"
                 + obj[i]['login'] + "</td><td>"
                 + string + "</td><td>"
                 + obj[i]["komentarz"] + "</td><td>"
                 + "<button type='button' class='btn btn-sm btn-success ml-2 flex-fill acceptReview' value='" 
                 + obj[i]["id_opinia"] 
                 + "' onclick='acceptReviewButtonClick(this)'>Zaakceptuj</button>"
                 +"<button type='button' class='btn btn-sm btn-danger ml-2 flex-fill' value='" 
                 + obj[i]["id_opinia"] 
                 + "' onclick='declineReviewButtonClick(this)'>Odrzuć</button>" 
                 + "</td></tr>"
                );
            }
        }
        else{
            $(".akceptacjaOpiniiTabela tr").remove();
            $(".akceptacjaOpiniiTabela").append("<tr><td colspan='5'><h6>Brak Opinii do Akceptacji</h6></td></tr>");
        }

    });

    request.fail(function (response) {
        
    });
}

function zaladujKodyRabatowe(){
    request = $.ajax({
        url: "php/zaladujKodyRabatowe.php",
    });

    request.done(function (response) {
        if(response != "Brak Kodów Rabatowych"){
            console.log(response);
            $("#tabelaRabaty tr").remove(); 
            var obj = JSON.parse(response);
            for (i = 0; i < obj.length; i++) {
                $("#tabelaRabaty").append("<tr><th scope='row'>" + (i + 1) + "</th><td>"
                 + obj[i]['nazwa_kodu'] + "</td><td>"
                 + obj[i]["ilosc_kodow"] + "</td><td>"
                 + obj[i]["procent_rabatu"] + "%</td><td>"
                 + obj[i]["data_waznosci"] + "</td><td>"
                 + "<button type='button' class='usunKod btn btn-danger' value='" 
                 + obj[i]["id_kodu"] 
                 + "' onclick='usunKodRabatowyBtn(this)'>Usuń Kod</button>" 
                 + "</td></tr>"
                );
            }
        }
        else{
            $("#tabelaRabaty tr").remove();
            $("#tabelaRabaty").append("<tr><td colspan='6'><h6>Brak Kodów Rabatowych</h6></td></tr>");
        }

    });

    request.fail(function (response) {
        
    });
}


