<?php
session_start();
require('connection.php');
$sql = "SELECT * from user WHERE userID = ".$_SESSION['studentID'];
$result =  $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()){
    $currentPoints = $row['points'];
  }
}
?>

<!-- Author: Piranavie Thangasuthan and Katie Jones and Keith Harrison
Last updated: 01/03 14:34
Adding score to page
-->
<!doctype html>
<html>
	<head>
      <meta charset="UTF-8">
    <title>The FAQPage</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  	<link href="style_sheet.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" type="image/png" href="findExeterLogo.png"/>
	</head>

	<body class="body" id="body">
		<div>
			  <a href="FAQ.php"><input type="button" id="homeButton" value="FAQ"></a>
			  <input type="text" id="pointsDisplayTag" size="30" maxlength="20" disabled>
		</div>

		<div class="informationDisplay" id="informationDisplay">
		 		
		    <a id= "informationTitle"><i class="fa fa-info-circle"></i>
            Information</a>
			<div id="informationText">
					<p><h2>Health and Wellbeing</h2></p>
					<p><b>University Information</b></p>
					<p>The <a href="https://www.exeter.ac.uk/newstudents/supportandservices/yourhealthandwelfare/
">university website</a> has details on the campus GP, disability access, mental wellbeing services, and sexual health clinics.</p>
					<p><b>Nightline</b></p>
					<p>NightLine is a student run volunteer service that offers a free phone listening service from 8pm to 8am. You can call them for any reason. Their number can be found on your student card.</p>
					<p><h2>Study Areas</h2></p>
					<p><b>Study Spaces</b></p>
					There are a number of study spaces across the university. Many buildings have an informal group study space. In addition, in the Forum there is study space in the library, the Santuary, and Devonshire House.</p>
					<p><h2>The Guild</h2></p>
					<p><b>What is the Guild?</b></p>
					<p>The Guild is the student union. They represent the interests of the students to the university, facilitate over 250 societies, and offer advice to students on a number of issues. More information on the Guild can be found on <a href="https://www.exeterguild.org/societies/">their website</a>.</p>
					<p><b>Devonshire House</b></p>
					<p>Attached to the Guild, Devonshire House contains food outlets, study spaces, and facilities for societies.</p>
					<p>There are three floors to Devonshire House. DH1 contains an informal study space with sofas, food outlets, and the offices of the Full Time Officers (who run the Guild). DH2 has more places to eat, the joint eXmedia, and Exepose office, and a bank. DH3 contains a silent study space called The Loft.</p>
					
        </div>
		</div>

        

		 <div style="margin:10px;">
		  	<div id="button"><a href="Scoreboard.php"><input type="button" id="ScoreBoardButton" value="&#8682; ScoreBoard"></a></div>
		    <a data-ga-click="Footer, go to terms, text:terms" href="https://www.secondchancelarp.co.uk/ECM2434GroupD-master/ECM2434GroupD-master/terms.php">Terms</a>
			 <div id="button"><a href="qr.php"><img type="button" src="qrButton.jpg" alt="QRButton" class="QRButton"></a></div>
		</div>
<script>
var currentPoi = <?php echo $currentPoints; ?>;
document.getElementById('pointsDisplayTag').value = currentPoi;
</script>
	</body>
<?php 
	unset($_SESSION['apperror']);
    unset($_SESSION['error']);
	?>
</html>
