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
			 header("Location: map.html");	
			 exit();
			 			  			 
		 } else {
			 echo $conn->error;
		 }
		 
          
        

?>