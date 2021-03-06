<?php
  session_start();
/*
<!-- 
Author: Jasmine West, Katie Jones and Annelise Travis
Last updated: 10/03 9:34
*/

  if ( isset($_SESSION['appuser'])){
    header('Location: tutor-main-screen.php');
    $error=null;

  } else if( isset($_SESSION['apperror'] )){
    $error = $_SESSION['apperror'] ;
    echo $error;
    session_unset();
    session_destroy();
  }
?>

<html>
  <head>
    <script src="Validate.js"></script>
    <link href="tutor-style.css" rel='stylesheet' type='text/css'/>
	<link rel="shortcut icon" type="image/png" href="images/findExeterLogo.png"/>
	<img src="images/findExeterLogo.png" height="150px" style="float: right;">
    <title>Login</title>



  </head>
  <body>
      <div class="loginContent">
        <div class="TableHeader"><h1>Tutor Login</h1></div>
        <form name="t-loginForm" action="tutor-login-action.php" method="post"


          <p><label for="tutor"><b>Tutor:</b></label></p>
          <select name="tutor" required id="tutorList">
           <?php
	      /**
	       * Function to populate drop-down menu from distinct tutorvalues in database
	       */
              function dropdownOptions() {
                require('connection.php');
                $sql = "SELECT * FROM tutorGroup";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                  echo "<option value='".$row['tutorID']."'>".$row['fName']." ".$row['lName']."</option>";
                }
              }
              dropdownOptions();
              ?>
          </select>

        <p>Please enter your password:</p>
        <input type="password" name="password" value="">
        <p></p>
        <button type="submit" name="submit" id="loginButton">Login</button>
        </form>
      </div>
  </body>
</html>
