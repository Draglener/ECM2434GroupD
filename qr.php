<?php
session_start();
?>
<!DOCTYPE html>
<!-- 
Author: Piranavie Thangasuthan and Katie Jones and Keith Harrison
Page for the QR code scanner.
Last updated: 10/03 13:30
-->
<?php
require('connection.php');
$session = $_SESSION['appuser'];
if ($_SESSION['status'] == "student"){
}else{
  header('Location: homepage.php');
}

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
   <script type="text/javascript" src="https://raw.githack.com/jbialobr/JsQRScanner/master/war/js/jsqrscanner.nocache.js"></script>
   <meta charset="UTF-8">
   <title>QR Scanner</title>
   <link href="style_sheet.css" rel="stylesheet" type="text/css">
   <link rel="shortcut icon" type="image/png" href="findExeterLogo.png"/>


  <script type="text/javascript">
    var cycleID = <?php echo $cycleID; ?>;
    var loc = <?php echo $location; ?>;


    //To access the name of (e.g) the second building in the cycle, use cycleBuildings[2].name

  var cycleBuildings = {}
    var prep = <?php echo json_encode($cycleBuildings); ?>;
    var n2 = <?php echo $n2; ?>;
    var len = 0;
    for (i = 0; i < n2; i++) {
    cycleBuildings[i] = {id: prep[i][0], name: prep[i][1], info:prep[i][2],  lat:prep[i][3], lng:prep[i][4]};
    len++;

}
var rightLocation = loc - 1;
console.log(cycleBuildings[rightLocation].id);
	
	

    /**
     * Runs code after the QR code is scanned. Specifically updates the score, location and quiz
     *
     * @param scannedText	the input from the scanned QR code.
     */
    function onQRCodeScanned(scannedText)
    {		
			if(cycleBuildings[rightLocation].id == scannedText){
				if(scannedText == cycleBuildings[n2-1].id){
				window.location.href="scoreboard.php"
				}else{
				window.location.href="quizUpdate.php"
				}
			}
    }
	  
    /**
     * Initializes the scanner and adds it to the html object scannerParentElement
     */
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

  </head>
 <?php
  include('header.php');
  ?>
  <body>
		  <a id= "QRScannerTitle"></a>
    <div class="container" id="QRScanner"></div>
	<p class="score"><?php echo $_SESSION['username']; ?>'s current score: <span id="points"><span>Points </p>
		  	
	  <script>
var currentPoi = <?php echo $currentPoints; ?>;
document.getElementById('points').innerHTML = currentPoi;
</script>
  </body>
</html>
