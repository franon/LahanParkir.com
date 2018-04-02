//scroll detect
var iScrollPos = 0;

$(window).scroll(function () {
    var iCurScrollPos = $(this).scrollTop();
    var c = $(".nav-menu").css("z-index");
    if(iCurScrollPos > 109) {
      $(".profile-settings-logout, .lahan-saya").css("background-color", "rgba(0, 0, 0, 0.9)");
      $(".nav").css("background-color","rgba(0, 0, 0, 0.9)");
      if(c == 1) {
        $(".nav-menu").css("background-color","transparent");
      } else {
        $(".nav-menu").css("background-color","rgba(0, 0, 0, 1)");
      }
    } else {
      $(".profile-settings-logout, .lahan-saya").css("background-color", "rgba(72, 203, 203, 0.66)");
      $(".nav").css("background-color","rgb(109, 214, 208)");
      if(c == 1) {
        $(".nav-menu").css("background-color","transparent");
      } else {
        $(".nav-menu").css("background-color","rgb(109, 214, 208)");
      }
    }
    // if (iCurScrollPos > iScrollPos) {
    //     //Scrolling Down
    // } else {
    //    //Scrolling Up
    // }
    // iScrollPos = iCurScrollPos;
});

// logo onclick
$(document).on('click', '#dp-di-klik', function (event) {
  $(".profile-settings-logout").fadeToggle();
});
$(document).on('click', '#klik-lahan-saya', function (event) {
  $(".lahan-saya").fadeToggle();
});
// smooth anchor clicked
$(document).on('click', 'a[href^="#"]', function (event) {
    event.preventDefault();
    $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top
    }, 1000);
});
