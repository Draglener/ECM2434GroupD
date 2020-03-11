<!-- 
Author: Annelise Travis
Last updated: 09/03 13:24
-->

<?php
$servername = "db5000293954.hosting-data.io";
$username = "dbu477057";
$password = "2020GroupProject!";
$database = 'dbs287158';

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
  //echo "Connected successfully <br />";
}
?>
