<?php
session_start();

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
	  $currentCycle = $row['currentCycle'];
  }
}
?>

<!DOCTYPE html>
<!-- 
Author: Keith Harrison
Last updated: 06/02 15:54
-->
<html>
  <head>
    <meta charset="UTF-8">
	 <link rel="shortcut icon" type="image/png" href="images/findExeterLogo.png"/>
    <title>Pick Cycle Page</title>
    <link href="style_sheet.css" rel="stylesheet" type="text/css">
  </head>

  <body class="body" id="body">
	<script>
	var currentCycl = <?php echo $currentCycle;?>;
	if (currentCycl != 0){
		location.replace("quiz.php")
	}
	</script>


        <img src="images/findExeterLogo.png" alt="topImage" class="topImage">

 <form  name="loginForm" action="cycleUpdate.php?cycle" method="post">
        <p class="error"><?php echo $_SESSION['apperror']; ?></p>

        <label id="cycleName" for="cycle"><b>Select Cycle:</b></label>
        <select name="cycle" required id="cycleList">
         <?php
	    /**
 	      * Function to populate drop-down menu from distinct Cycles in database
 	      *
 	      */
            function dropdownOptions() {
              require('connection.php');
              $sql = "SELECT * FROM cycleGroup WHERE cycleID > 0";
              $result = $conn->query($sql);
              while($row = $result->fetch_assoc()){

	echo "<option value='".$row['cycleID']."'>".$row['cName']."</option>";
              }
            }
            dropdownOptions();
            ?>
        </select>
        	<button type="submit" name="submit" id="loginButton">Start Cycle</button>
      </form>

        <img src="images/exeterLogo.png" alt="bottomImage" class="bottomImage">

  </body>
  <?php unset($_SESSION['apperror']); ?>
</html>
