<?php
require("connection.php");
  addTutor($conn);




function addTutor($conn){
  $fName = htmlentities($_POST["fName"]);
  $lName = htmlentities($_POST["lName"]);
  $score = '0';
  $office = htmlentities($_POST["office"]);
  $current_pos = '0';
  $password = htmlentities($_POST["password"]);
  $query = "INSERT INTO tutorGroup (fName, lName, score, office, current_pos, password) VALUES ('". $fName ."', '" .$lName ."', '". $score ."', '" .$office ."', '". $current_pos ."', '" .$password ."');";
  $conn->query($query);
  header('Location: tutor-main-screen.php');
}

?>
