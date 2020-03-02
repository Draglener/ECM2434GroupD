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
<!-- Authors: Katie Jones and Anneliese Travis and Jasmine West
Last updated: 01/03 16:35
Real Scoreboard showing everyones scores

-->
<!doctype html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>The ScoreBoardPage</title>
        <link href="style_sheet.css" rel="stylesheet" type="text/css">
	<style>
	table {
		text-align: center;
		width: 100%;
	}
	th, td {
		padding:10px;
	}
	.ScoreBoardDisplay {
		overflow: scroll;
	}
	</style>
	</head>

	<body class="body" id="body">
		<div>
			  <a href="FAQ.php"><input type="button" id="homeButton" value="FAQ"></a>
			   <input type="text" id="pointsDisplayTag" size="30" maxlength="20" disabled>
 
		</div>

		<div class="mapDisplay" id="mapDisplay">

		</div>

		<div class="ScoreBoardDisplay" id="ScoreBoardDisplay">
		  	<input type="button" id="closeButton" value="&#10006;">
		    <a id= "ScoreBoardTitle">ScoreBoard</a>
			     <table>
        <!-- Table headers -->
        <tr>
          <th>Username</th>
          <th>Location</th>
          <th>Score</th>
        </tr>

        <!-- PHP to fetch data, and fill table -->
        <?php
        $sql = "SELECT * from user ORDER BY points DESC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo "<tr><td>".$row["username"]."</td><td>".$row["location"]."</td><td>".$row["points"]."</td></tr>";
          }
          echo "</table>";
        }else{
          echo "<p>No users found.</p>";
        }
        $conn->close();
        ?>


		</div>

		<div style="margin:10px;">
		  	<div id="button"><a href="Scoreboard.php"><input type="button" id="ScoreBoardButton" value="&#8682; ScoreBoard"></a></div>
		   <a data-ga-click="Footer, go to terms, text:terms" href="https:/www.secondchancelarp.co.uk/ECM2434GroupD-master/ECM2434GroupD-master/terms.php">Terms</a>
			<div id="button"><a href="qr.php"><img type="button" src="qrButton.jpg" alt="QRButton" class="QRButton"></a></div>
		</div>
		 
 <script>
var currentPoi = <?php echo $currentPoints; ?>;
document.getElementById('pointsDisplayTag').value = currentPoi;
</script>	
	</body>
</html>
