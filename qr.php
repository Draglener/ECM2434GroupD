<?php
session_start();
?>
<!DOCTYPE html>
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
  }
}
$sql = "SELECT * from user WHERE userID = ".$_SESSION['studentID'];
$result =  $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()){
    $currentPoints = $row['points'];
  }
}

$sql = "SELECT * from building WHERE buildingID > 0";
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

$sql = "SELECT * from user WHERE userID = ".$_SESSION['studentID'];
$result =  $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()){
    $currentQuizDone = $row['quizDone'];
  }
}

?>

<!-- Author: Piranavie Thangasuthan and Katie Jones and Keith Harrison
Last updated: 05/03 14:22
Added 
-->

<html>
  <head>
   <script type="text/javascript" src="https://raw.githack.com/jbialobr/JsQRScanner/master/war/js/jsqrscanner.nocache.js"></script>
   <meta charset="UTF-8">
   <title>QR Scanner</title>
   <link href="style_sheet.css" rel="stylesheet" type="text/css">
   <link rel="shortcut icon" type="image/png" href="findExeterLogo.png"/>


  <script type="text/javascript">
  var loc = <?php echo $location; ?>;
      var buildings = {}
    // pass PHP array to JavaScript array
    var prep = <?php echo json_encode($buildings); ?>;
    var n = <?php echo $n; ?>;
    var len = 0;
    for (i = 0; i < n; i++) {
    buildings[i] = {id: prep[i][0], name: prep[i][1], info:prep[i][2],  lat:prep[i][3], lng:prep[i][4]};
    len++;	  
    }
	var currentquizDone = <?php echo $currentQuizDone; ?>;


    function onQRCodeScanned(scannedText)
    {
		if(loc == scannedText){
		if(scannedText == n){
		   window.location.href = "scoreboard.php"}
		   
		else{
		
		window.location.href = "quizUpdate.php?from = ".$currentquizDone"}
			

		
	}	
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
