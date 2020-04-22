$(document).ready( function(){


});

function loadCar(id){
    request = $.ajax({
        url: "php/loadCar.php",
        data: {id : id},
        type: "POST"
    });

    request.done(function (response) {
        console.log(response);
        var obj = JSON.parse(response);
        console.log(obj.length);
        
            $("body").append("Producent <b>"+obj["producent"]+"</b> </br>");
            $("body").append("Model <b>"+obj["model"]+"</b> </br>");
            $("body").append("Rok <b>"+obj["rok"]+"</b> </br>");
            $("body").append("Kolor <b>"+obj["kolor"]+"</b> </br>");
            $("body").append("Opis <b>"+obj["opis"]+"</b> </br>");
            $("body").append("Cena Netto <b>"+obj["cena_netto"]+"</b> </br>");
            $("body").append("Vat <b>"+obj["procent_vat_ceny"]+"</b> </br>");
            $("body").append("Cena Brutton <b>"+obj["cena_brutto"]+"</b> </br>");
            $("body").append("VIN <b>"+obj["vin"]+"</b> </br>");
            $("body").append("FOTO <img src='/CarPictures/"+obj["fotografia"]+"'/> </br>");

    });

    request.fail(function (response) { 
         console.log(response);
    });

}