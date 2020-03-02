<?php
  session_start();
  ?>
  <!-- Author: Katie Jones and Piranavie Thangasuthan & Anneliese Travis
Last updated: 25/02 15:54
different images and sessions implemented
-->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Student Login</title>
    <link href="style_sheet.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" type="image/png" href="findExeterLogo.png"/>
  </head>

  <body class="body" id="body">

     <div class="image">
        <img src="findExeterLogo.png" alt="topImage" class="topImage">
      </div>

    <form name="loginForm" action="login.php" method="post">
      <div class="userLogin">
        <p class="error"><?php echo $_SESSION['apperror']; ?></p>
        <label id = "uniUserName" for="username"><b>University Username:</b></label>
        <input type="text" placeholder="Enter your university username" name="username" required id="usernameInput">
          <p></p>

        <label id="tutorName" for="tutor"><b>Tutor:</b></label>
        <select name="tutor" required id="tutorList">
         <?php
            //function to populate drop-down menu from distinct tutorvalues in database
            function dropdownOptions() {
              require('connection.php');
              $sql = "SELECT * FROM tutorGroup WHERE tutorID > 0";
              $result = $conn->query($sql);
              while($row = $result->fetch_assoc()){
                echo "<option value='".$row['tutorID']."'>".$row['fName']." ".$row['lName']."</option>";
              }
            }
            dropdownOptions();
            ?>
        </select>
        <p></p>
        	<input type="checkbox" required name="checkbox" value="check" id="agree" /> I have read and agree to the <a href="terms.php">Terms and Conditions and Privacy Policy</a>
	<p></p>
        <button type="submit" name="submit" id="loginButton">Join</button>
      </div>
      </form>

      <div class="image">
        <img src="exeterLogo.png" alt="bottomImage" class="bottomImage">
      </div>

  </body>
  <?php unset($_SESSION['apperror']); ?>
</html>
