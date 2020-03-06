<?php
  session_start();
  ?>
  <!-- Author: Keith Harrison
Last updated: 06/02 15:54
Created pick cycle page
-->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Pick Cycle Page</title>
    <link href="style_sheet.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" type="image/png" href="findExeterLogo.png"/>
  </head>

  <body class="body" id="body">


        <img src="findExeterLogo.png" alt="topImage" class="topImage">

 <form  name="loginForm" action="cycleUpdate.php" method="post">
        <p class="error"><?php echo $_SESSION['apperror']; ?></p>

        <label id="cycleName" for="cycle"><b>Select Cycle:</b></label>
        <select name="cycle" required id="cycleList">
         <?php
            //function to populate drop-down menu from distinct tutorvalues in database
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




        <img src="exeterLogo.png" alt="bottomImage" class="bottomImage">

  </body>
  <?php unset($_SESSION['apperror']); ?>
</html>
