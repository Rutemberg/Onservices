<?php
$origins = "72225-195";
$destinations = "72225-195";
$mode = 'CAR';
$language = 'PT';
$sensor = 'false';

$add = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/xml?origins=''{$origins}'|&destinations='{$destinations}'|&mode='{$mode}'|&language='{$language}'|&sensor='{$sensor}'");

$add2 = explode(',', $add);

$add3 = explode('    ', $add2[6]);

$array = array_values ( $add3 );

var_dump($array);

for($indice = 0; $indice <  count($array); $indice++){
    
$minutos = $array[2];
$distancia = $array[4];
    
}


echo $distancia;
echo $minutos;


//echo "QNN 19 Conjunto D, Brasília - DF";
//echo "QNM 1, Brasília - DF";
//echo "lat: -15.7797200, lng: -47.9297200";


?>
<!--
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Directions service</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
    </style>
  </head>
  <body>
    <div id="floating-panel">
    <b>Start: </b>
    <select id="start">
      <option value="chicago, il">Chicago</option>
      <option value="QNN 19 Conjunto D, Brasília - DF">St Louis</option>
    </select>
    <b>End: </b>
    <select id="end">
      <option value="chicago, il">Chicago</option>
      <option value="72215-010, Brasília - DF">St Louis</option>
    </select>
    </div>
    <div id="map"></div>
    <script>
      function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: {lat: -15.7797200, lng: -47.9297200}
        });
        directionsDisplay.setMap(map);

        var onChangeHandler = function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        };
        document.getElementById('start').addEventListener('change', onChangeHandler);
        document.getElementById('end').addEventListener('change', onChangeHandler);
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        directionsService.route({
          origin: document.getElementById('start').value,
          destination: document.getElementById('end').value,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
//            window.alert('Directions request failed due to ' + status);
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDL34B_xQ413FR1mGcQKFkiOZnm3i3gqsY&callback=initMap">
    </script>
  </body>
</html>-->
<!--<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Travel modes in directions</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
    </style>
  </head>
  <body>
    <div id="floating-panel">
        <input id="start" value="QNN 19 Conjunto D, Brasília - DF">
        <input id="end" value="QNM 1, Brasília - DF">
    <b>Mode of Travel: </b>
    
    
    <select id="mode">
      <option value="DRIVING">Driving</option>
      <option value="WALKING">Walking</option>
      <option value="BICYCLING">Bicycling</option>
      <option value="TRANSIT">Transit</option>
    </select>
    
    
    </div>
    <div id="map"></div>
    <script>
      function initMap() {
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: {lat: -15.7797200, lng: -47.9297200}
        });
        directionsDisplay.setMap(map);

        calculateAndDisplayRoute(directionsService, directionsDisplay);
        document.getElementById('mode').addEventListener('change', function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        });
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var selectedMode = document.getElementById('mode').value;
        directionsService.route({
          origin: document.getElementById('start').value,
          destination: document.getElementById('end').value,
          travelMode: google.maps.TravelMode[selectedMode]
        }, function(response, status) {
          if (status == 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
    </script>
    
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDL34B_xQ413FR1mGcQKFkiOZnm3i3gqsY&callback&callback=initMap">
    </script>
    
  </body>
</html>-->