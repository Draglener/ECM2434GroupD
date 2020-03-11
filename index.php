
<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<!-- Author: Keith Harrison
	Last updated: 06/02 15:54
	-->

  	<head>
    		<meta charset="UTF-8">
    		<title>findExeter</title>
    		<link href="style_sheet.css" rel="stylesheet" type="text/css">
		<link rel="shortcut icon" type="image/png" href="images/findExeterLogo.png"/>
	</head>

  	<body class="body" id="body">
		<!-- Redirects to home page or tutor page . -->
        	<img src="images/findExeterLogo.png" alt="topImage" class="topImage">
		<a href="homepage.php"><input type="button" id="loginButton" value="&#8682; Student Login"></a>
		<a href="tutor-login.php"><input type="button" id="loginButton" value="&#8682; Tutor Login"></a>
        	<img src="images/exeterLogo.png" alt="bottomImage" class="bottomImage">

  	</body>
  	<?php unset($_SESSION['apperror']); ?>
</html>
