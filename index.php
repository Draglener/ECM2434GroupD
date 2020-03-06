<?php
  session_start();
  ?>
  <!-- Author: Keith Harrison
Last updated: 06/02 15:54
Created Landing Page
-->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>findExeter</title>
    <link href="style_sheet.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" type="image/png" href="findExeterLogo.png"/>
  </head>

  <body class="body" id="body">


        <img src="findExeterLogo.png" alt="topImage" class="topImage">
<a href="homepage.php"><input type="button" id="loginButton" value="&#8682; Student Login"></a>

<a href="tutor-login.php"><input type="button" id="loginButton" value="&#8682; Tutor Login"></a>

        <img src="exeterLogo.png" alt="bottomImage" class="bottomImage">

  </body>
  <?php unset($_SESSION['apperror']); ?>
</html>
