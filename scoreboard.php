

<?php
session_start();
?>
<!DOCTYPE html>
<!-- Authors: Katie Jones, Anneliese Travis, Jasmine West and Keith Harrison
Last updated: 01/03 16:35
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
    $currentPoints = $row['points'];
  }
}
?>

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
	<a class= "title">Scoreboard</a>
		<div class="container" id="ScoreBoardDisplay">
		    
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
		<p class="score"><?php echo $_SESSION['username']; ?>'s current score: <span id="points"><span> Points </p>
		<p></p>
		<p id = resetCycle class ="score">Change Cycle/Route</p>
 <script>
	 //Allows users to change their cycle
var currentPoi = <?php echo $currentPoints; ?>;
document.getElementById('points').innerHTML = currentPoi;
var resetCycle = document.getElementById("resetCycle");
resetCycle.onclick = function(){
    location.replace("resetCycle.php");
}
</script>
	</body>
</html>

