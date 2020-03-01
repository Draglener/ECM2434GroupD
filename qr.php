<?php
session_start();
require('connection.php');
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
<!doctype html>
<html>
  <head>
   <script type="text/javascript" src="https://raw.githack.com/jbialobr/JsQRScanner/master/war/js/jsqrscanner.nocache.js"></script>
   <meta charset="UTF-8">
   <title>The QRScannerPage</title>
   <link href="style_sheet.css" rel="stylesheet" type="text/css">


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

  <body class="body" id="body">
    <div>
  	  <a href="faq.php"><input type="button" id="homeButton" value="FAQ"></a>
  	  <input type="text" id="pointsDisplayTag" size="30" maxlength="20" disabled>
    </div>

    <div class="mapDisplay" id="mapDisplay">
    </div>

    <div class="QRScanner" id="QRScanner">
    <a href="map_code.php"><input type="button" id="closeButton" value="&#10006;"></a>
      <a id= "QRScannerTitle"></a>
    </div>

    <div style="margin:10px;">
		  	<div id="button"><a href="Scoreboard.php"><input type="button" id="ScoreBoardButton" value="&#8682; ScoreBoard"></a></div>
	<a data-ga-click="Footer, go to terms, text:terms" href="https://https://www.secondchancelarp.co.uk/ECM2434GroupD-master/ECM2434GroupD-master/terms.php">Terms</a>
	
	  </div>
	  <script>
	    var currentPoi = <?php echo $currentPoints; ?>;
		document.getElementById('pointsDisplayTag').value = currentPoi;
	  </script>
  </body>
</html>
<?php 
	unset($_SESSION['apperror']);
    unset($_SESSION['error']);
	?>
