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
?>
<!-- Author: Piranavie Thangasuthan and Katie Jones and Keith Harrison
Last updated: 25/02 14:22
Added in links to php and database to ensure 
only the correct qr can be scanned after quiz question
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
  	  <a href="faq.html"><input type="button" id="homeButton" value="FAQ"></a>
  	  <input type="text" id="pointsDisplayTag" value="&#9733; xxxx points" size="30" maxlength="20">
    </div>

    <div class="mapDisplay" id="mapDisplay">
    </div>

    <div class="QRScanner" id="QRScanner">
    <a href="map.html"><input type="button" id="closeButton" value="&#10006;"></a>
      <a id= "QRScannerTitle"></a>
    </div>

    <div style="margin:10px;">
		  	<div id="button"><a href="Scoreboard.html"><input type="button" id="ScoreBoardButton" value="&#8682; ScoreBoard"></a></div>
		    <div id="button"><a href="qr.html"><img type="button" src="qrButton.jpg" alt="QRButton" class="QRButton"></a></div>
		</div>
  </body>
</html>
