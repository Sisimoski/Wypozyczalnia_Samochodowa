$(document).ready(function(){
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

