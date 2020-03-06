<?php
session_start();
require('connection.php');
$cycle = $_GET['cycle'];
$user = $_SESSION['studentID'];
$sql2 = $conn->prepare("UPDATE user SET currentCycle = $cycle WHERE userID = $user");
$sql2->bind_param('ii', $currentCycle, $user);
$sql2->execute();
header("Location: quiz.php");
?>
