AOS.init();

$(".navbar-toggler").on("click", function(){
  $(".navbar-mobile").css("width", "100vw");
  $("html").css("overflow-y", "hidden");
  $(".navbar-mobile li").addClass("navbar-active");
});

$(".navbar-close").on("click", function(){
  $(".navbar-mobile").css("width", "0");
  $("html").css("overflow-y", "initial");
  $(".navbar-mobile li").removeClass("navbar-active");
});