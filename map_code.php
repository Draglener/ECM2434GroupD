<?php
session_start();
require('connection.php');

$sql = "SELECT * from building";
$result =  $conn->query($sql);
if ($result->num_rows > 0) {
  $buildings = array();
  $n = 0;
  while ($row = $result->fetch_assoc()){
    $id = $row['buildingID'];
    $name = $row['name'];
    $info = $row['info'];
    $latitude = floatval($row['latitude']);
    $longitude = floatval($row['longitude']);
    $buildings[$n] = array($id, $name, $info, $latitude, $longitude);
    $n++;
  }

} else {
  echo $sql." ".$conn->error;
}

?>
<!-- Author: Steven Reynolds & Keith Harrison
Last updated: 12/02 14:00
-->
<html>
  <head>
    <style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 60%;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>
  </head>
  <script>
    var buildings = {}
    // pass PHP array to JavaScript array
    var prep = <?php echo json_encode($buildings); ?>;
    var n = <?php echo $n; ?>;
    for (i = 0; i < n; i++) {
    buildings[i] = {id: prep[i][0], name: prep[i][1], info:prep[i][2],  lat:prep[i][3], lng:prep[i][4]};
	console.log(buildings[i]);
  }
    
    //To access the name of (e.g) the second building in the cycle, use buildings[2].name
    </script>
  <body>
    <h3>Map for Game</h3>
    <!--The div element for the map -->
    <div id="map"></div>
    <button id = "testButton">Add marker</button>
    <script>
//Initialize and add the map
function initMap() {

 
  var library = { lat: 50.735481, lng:  -3.533297};
  var harrison = { lat: 50.737668, lng:  -3.532590};
  var innovation = { lat: 50.738045, lng:  -3.530514};

  var library_name = "Library";
  var harrison_name = "Harrison";

  // The map, centered at the Library
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 16.5,
    center: library,
    mapTypeId: 'hybrid',
    gestureHandling: 'none', 
    zoomControl:true
    });
 
  var customStyled = [{
    featureType: "all",
    elementType: "labels",
    stylers: [
      { visibility: "off" }
    ]
  }];
  map.set('styles',customStyled);

  // The markers, positioned at Library
  addMarker(library,map,library_name);
  for(var i = 0;i<buildings.length;i++){
    var location = {lat: buildings[i].lat,lng: buildings[i].lng};
    addMarker(location,map,buildings[i].name);
    console.log(buildings[i].name);
	console.log(location);
  }
  
  const x = document.getElementById('testButton');
  //x.onclick = addMarker(innovation,map);
  x.onclick = function(){
    var marker = new google.maps.Marker({
        position: innovation,
        map: map,
        title: 'Innovation'});
    };
}

function addMarker(location,map,label){
  var contentString = '<div id="content">'+
    '<div id="siteNotice">'+
    '</div>'+
    '<h1 id="firstHeading" class="firstHeading">Forum Library</h1>'+
    '<div id="bodyContent">'+
    '<p>The <b>Forum Library</b> is the main library on campus, it has 3 floors and is full of nerds.</p>'+
    '</div>'+
    '</div>';

  var infowindow = new google.maps.InfoWindow({
    content: contentString
  });
  var marker = new google.maps.Marker({position: location,map: map,title: label});
  marker.addListener('click', function() {
    
    infowindow.open(map, marker);
  });

  closeInfoWindow = function() {
    infoWindow.close();
  };

  google.maps.event.addListener(map, 'click', closeInfoWindow);
}
    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCav_BvOFlJ0fMtElRHjkI3xAFPLbe6IY4&callback=initMap">
    </script>
  </body>
</html>
