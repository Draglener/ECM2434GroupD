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
    $currentPoints = $row['points'];
  }
}
?>
<!-- Authors: Katie Jones and Anneliese Travis and Jasmine West
Last updated: 01/03 16:35
Real Scoreboard showing everyones scores
-->
<html>
	<head>
	<meta charset="UTF-8">
	<title>Scoreboard</title>
        <link href="style_sheet.css" rel="stylesheet" type="text/css">
		<link rel="shortcut icon" type="image/png" href="images/findExeterLogo.png"/>
	</head>
	 <?php
  include('header.php');
  ?>
	<body>

		<div class="container" id="ScoreBoardDisplay">
		    <a class= "title">Scoreboard</a>
			     <table style="margin-top:0;">
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

 <script>
var currentPoi = <?php echo $currentPoints; ?>;
document.getElementById('pointsDisplayTag').value = currentPoi;
</script>
	</body>
</html>

