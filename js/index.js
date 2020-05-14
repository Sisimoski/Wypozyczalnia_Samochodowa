$(document).ready(function() {    

    $("#wyloguj").click(function() {
        var request;
        request = $.ajax({
            url: "./php/logout.php",
            data: null,
            type: "POST"
        });

        request.done(function() {
            window.location.replace("../index.php");
        });

        request.fail(function() {
                       
        });
    });

    $("#zaloguj").click(function() {
            window.location.replace("../logowanie.php"); /* Nie powinno być "logowanie.php"? 
            Bo jak masz w htdocs osobny folder ze stroną (np. htdocs/Car4You/), to wtedy ta linijka z ../logowanie.php wraca aż do root'a i próbuje otworzyć logowanie.php w samym htdocs, zamiast w rzeczywistym folderze ze stroną. Taka tylko uwaga, jak uważacie ~ Marcin */
    });

    $("#panelKlienta").click(function() {
        window.location.replace("../cpanel/index.php");
    });

    $("#zarejestruj").click(function() {
        window.location.replace("../register.php");
    });
    
    $('.next').click(function(e){
        e.preventDefault();
         $('.carousel').carousel('next');return false; 
    });

    $('.prev').click(function(e){
        e.preventDefault();
         $('.carousel').carousel('prev');return false; 
    });


   
    
});


function loadCarousel(){
    request = $.ajax({
        url: "php/loadCarouselCars.php"    
    });

    request.done(function(response) {
        if(response == "Brak Pojazdów w Bazie!"){
            console.log("Brak Pojazdów w Bazie");
        }
        else{
            var obj = JSON.parse(response);
            $(".carousel-inner").append(
                "<div class='carousel-item active'>"+
                    "<div class='card-deck' id='carouselOne'>");
            for(i = 0;i<6;i++){
                if(i<=2){
                    $("#carouselOne").append(
                        "<div class='card bg-light border text-center'>"+
                            "<img src='/CarPictures/"+obj[i]['fotografia']+"' class='card-img-top border-bottom rounded-sm' alt='Default'>"+
                                "<div class='card-body card-body-flex'>"+
                                    "<h5 class='card-title'>"+obj[i]['producent']+' '+obj[i]['model']+"</h5>"+
                                    "<h6 class='card-subtitle mb-2 text-muted'>"+obj[i]['cena_brutto']+"zł/dzień</h6>"+
                                    "<div class='border-bottom my-2'></div>" +
                                    "<div class='text-left'>"+
                                        "<p class='card-text'>"+
                                            "<h6><b>Klasa: "+obj[i]['segment']+" </b></h6>"+
                                            "Rok produkcji: "+obj[i]['rok']+" <br>"+
                                            "Silnik: "+obj[i]['pojemnosc_silnika']+"L "+obj[i]['moc']+"KM "+obj[i]['typ_silnika']+" <br>"+
                                            "Skrzynia biegów: "+obj[i]['skrzynia_biegow']+
                                        "</p>"+
                                    "</div>"+
                                    "<a href='wynajem/samochod.php?idCar="+obj[i]['id_specyfikacja_samochodu']+"' class='btn btn-primary'>Wypożycz</a>"+
                                "</div>"+
                        "</div>"
                        );
                }

                 if(i==3){
                    $(".carousel-inner").append(
                        "<div class='carousel-item'>"+
                            "<div class='card-deck' id='carouselTwo'>");
                 }
                 if(i>=3){
                    $("#carouselTwo").append(
                        "<div class='card bg-light border text-center'>"+
                            "<img src='/CarPictures/"+obj[i]['fotografia']+"' class='card-img-top border-bottom rounded-sm' alt='Default'>"+
                                "<div class='card-body card-body-flex'>"+
                                    "<h5 class='card-title'>"+obj[i]['producent']+' '+obj[i]['model']+"</h5>"+
                                    "<h6 class='card-subtitle mb-2 text-muted'>"+obj[i]['cena_brutto']+"zł/dzień</h6>"+
                                    "<div class='border-bottom my-2'></div>" +
                                    "<div class='text-left'>"+
                                        "<p class='card-text'>"+
                                            "<h6><b>Klasa: "+obj[i]['segment']+" </b></h6>"+
                                            "Rok produkcji: "+obj[i]['rok']+" <br>"+
                                            "Silnik: "+obj[i]['pojemnosc_silnika']+"L "+obj[i]['moc']+"KM "+obj[i]['typ_silnika']+" <br>"+
                                            "Skrzynia biegów: "+obj[i]['skrzynia_biegow']+
                                        "</p>"+
                                    "</div>"+
                                    "<a href='wynajem/samochod.php?idCar="+obj[i]['id_specyfikacja_samochodu']+"' class='btn btn-primary'>Wypożycz</a>"+
                                "</div>"+
                        "</div>"
                        );
                 }   
            }
        }
    });

    request.fail(function(response) {
        console.log(response);
    });
}



