<!-- 
Author: Keith Harrison 
Last updated: 09/03 13:24
-->

<?php
Session_start();
Require('connection.php');
$cycle = htmlentities($_POST["cycle"]);
$user = $_SESSION['studentID'];
//Changes the user's cycle
$sql2 = "UPDATE user SET currentCycle = ".$cycle." WHERE userID = ".$user;
$conn->query($sql2);
header("Location: pick.php");
?>

