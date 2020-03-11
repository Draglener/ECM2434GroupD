<?php
session_start();

/*
Author: Keith Harrison
Last updated: 25/02 15:15
*/

require('connection.php');
$user = $_SESSION['studentID'];
//changes the users cycle.
$sql2 = "UPDATE user SET currentCycle = 0, location = 0, quizDone = 0 WHERE userID = ".$user;
$conn->query($sql2);
header("Location: pick.php");
?>
