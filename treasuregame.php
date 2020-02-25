<?php
session_start();
require('connection.php');
$_SESSION['studentID'] = 2;
$sql = "SELECT * from user WHERE userID = ".$_SESSION['studentID'];
$result =  $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()){
	  $location = $row['location'];
  }
}
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
<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0, width=device-width" />
<title>Treasure Hunt Game</title>

<!-- IMPORTED SCRIPTS --->

<script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script src="masonry.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script src="https://raw.githack.com/jbialobr/JsQRScanner/master/war/js/jsqrscanner.nocache.js"></script>
<script type="text/javascript">
  function onQRCodeScanned(scannedText)
  {
      alert(scannedText);
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
function hide(JsQRScanner)
{
  var x = document.getElementById("QRScanner");
  if (x.style.display === "none")
  {
    x.style.display = "block";
  } else
  {
    x.style.display = "none";
  }
}


</script>
<script>
  var loc = <?php echo $location; ?>;
console.log(loc);
  var buildings = {}
  // pass PHP array to JavaScript array
  var prep = <?php echo json_encode($buildings); ?>;
  var n = <?php echo $n; ?>;
  var len = 0;
  for (i = 0; i < n; i++) {
  buildings[i] = {id: prep[i][0], name: prep[i][1], info:prep[i][2],  lat:prep[i][3], lng:prep[i][4]};
  len++;
  console.log(buildings[i]);
}

  //To access the name of (e.g) the second building in the cycle, use buildings[2].name
  </script>

<style type="text/css">

   /* Set the size of the div element that contains the map */
  #map {
    height: 60%;  /* The height is 400 pixels */
    width: 100%;  /* The width is the width of the web page */
   }

body {
    background:#98EAFA;
    color: black;
    font-family: helvetica, arial;
    font-size: 11px;
    margin: 0;
    padding: 0;
}

a {
    color: black;
    text-decoration: none;
    -webkit-transition: all .3s;
    -moz-transition: all .3s;
    -o-transition: all .3s;
    -ms-transition: all .3s;
    transition: all .3s;
}

a:hover{
    color: white;
    -webkit-transition: all .3s;
    -moz-transition: all .3s;
    -o-transition: all .3s;
    -ms-transition: all .3s;
    transition: all .3s;
}

p{
    margin-bottom:10px;
}

ul{
    list-style-type:square;
}

ol{
    list-style-type:;
}

#maincon{
    width:80%;
    margin-left:auto;
    margin-right:auto;
}

.tabcontent {
    position:static;
    margin-left:auto;
    margin-right:auto;
    width: 80%;
    text-align:center;
    margin-bottom:200px;
}

#mapcontainer {
    position:static;
    margin-left:auto;
    margin-right:auto;
    width: 80%;
    overflow:hidden;
    text-align:center;
    margin-bottom:150px;
}


/*-- HEADER --*/

#topbar{
    position:static;
    margin-top:20px;
    margin-bottom:20px;
    text-align:center;
}

#pointsDisplayTag {
    margin-botton: 10px;
    text-transform: uppercase;
    font-size: 14px;
    padding: 5px;
    border: thin solid #000000;
    background: white;
    text-align: center;
    border-radius: 50px;
}

#navbar{
    display:inline-block;
    text-align:center;
}

/*-- TABS --*/

.tabs {
    width:100%;
    margin-left:0px;
    display:inline-block;
}

    .tab-links:after {
        display:block;
        clear:both;
        content:'';
    }

    .tab-links li {
        margin-right:5px;
        display:inline-block;
        list-style:none;
        text-transform:uppercase;
    }

        .tab-links a {
            padding:7px;
            display:inline-block;
            color:black;
            transition:all linear 0.15s;
            border-bottom:1px solid transparent;
        }

        .tab-links a:hover {
            background: white;
            text-decoration:none;
        }

    li.active a, li.active a:hover {
        background:transparent;
        color:white;
        background:#0700FF;
        -webkit-transition: all .3s;
        -moz-transition: all .3s;
        -o-transition: all .3s;
        -ms-transition: all .3s;
        transition: all .3s;
    }

    .tab-content {
    }

        .tab {
            display:none;
        }

        .tab.active {
            display:block;
        }

