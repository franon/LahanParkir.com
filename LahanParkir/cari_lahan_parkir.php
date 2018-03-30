<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cari Lahan Parkir</title>
    <link rel="stylesheet" href="source/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="source/css/bootstrap.min.css.map">
    <link rel="stylesheet" href="source/css/headernav.css">
    <link rel="stylesheet" href="source/css/styleCariLahanParkir.css">
  </head>
  <body>
    <?php require_once 'source/etc/headernav.php'; ?>
    <div class="maps-container">
      <img src="source/img/dummymaps.png" alt="" class="img-fluid">
      <p class="show-hide-angle-arrow text-center">
        <span id="show-hide-angle-arrow" class="angle-up">
          <i class="fas fa-angle-up"></i>
          <i style="display:none" class="fas fa-angle-down"></i>
        </span>
      </p>
      <div class="cari-container">
        <div class="cari-container-show-hide">
          <input id="cari" class="form-control" type="text" name="cari" placeholder="Cari">
          <button class="btn btn-primary" type="button" name="button"><i class="fas fa-search"></i></button>
        </div>
      </div>
    </div>
    <div class="">
      <!-- Abis Di klik taro eventnya di die -->
    </div>
    <script src="source/js/jquery-3.3.1.min.js"></script>
    <script src="source/js/popper.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="source/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script defer src="source/js/fontawesome-all.min.js"></script>
    <script defer src="source/js/headernav.js"></script>
    <script type="text/javascript">
      $("#show-hide-angle-arrow").click(function(){
        var a = $(this).attr("class");
        if(a == "angle-up") {
          $("#show-hide-angle-arrow .fa-angle-up").css("display", "none");
          $("#show-hide-angle-arrow .fa-angle-down").fadeIn();
          $(this).attr("class", "angle-down");
          $(".cari-container-show-hide").fadeOut();
        } else if(a == "angle-down") {
          $("#show-hide-angle-arrow .fa-angle-down").css("display", "none");
            $("#show-hide-angle-arrow .fa-angle-up").fadeIn();
            $(this).attr("class", "angle-up");
            $(".cari-container-show-hide").fadeIn();
        }
      });
    </script>
  </body>
</html>
