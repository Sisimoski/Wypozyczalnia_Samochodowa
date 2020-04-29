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
            data: {vin : data[0]['vin'], dataOd : $('#picker').val(), dataDo : $('#picker2').val()},
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
                $('.alert').html("Pojazd wypożyczony");
                $('.alert').fadeOut(1500);
            }
        });

        request.fail(function (response) {
            console.log(response);
        });

    })
    
    calculate();
});


function loadCar(data){
    $("#fotografia").attr("src","/CarPictures/"+data[0]['fotografia']);
    $(".producent-model").html(data[0]['producent']+' '+data[0]['model']);
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
   $(".total-cost").html(data[0]['cena_brutto'] * (date+1) + ' zł');
   $(".total-cost").html($(".total-cost").html() );
}