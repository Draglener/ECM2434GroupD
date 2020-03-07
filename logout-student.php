<?php
session_start();
require('connection.php');
//reset location
$from = htmlentities($_GET["from"]);
$user = $_SESSION['studentID'];
	if ($from == 1){
         $sql2 = $conn->prepare("UPDATE user SET location = 0, quizDone = 0 WHERE userID = ?");
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
		 }}
	else{
			// remove all session variables
			session_unset();
			// destroy the session
			session_destroy();
			header('Location: index.php');
			exit();
	
	}
		 
?>

