<?php
session_start();
require('connection.php');
//reset location
$user = $_SESSION['studentID'];
         $sql2 = $conn->prepare("UPDATE user SET location = 0 WHERE userID = ?");
		 $sql2->bind_param('i', $user);
		 if ($sql2->execute()){
			// remove all session variables
			session_unset();
			// destroy the session
			session_destroy();
			header('Location: index.php');
			exit();
			 			  			 
		 } else {
			 echo $conn->error;
		 }
		 
?>

