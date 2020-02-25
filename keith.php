at very top of file:
<?php
session_start();
require('connection.php');
$_SESSION['studentID'] = 2;
$sql = "SELECT * from user WHERE userID = ".$_SESSION['studentID'];
$result =  $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()){
	  $location = $row['location'];
  }
}
?>

in javascript:
var loc = <?php echo $location; ?>;