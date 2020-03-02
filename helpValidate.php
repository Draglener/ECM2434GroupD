<?php
session_start();
require('connection.php');
$help = $_GET['help'];
$user = $_SESSION['studentID'];
$sql2 = $conn->prepare("UPDATE user SET help = ? WHERE userID = ?");
$sql2->bind_param('ii', $help, $user);
?>