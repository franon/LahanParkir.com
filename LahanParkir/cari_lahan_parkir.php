<?php
session_start();
 ?>
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
      <!-- <img src="source/img/dummymaps.png" alt="" class="img-fluid"> -->
      <!-- maps start -->
      <div id="map" class="googleMaps"></div>
        <div id="infowindow-content" class="infowindow">
          <!-- <img src="http://localhost/LahanParkir/source/img/dumb.jpg" width="16" height="16" id="place-icon"> --> <!-- Buat Loading -->
          <span id="place-name"  class="title"></span><br>
          <span id="place-address"></span>
        </div>
      <div id="suggesstion-box">
        <!-- Abis Di klik taro eventnya di die -->
      </div>
      <!-- maps end -->
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

    <script>
    function initMap(){
      var map = new google.maps.Map(document.getElementById('map'), {
        center:{lat:-33.863276, lng:151.207977},
        zoom: 15
      });
      var input = /** @type {!HTMLInputElement}*/(document.getElementById('cari'));
      //map.controls[google.maps.ControlPosition.TOP].push(input);
      var autocomplete = new google.maps.places.Autocomplete(input);

      autocomplete.bindTo('bound',map);

      var infowindow = new google.maps.InfoWindow();
      var infowindowContent = document.getElementById('infowindow-content');
      infowindow.setContent(infowindowContent);
      var marker = new google.maps.Marker({
        map: map,
        achorPoint : new google.maps.Point(0,0)
      });

      autocomplete.addListener('place_changed', function(){
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if(!place.geometry){
          window.alert("No details available for input:" + place.name +"'");
          return;
        }

        if(place.geometry.viewport){
          map.fitBounds(place.geometry.viewport);
        }else{
          map.setCenter(place.geometry.location);
          map.setZoom(17);
        }
        marker.setIcon(/** @type {google.maps.Icon} */({
          url:place.icon,
          size : new google.maps.Size(71,71),
          original : new google.maps.Point(0,0),
          anchor : new google.maps.Point(17,34),
          scaledSize : new google.maps.Size(35,35)
        }));
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        var address = '';
        if(place.address_components){
          address = [
            (place.address_components[0] && place.address_components[0].short_name || ''),
            (place.address_components[1] && place.address_components[1].short_name || ''),
            (place.address_components[2] && place.address_components[2].short_name || '')
          ].join(' ');
        }
        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map,marker);
      });
    }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3nhQxbGF24x9PR6WMSoyv1dqNmMFYIq4&libraries=places&callback=initMap" asyn defer></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  </body>
</html>
