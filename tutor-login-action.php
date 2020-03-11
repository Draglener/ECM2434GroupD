<!-- 
Author: Annelise Travis
Last updated: 10/03 9:24
-->
<?php
session_start();
require('connection.php');

$tutor = htmlentities($_POST["tutor"]) ;
$password = htmlentities($_POST["password"]) ;

validate($conn, $tutor, $password);

function validate($conn, $tutor, $password){


    $tutor = $conn->real_escape_string($tutor);
	
  //prepared statements for security
  $sql = $conn->prepare("SELECT password FROM tutorGroup WHERE tutorID = ?");
  $sql->bind_param('i', $tutor);
    $sql->execute();
  $sql->store_result();
  $sql->bind_result($dbPassword);


  //checking tutor exists in database
if ($sql->num_rows > 0) {
  while ($sql->fetch()) {
    //checking that passwords match
      if ($dbPassword === crypt($password, $dbPassword)) {
        session_start();
        $_SESSION['user'] = $tutor;
        $_SESSION['status'] = "gamemaster";

         header("Location: tutor-main-screen.php");
        exit();
      } else {

      $error = "Incorrect password";

      $_SESSION["apperror"] = $error ;
   header("Location: tutor-login.php");
      }
  }
}  else {
   $error = "Tutor not found" ;
$_SESSION["apperror"] = $error ;

header("Location: tutor-login.php");
}
}
$conn->close();

?>
