<?php
session_start();
require('connection.php');
$ID = $_SESSION['studentID'];

$query = "UPDATE user SET points = 0 AND location = 0 WHERE userID = ".$ID.";";
$conn->query($query);
// remove all session variables
session_unset();
// destroy the session
session_destroy();
header('Location: homepage.php');
?>

