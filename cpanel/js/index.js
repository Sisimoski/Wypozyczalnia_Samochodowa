$(document).ready(function(){

    $("#wyloguj").click(function() {
        localStorage.clear();
        var request;
        request = $.ajax({
            url:  "../php/logout.php",
            data: null,
            type: "POST"
        });

        request.done(function() {
            window.location.replace( "../index.php");
        });

        request.fail(function() {
                       
        });
    });

    $(".collapse").on("hidden.bs.collapse", function() {
        localStorage.setItem("coll_" + this.id, false);
      });
      
      $(".collapse").on("shown.bs.collapse", function() {
        localStorage.setItem("coll_" + this.id, true);
      });
      
      $(".collapse").each(function() {
        if (localStorage.getItem("coll_" + this.id) == "true") {
          $(this).collapse("show");
        }
      });


});