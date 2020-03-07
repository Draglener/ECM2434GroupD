<?php
session_start();
require('connection.php');
//reset location
$from = htmlentities($_GET["from"]);
$user = $_SESSION['studentID'];
	if ($from == 0){
         $sql2 = $conn->prepare("UPDATE user SET quizDone = 1 WHERE userID = ?");
		 $sql2->bind_param('i', $user);
		 if ($sql2->execute()){
			header('Location: map_code.php');


			 			  			 
		 } else {
			 echo $conn->error;
		 }}
	elseif ($from == 1){
         $sql2 = $conn->prepare("UPDATE user SET quizDone = 0 WHERE userID = ?");
		 $sql2->bind_param('i', $user);
		 if ($sql2->execute()){
			header('Location: quiz.php');


			 			  			 
		 } else {
			 echo $conn->error;
		 }}
		 
?>

