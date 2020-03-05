<?php
  require("connection.php");
  $from = htmlentities($_POST["from"]);
  if ($from == "addTutor") {
    addTutor($conn);
  }elseif ($from == "removeTutor") {
    removeTutor($conn);
  }elseif ($from == "addStudent") {
    //addStudent($conn);
  }elseif ($from == "removeStudent") {
    removeStudent($conn);
  }elseif ($from == "addRoom") {
    //addRoom($conn);
  }elseif ($from == "removeRoom") {
    removeRoom($conn);
  }else{
    header('Location: tutor-main-screen.php');
  }


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


  function removeTutor($conn){
    $tutorID = htmlentities($_POST["tutorID"]);
    $query ="DELETE FROM tutorGroup WHERE tutorID =". $tutorID .";";
    $conn->query($query);
    header('Location: tutor-main-screen.php');
  }

//fix using SQL dump
  function addStudent($conn){
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


  function removeStudent($conn){
    $userID = htmlentities($_POST["userID"]);
    $query ="DELETE FROM user WHERE userID =". $userID .";";
    $conn->query($query);
    header('Location: tutor-main-screen.php');
  }

//fix using SQL dump
  function addRoom($conn){
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


  function removeRoom($conn){
    $roomID = htmlentities($_POST["roomID"]);
    $query ="DELETE FROM room WHERE roomID =". $roomID .";";
    $conn->query($query);
    header('Location: tutor-main-screen.php');
  }

?>
