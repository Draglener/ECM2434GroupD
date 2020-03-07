<?php
session_start();
require('connection.php');
//reset location
$user = $_SESSION['studentID'];

         $sql2 = $conn->prepare("UPDATE user SET quizDone = 0 WHERE userID = ?");
		 $sql2->bind_param('i', $user);
		 if ($sql2->execute()){
			header('Location: map_code.php');


			 			  			 
		 } else {
			 echo $conn->error;
		 }
		
?>

