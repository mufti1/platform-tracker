<?php 
  include("../session.php");
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Platform Tracker</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <link href="../asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="../asset/css/style.css" rel="stylesheet">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 90%;
        width: 100%;
        margin-left: 7px;
      }
    </style>
    <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var map;
      var infowindow;

      function initMap() {
        var pyrmont = {lat: -6.8734918, lng: 107.584485};

        map = new google.maps.Map(document.getElementById('map'), {
          center: pyrmont,
          zoom: 15
        });

        infowindow = new google.maps.InfoWindow();
        var service = new google.maps.places.PlacesService(map);
        service.nearbySearch({
          location: pyrmont,
          radius: 500,
          type: ['store']
        }, callback);
      }

      function callback(results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
          for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);
          }
        }
      }

      function createMarker(place) {
        var placeLoc = place.geometry.location;
        var marker = new google.maps.Marker({
          map: map,
          position: place.geometry.location
        });

        google.maps.event.addListener(marker, 'click', function() {
          infowindow.setContent(place.name);
          infowindow.open(map, this);
        });
      }
    </script>
  </head>
  <body>
  <div class="header">
  <img src="../asset/img/telkom.png">
  </div>
  <div id="wrapper" class="active">
<!-- Sidebar -->
  <div id="sidebar-wrapper">
  <ul id="sidebar_menu" class="sidebar-nav">
       <li class="sidebar-brand"><a id="menu-toggle" href="#"><?php echo $_SESSION['username']; ?><span id="main_icon" class="glyphicon glyphicon-align-justify"></span></a></a></li>
  </ul>
    <ul class="sidebar-nav" id="sidebar">
    <li><a href="index.php">Maps<span class="sub_icon glyphicon glyphicon-globe"></span></a></li>     
      <li><a href="gps.php">GPS<span class="sub_icon glyphicon glyphicon-map-marker"></span></a></li>
      <li><a href="user.php">User<span class="sub_icon glyphicon glyphicon-user"></span></a></li>
      <li><a href="logs.php">Logs<span class="sub_icon glyphicon glyphicon-duplicate"></span></a></li>
      <li><a href="../logout.php">Logout<span class="sub_icon glyphicon glyphicon-off"></span></a></li>
    </ul>
  </div>
    <div id="map"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbMe-cvZvwhbLhxhX59FVG5UGiSS70DLg&libraries=places&callback=initMap" async defer></script>
  </body>
  <script src="../asset/js/bootstrap.min.js"></script>
<script src="../asset/js/jquery.min.js"></script>
<script>
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("active");
});
</script>
</html>