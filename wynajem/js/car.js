$(document).ready(function(){
    

    $('#picker').datetimepicker({
        timepicker: false,
        format:'Y/m/d',
        startDate:'0',
        minDate:'0',
        onSelectDate:function(ct,$i){
            
            $('#picker2').datetimepicker('setOptions', {mindate: $('#picker').val()?$("#picker").val():false});
            if($('#picker').val() > $('#picker2').val())
                $('#picker2').datetimepicker('setOptions', {value: $('#picker').val()?$("#picker").val():false});
            calculate();
          },
        value: new Date()
    });

    $('#picker2').datetimepicker({
        timepicker: false,
        format:'Y/m/d',
        startDate:'+1970/01/02',
        onShow:function( ct ){
            this.setOptions({
            minDate:$('#picker').val()?$("#picker").val():false
             
            })
           },
           onSelectDate:function(ct,$i){
            calculate();
           },
        value: new Date()   
    });

    $('.rezerwacja').click(function(){
        
        document.getElementsByName('DataOd')[0].placeholder = $('#picker').val();
        document.getElementsByName('DataDo')[0].placeholder = $('#picker2').val();
        $(".modalDataOd").html("Data od: "+$('#picker').val());
        $(".modalDataDo").html("Data do: "+$('#picker2').val());
        $(".modalCena").html("Cena: "+$(".total-cost").html());
        $('.rentCarButton').attr("value", data[0]['vin']);
    });

    $('.rentCarButton').click(function(){
        $(".alert").removeClass("alert-success");
        $(".alert").removeClass("alert-danger");
        $(".alert").removeClass("alert-warning");
        $(".alert").html('');
        $(".alert").fadeIn(); 

        request = $.ajax({
            url: "php/rentCar.php",
            data: {vin : data[0]['vin'], dataOd : $('#picker').val(), dataDo : $('#picker2').val(), kwota : kwota},
            type: "POST"
        });

        request.done(function (response) {
            if(response == "Success"){
                $('#rezerwacjaModal').modal('hide');
                $('.alert').addClass("alert-success");
                $('.alert').html("Pojazd Został Wypożyczony");
                $('.alert').fadeOut(1500);
                $(".rezerwacja").addClass("disabled btn-danger");
                $(".rezerwacja").removeClass("btn-success");
                $(".rezerwacja").html("Aktualnie Niedostępny")
            }
            else{
                $('#rezerwacjaModal').modal('hide');
                $('.alert').addClass("alert-warning");
                $('.alert').html(response);
                $('.alert').fadeOut(1500);
            }
        });

        request.fail(function (response) {
            console.log(response);
        });

    })

    $("#useSaleCodeBtn").click(function(){
        $('.sale-response').removeClass("text-muted");
        $('.sale-response').removeClass("text-danger");
        $('.sale-response').removeClass("text-success");



        dane = $("#kodRabatowyForm").serialize();
        request = $.ajax({
            url: "php/useSaleCode.php",
            data: dane,
            type: "POST"
        });

        request.done(function (response) {
            if(response.match("Success")){
                procent = response.match(/\d+/);
                $('.sale-response').removeClass("text-muted");
                $('.sale-response').addClass("text-success");
                $('.sale-response').html("Kod Rabatowy -"+procent+"% został dodany")
                $("#kodRabatowy").attr("disabled", true);
                $("#useSaleCodeBtn").attr("disabled", true);
                kwota = ((kwota) * (100-procent)) / 100;
                kwota = parseFloat(kwota);
                kwota = (isNaN(kwota)) ? '' : kwota.toFixed(2);
                $(".total-cost").html(kwota + "zł");
                
            }
            else{
                $('.sale-response').removeClass("text-muted");
                $('.sale-response').addClass("text-danger");
                $('.sale-response').html(response);
            }
        });

        request.fail(function (response) {
            console.log(response);
        });


    })
    
    calculate();
});


function loadCar(data){
    console.log(data);
    $("#fotografia").attr("src","/CarPictures/"+data[0]['fotografia']);
    $(".producent-model").html(data[0]['producent']+' '+data[0]['model']);
    $(".wlasciciel").html("Właściciel: "+data[0]['login']);
    $(".koszt-dzienny").html(data[0]['cena_brutto']+'zł/dzień');
    $(".segment-auta").html('Segment: '+data[0]['segment']);
    $(".rok-auta").html('Rok produkcji: '+data[0]['rok']);
    $(".typ-silnika").html('Typ silnika: '+data[0]['typ_silnika']);
    $(".moc-auta").html('Moc: '+data[0]['moc']+' KM');
    $(".pojemnosc-auta").html('Pojemność silnika: '+data[0]['pojemnosc_silnika']+' L');
    $(".srednie-spalanie").html('Średnie spalanie: '+data[0]['srednie_spalenie']+ 'l/100km');
    $(".skrzynia-biegow").html('Skrzynia biegów: '+data[0]['skrzynia_biegow']);
    $(".ilosc-miejsc").html('Ilość miejsc: '+data[0]['ilosc_miejsc']);
    $(".pojemnosc-bagaznika").html('Pojemność bagażnika: '+data[0]['pojemnosc_bagaznika']);
    $(".zasieg-auta").html('Zasięg na pełnym baku: '+data[0]['zasieg']);
    $(".sredni-koszt").html('Średni koszt wynajmu: '+data[0]['cena_brutto']+'zł/dzień');
    $(".ulica").attr("placeholder","ul. "+data[0]["ulica"]);
    if(data[0]['czy_posiadany'] == 1)
        $(".rezerwacja").attr("value",data[0]['id_specyfikacja_samochodu']);
    else{
        $(".rezerwacja").addClass("disabled btn-danger");
        $(".rezerwacja").removeClass("btn-success");
        $(".rezerwacja").html("Aktualnie Niedostępny")
    }
}

function saveData(data){
    return data;
}

function calculate(){
    const dzien = 1000 * 60 * 60 * 24;
   var date =  (new Date($('#picker2').val()) - new Date($('#picker').val()))/dzien
   kwota = kwota * (date+1);
   $(".total-cost").html(kwota.toFixed(2) + ' zł');
   $(".total-cost").html($(".total-cost").html() );
}
