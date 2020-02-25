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
Last updated: 24/02 21:43
Version of map_code.php testing out QR scanner events and 
adding markers using them.
-->
<html>
  <head>
    <meta charset="UTF-8">
		<title>The mapPage</title>
    <link href="style_sheet.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="https://raw.githack.com/jbialobr/JsQRScanner/master/war/js/jsqrscanner.nocache.js"></script>
   
  </head>
  <script>
    var buildings = {}
    // pass PHP array to JavaScript array
    var prep = [["1","Harrison","Harrisondfkgjbldjfhb",50.737668,-3.53259],["2","Innovation Centre","kjdsfhbakjhdgblajhdfgbldjhfgb",50.738045,-3.530514],["3","Amory","laskdfhbpavbpadhvba",50.73665,-3.531667],["4","Old Library","lsdfboalfvbipedfgbvosdfhvosdf",50.733494,-3.533887],["5","Forum","kjhdbvisgdvbpaudvboa dfgoaue",50.735167,-3.533785],["6","Library","shbcoauydvboauydvbouadhvfosd",50.735481,-3.533297],["7","Devonshire House","idfhvouaysdoausdapuydfvoauf",50.735016,-3.534329],["8","Queens","asldjfbouaysdfvoszdfvoysdf",50.73427,-3.535059],["9","Newman\/Peter Chalk","kjhsdvbfouasdvbfausdfvbpu",50.736329,-3.535872]];
    var n = 9;
    var len = 0;
    for (i = 0; i < n; i++) {
    buildings[i] = {id: prep[i][0], name: prep[i][1], info:prep[i][2],  lat:prep[i][3], lng:prep[i][4]};
    len++;
	  console.log(buildings[i]);
  }
    
    //To access the name of (e.g) the second building in the cycle, use buildings[2].name
    </script>
  <body class="body" id="body">
  	 <div class="QRScanner" id="QRScanner">
    <div>
		  <a href="FAQ.html"><input type="button" id="homeButton" value="FAQ"></a>
		  <input type="text" id="pointsDisplayTag" value="&#9733; xxxx points" size="30" maxlength="20">
    </div>
    
    <!--The div element for the map -->
    <div id="fullMapDisplay"></div>

    <script>
    //Initialize and add the map
    function initMap(visited) {

      var center = { lat: 50.735801, lng:  -3.533297};
      var innovation = { lat: 50.738045, lng:  -3.530514};

      // The map, centered at the Library
      var map = new google.maps.Map(
          document.getElementById('fullMapDisplay'), {zoom: 16.5,
        center: center,
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

		
	for (var k in visited){
		    var location = {lat: buildings[k].lat,lng: buildings[k].lng};
    var name = buildings[k].name;
    var info = buildings[k].info;
    addMarker(location,map,name,info);
    console.log(buildings[k].name);
	console.log("location");
		
	}



      
 }
 

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
	
	
	var visited = [];
	    function onQRCodeScanned(scannedText)
    {
    		var i = parseInt(scannedText)-1;
			
			if(visited.indexOf(i) == -1){
			visited.push(i);
			initMap(visited);
			;}
    }

    function JsQRScannerReady()
    {
		var jbScanner = new JsQRScanner(onQRCodeScanned);
        jbScanner.setSnapImageMaxSize(300);
    	var scannerParentElement = document.getElementById("QRScanner");
    	if(scannerParentElement)
    	{
    		jbScanner.appendTo(scannerParentElement);
    	}
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

    <div style="margin:10px;">
		  	<div id="button"><a href="Scoreboard.html"><input type="button" id="ScoreBoardButton" value="&#8682; ScoreBoard"></a></div>
		    <div id="button"><a href="qr.html"><img type="button" src="qrButton.jpg" alt="QRButton" class="QRButton"></a></div>
		</div>
  </body>
</html>