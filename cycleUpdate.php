<?php
Session_start();
Require('connection.php');
$cycle = htmlentities($_POST["cycle"]);
$user = $_SESSION['studentID'];
$sql2 = "UPDATE user SET currentCycle = ".$cycle." WHERE userID = ".$user;
$conn->query($sql2);
header("Location: pick.php");
?>

