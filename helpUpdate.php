<?php
session_start();
require('connection.php');
$help = $_GET['help'];
$user = $_SESSION['studentID'];
$sql2 = $conn->prepare("UPDATE user SET help = '1' WHERE userID = $user");
$sql2->bind_param('ii', $help, $user);
$sql2->execute();
header("Location: map_code.php");
?>
