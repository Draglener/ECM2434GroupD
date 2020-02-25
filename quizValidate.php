<?php
session_start();
require('connection.php');
$location = $_GET['loc'];
$points = $_GET['points'];
$user = $_SESSION['studentID'];

 
         $sql2 = $conn->prepare("UPDATE user SET location = ? WHERE userID = ?");
		 $sql2->bind_param('ii', $location, $user);
		 if ($sql2->execute()){
			 $sql = "SELECT points FROM user WHERE userID = ".$user;
			 $result = $conn->query($sql);
              while($row = $result->fetch_assoc()){
				  $current = $row['points'];
			  }
			  $points = $points + $current;
			  $sql = $conn->prepare("UPDATE user SET points = ? WHERE userID = ?");
			   $sql->bind_param('ii', $points, $user);
		      $sql->execute();
			 header("Location: map_code.php");	
			 exit();
			 			  			 
		 } else {
			 echo $conn->error;
		 }
		 
          
        

?>
<!-- Author: Anneliese Travis
Last updated: 25/02 15:15
Has the quiz linked to the PHP for points and location
and changed links from html pages to php
-->
