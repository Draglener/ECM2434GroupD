<?php
session_start();
require('connection.php');

$username = htmlentities($_POST["username"]);
$tutor = htmlentities($_POST["tutor"]) ;
validate($conn, $tutor, $username);

function validate($conn, $tutor, $username){

    $username = $conn->real_escape_string($username);
	
  //prepared statements for security
  $sql = $conn->prepare("SELECT userID, tutorID FROM user WHERE username = ?");
  $sql->bind_param('s', $username);
  $sql->execute();
  $sql->store_result();
  $sql->bind_result($id, $correctTutor);

  //checking username exists in database
if ($sql->num_rows > 0) {
  while ($sql->fetch()) {
    //checking that tutors match
      if ($correctTutor == $tutor) {
          session_start();
          $_SESSION['status'] = "student";
          header("Location: map.html");
        exit();
      } else {
      $error = "Incorrect Tutor";
      $_SESSION["apperror"] = $error ;
    header("Location: homepage.php");
	exit();
      }
  }

}  else {
   $error = "Username not found" ;
$_SESSION["apperror"] = $error ;
header("Location: homepage.php");
exit();
}
}


$conn->close();

?>
