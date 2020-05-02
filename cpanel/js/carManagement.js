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
            console.log(response);
            $("#LoadCarTable tr").remove();
            zaladujSamochody();
            $('#editCarModal').modal('hide');
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
                if (obj[i][2] == 3) {
                    obj[i][2] = "Niezatwierdzony";

                } else if (obj[i][2] == 2) {
                    obj[i][2] = "Wypożyczony";
                } else {
                    obj[i][2] = "Niewypożyczony";
                }
                $("#LoadCarTable").append(" <tr><th scope='row'>" + (i + 1) + "</th><td>" + obj[i][0] + "</td><td>" + obj[i][1] + "</td><td>" + obj[i][2] + "</td><td><div class='d-flex justify-content-between'><button type='button' class='editCarButtonValue btn btn-sm btn-outline-primary flex-fill' value='" + obj[i]["vin"] + "' data-toggle='modal' data-target='#editCarModal' onclick='editCarButtonClick(this) '>Edytuj</button><button type='button' class='deleteCarButtonValue btn btn-sm btn-danger ml-2 flex-fill' value='" + obj[i]["vin"] + "' data-toggle='modal' data-target='#deleteCarModal' onclick='deleteCarButtonClick(this) '>Usuń</button></div></td></tr>");
            }
        }


    });

    request.fail(function (response) {
        console.log("Error" + response);

    });
}