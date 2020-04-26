$(document).ready(function(){

});


function loadCar(data){
    $("#fotografia").attr("src","/CarPictures/"+data[0]['fotografia']);
    $(".producent-model").html(data[0]['producent']+' '+data[0]['model']);
    $(".koszt-dzienny").html(data[0]['sredni_koszt_wynajmu']+'zł/dzień');
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
    $(".sredni-koszt").html('Średni koszt wynajmu: '+data[0]['sredni_koszt_wynajmu']+'zł/dzień');
    $(".rezerwacja").attr("value",data[0]['id_specyfikacja_samochodu']);
}