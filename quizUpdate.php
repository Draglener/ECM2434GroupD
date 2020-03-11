<?php
session_start();

/*
Author: Keith Harrison 
Last updated: 10/03 08:24
*/

require('connection.php');
//reset location
$user = $_SESSION['studentID'];

         $sql2 = $conn->prepare("UPDATE user SET quizDone = 0 WHERE userID = ?");
		 $sql2->bind_param('i', $user);
		 if ($sql2->execute()){
			header('Location: quiz.php');


			 			  			 
		 } else {
			 echo $conn->error;
		 }
		
?>

