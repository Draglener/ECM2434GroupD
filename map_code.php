<!-- Author: Steven Reynolds & Keith Harrison & Anneliese Travis
Last updated: 25/02 15:12
Added changes from html to php pages
-->

<?php
session_start();
require('connection.php');
$sql = "SELECT * from user WHERE userID = ".$_SESSION['studentID'];
$result =  $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()){
	  $location = $row['location'];
	$cycleID = $row['currentCycle'];
	      $currentPoints = $row['points'];
  }
}


$sql = "SELECT buildingCycle.*, building.* FROM buildingCycle, building WHERE building.buildingID=buildingCycle.buildingID AND buildingCycle.cycleID = ".$cycleID." AND buildingCycle.position!=0";
$result = $conn->query($sql);
if ($result->num_rows > 0){
	$cycleBuildings = array();
	$n2= 0;
	while($row = $result->fetch_assoc()){
		 $info = $row['info'];	
		$id = $row["buildingID"]; //the id of the building
		$name =$row["name"]; //the name of the building
    		$latitude = floatval($row['latitude']);
    		$longitude = floatval($row['longitude']);
	    	$cycleBuildings[$n2] = array($id, $name, $info, $latitude, $longitude);


    		$n2++;
		
	}
}else{
echo"<p>No Buildings in cycle</p>"; 
}

?>

<html>
  <head>

    <meta charset="UTF-8">
		<title>Map</title>
    <link href="style_sheet.css" rel="stylesheet" type="text/css">
	  <link rel="shortcut icon" type="image/png" href="images/findExeterLogo.png"/>
    
  </head>
 
  <script>

    var cycleID = <?php echo $cycleID; ?>;
    var loc = <?php echo $location; ?>;

  var cycleBuildings = {}
    var prep = <?php echo json_encode($cycleBuildings); ?>;
    var n2 = <?php echo $n2; ?>;
    var len = 0;
    for (i = 0; i < n2; i++) {
    cycleBuildings[i] = {id: prep[i][0], name: prep[i][1], info:prep[i][2],  lat:prep[i][3], lng:prep[i][4]};
    len++;
	  console.log(cycleBuildings[i]);
}
    </script>
		   <?php
  include('header.php');
  ?>
  <body class="body" id="body">
  

    <!--The div element for the map -->

    <div id="fullMapDisplay" class="container"></div>
	<p class="score"><?php echo $_SESSION['username']; ?>'s current score: <span id="points"><span> Points </p>
    <script>
    
    /**
     * Initialize and add the map along with its style
     */
    function initMap() {

      var center = { lat: 50.735801, lng:  -3.533297};
      var innovation = { lat: 50.738045, lng:  -3.530514};

      // The map, centered at the Library
      var map = new google.maps.Map(
          document.getElementById('fullMapDisplay'), {zoom: 16.5,
        center: center,
        mapTypeId: 'hybrid'
        });
    
      var customStyled = [{
        featureType: "all",
        elementType: "labels",
        stylers: [
          { visibility: "off" }
        ]
      }];
      map.set('styles',customStyled);

      // Adds markers up to the next place the user has to visit
      
      for(var i = 0;i<loc;i++){
        var location = {lat: cycleBuildings[i].lat,lng: cycleBuildings[i].lng};
        var name = cycleBuildings[i].name;
        var info = cycleBuildings[i].info;
        addMarker(location,map,name,info);
        console.log(cycleBuildings[i].name);
      console.log("location");
      }
      
    }
    /**
      * Adds a marker to the map.
      *
      * @param location		The location of the marker
      * @param map		The map to add the marker to
      * @param label		The name of the marker
      * @param information	The information about the marker
      */
    function addMarker(location,map,label,information){
      var contentString = '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h1 id="firstHeading" class="firstHeading">'+label+'</h1>'+
        '<div id="bodyContent">'+
        '<p>'+information+'</p>'+
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
    <!--
    * Loads the API from the specified URL and product key
    -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCav_BvOFlJ0fMtElRHjkI3xAFPLbe6IY4&callback=initMap">
    </script>

		  
	  <script>
var currentPoi = <?php echo $currentPoints; ?>;
document.getElementById('points').innerHTML = currentPoi;
</script>
  </body>
</html>