</style>
</head>
<body>


<div id="maincon">


<!--TOPBAR-->

<div id="topbar">

    <div id="pointsDisplayTag">&#9733; xxxx Points</div>

    <div id="navbar">
        <div class="tabs">
            <ul class="tab-links">
                <li class="active" style="margin-left:-30px">
                <a href="#maptab">Map</a></li>
                <li><a href="#qrtab">QR Scanner</a></li>
                <li><a href="#quiztab">Quiz</a></li>
                <li><a href="#scoretab">Scoreboard</a></li>
                <li><a href="#faqtab">Information</a></li>
            </ul>
        </div>
    </div>

</div>


<!-- --------------------------- TABS -------------------------- -->


<div class="tabs">


<!-- --------------------------- MAP -------------------------- -->

<div class="tab-content">
<div id="maptab" class="tab active">

<div id="mapcontainer">
  <div id="mapcontainer"></div>
  <script>
  //Initialize and add the map
  function initMap() {

    var center = { lat: 50.735801, lng:  -3.533297};
    var innovation = { lat: 50.738045, lng:  -3.530514};

    // The map, centered at the Library
    var map = new google.maps.Map(
        document.getElementById('mapcontainer'), {zoom: 16.5,
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

    for(var i = 0;i<loc;i++){
      var location = {lat: buildings[i].lat,lng: buildings[i].lng};
      var name = buildings[i].name;
      var info = buildings[i].info;
      addMarker(location,map,name,info);
      console.log(buildings[i].name);
    console.log("location");
    }

    const x = document.getElementById('testButton');
    var cname = "center"
    var cinfo = "uwu"
  //  x.onclick = addMarker(center,map,cname,cinfo);
  //  x.onclick = function(){var marker = new google.maps.Marker({position: center,map: map,title: 'center'});};
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
  </script>
  <!--Load the API from the specified URL
  * The async attribute allows the browser to render the page while the API loads
  * The key parameter will contain your own API key (which is not needed for this tutorial)
  * The callback parameter executes the initMap() function
  -->
  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCav_BvOFlJ0fMtElRHjkI3xAFPLbe6IY4&callback=initMap">
  </script>
</div>

</div>

<!-- -------------------------- QR SCANNER -------------------------- -->

<div id="qrtab" class="tab">
    <div class="tabcontent">
      <div class="QRScanner" id="QRScanner">
    </div>
</div>


<!-- -------------------------- QUIZ -------------------------- -->

<div id="quiztab" class="tab">
    <div class="tabcontent">
        <p>quiz</p>
    </div>
</div>


<!-- -------------------------- SCOREBOARD -------------------------- -->

<div id="scoretab" class="tab">
    <div class="tabcontent">
        <p>scoreboard</p>
    </div>
</div>


<!-- -------------------------- INFORMATION -------------------------- -->

<div id="faqtab" class="tab">
    <div class="tabcontent">
        <p>faq stuff</p>
    </div>
</div>


<!-- END OF TABS -->

</div>
</div>
</div>


<!-- TABS/ALL-INN-ONE SCRIPTS DO NOT REMOVE!!! -->

<script>
$(document).ready(function() {
    $('.tabs .tab-links a').on('click', function(e)  {
        var currentAttrValue = $(this).attr('href');

        // Show/Hide Tabs
        $('.tabs ' + currentAttrValue).fadeIn(600).siblings().hide();

        // Change/remove current tab to active
        $(this).parent('li').addClass('active').siblings().removeClass('active');

        e.preventDefault();
    });
});
</script>

<script>
$(document).ready(function() {
  $('#filterOptions li a').click(function() {
    // fetch the class of the clicked item
    var ourClass = $(this).attr('class');

    // reset the active class on all the buttons
    $('#filterOptions li').removeClass('active');
    // update the active state on our clicked button
    $(this).parent().addClass('active');

    if(ourClass == 'all') {
      // show all our items
      $('#ourHolder').children('div.item').show();
    }
    else {
      // hide all elements that don't share ourClass
      $('#ourHolder').children('div:not(.' + ourClass + ')').hide();
      // show all elements that do share ourClass
      $('#ourHolder').children('div.' + ourClass).show();
    }
    return false;
  });
});
</script>




</body>
</html>
