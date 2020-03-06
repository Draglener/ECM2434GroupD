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
?>
<!-- Author: Piranavie Thangasuthan and Katie Jones and Keith Harrison
Last updated: 25/02 14:22
Added in links to php and database to ensure 
only the correct qr can be scanned after quiz question
html to php links instead
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
    function onQRCodeScanned(scannedText)
    {
		if(loc == scannedText){

		window.location.href = "quiz.php"
		
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
    <div class="top_buttons">
		  <a href="FAQ.php"><input type="button" id="homeButton" value="FAQ"></a>
		  <input type="text" id="pointsDisplayTag" size="30" maxlength="20" disabled>
		  <button id = "helpButton">HELP</button>
    </div>
    <div  class="container" id="QRScanner">
 
      <a id= "QRScannerTitle"></a>
    </div>

		  	<a href="scoreboard.php"><input type="button" id="ScoreBoardButton" value="&#8682; Scoreboard"></a>
	  <script>
var currentPoi = <?php echo $currentPoints; ?>;
document.getElementById('pointsDisplayTag').value = currentPoi;
</script>
  </body>
</html>
