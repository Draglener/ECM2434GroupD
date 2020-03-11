<?php
  require("connection.php");
  $from = htmlentities($_POST["from"]);
  if ($from == "addTutor") {
    addTutor($conn);
  }elseif ($from == "removeTutor") {
    removeTutor($conn);
  }elseif ($from == "addStudent") {
    addStudent($conn);
  }elseif ($from == "removeStudent") {
    removeStudent($conn);
  }elseif ($from == "addRoom") {
    addRoom($conn);
  }elseif ($from == "removeRoom") {
    removeRoom($conn);
  }elseif ($from == "addBuilding") {
    addBuilding($conn);
  }elseif ($from == "removeBuilding") {
    removeBuilding($conn);
  }elseif ($from == "addCycle") {
    addCycle($conn);
  }else{
    header('Location: tutor-main-screen.php');
  }

  /**
   * Function to query and add a tutor to the database
   *
   */
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
  
   /**
    * Function to delete the selected tutor from the database
    *
    */
  function removeTutor($conn){
    $tutorID = htmlentities($_POST["tutorID"]);
    $query ="DELETE FROM tutorGroup WHERE tutorID =". $tutorID .";";
    $conn->query($query);
    header('Location: tutor-main-screen.php');
  }

  /**
    * Function to query and add a student to the database
    *
    */
  function addStudent($conn){
    $username = htmlentities($_POST["username"]);
    $tutorID = htmlentities($_POST["tutorID"]);
    $query = "INSERT INTO user (username, tutorID, location, points, tAndC, help, currentCycle, quizDone) VALUES ('". $username ."', " .$tutorID .", 0,0,0,0,0,0);";
    $conn->query($query);
    header('Location: tutor-main-screen.php');
  }
  
  /**
    * Function to delete the selected student from the database
    *
    */
  function removeStudent($conn){
    $userID = htmlentities($_POST["userID"]);
    $query ="DELETE FROM user WHERE userID =". $userID .";";
    $conn->query($query);
    header('Location: tutor-main-screen.php');
  }
  
  /**
    * Function to add the selected room to the database
    *
    */
  function addRoom($conn){
    $name = htmlentities($_POST["name"]);
    $type = htmlentities($_POST["type"]);
    $buildingID = htmlentities($_POST["buildingID"]);
    $query = "INSERT INTO room (name, type, buildingID) VALUES ('".$name."', '".$type."', ".$buildingID.");";
    $conn->query($query);#
    header('Location: tutor-main-screen.php');
  }

  /**
    * Function to remove a selected room from the database
    *
    */
  function removeRoom($conn){
    $roomID = htmlentities($_POST["roomID"]);
    $query ="DELETE FROM room WHERE roomID =". $roomID .";";
    $conn->query($query);
    header('Location: tutor-main-screen.php');
  }

    /**
      * Function to add a building to the database
      *
      */
    function addBuilding($conn){
      $name = htmlentities($_POST["name"]);
      $info = htmlentities($_POST["info"]);
      $latitude = htmlentities($_POST["latitude"]);
      $longitude = htmlentities($_POST["longitude"]);

      $question = htmlentities($_POST["question"]);
      $wBuilding1 = htmlentities($_POST["wBuilding1"]);
      $wBuilding2 = htmlentities($_POST["wBuilding2"]);
      $wBuilding3 = htmlentities($_POST["wBuilding3"]);

      $query = "INSERT INTO building (name, info, latitude, longitude) VALUES  ('".$name."', '".$info."', '".$latitude."', '".$longitude."');";
      $conn->query($query);

      $query2 = "SELECT buildingID FROM building";
      $buildingID = 0;
      $result = $conn->query($query2);
      if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
          if ($buildingID < $row["buildingID"]) {
            $buildingID = $row["buildingID"];
          }
        }
      }else{  echo "<p>Error:".$conn->error."</p>";   }
      $query = "INSERT INTO question (correctBuildingID, question, wrongBuilding1, wrongBuilding2, wrongBuilding3)
            VALUES  ('".$buildingID."', '".$question."', '".$wBuilding1."','".$wBuilding2."', '".$wBuilding3."');";
      $conn->query($query);
      header('Location: tutor-main-screen.php');
    }

    /**
      * Function to remove the selected building from the database
      * 
      */
    function removeBuilding($conn){
      $buildingID = htmlentities($_POST["buildingID"]);
      $query ="DELETE FROM building WHERE buildingID =". $buildingID .";";
      $conn->query($query);
      header('Location: tutor-main-screen.php');
    }

    /**
      * Function to add a cycle to the database
      *
      */
    function addCycle($conn){
      $name = htmlentities($_POST["name"]);
      $buildingID1 = htmlentities($_POST["buildingID1"]);
      $buildingID2 = htmlentities($_POST["buildingID2"]);
      $buildingID3 = htmlentities($_POST["buildingID3"]);
      $buildingID4 = htmlentities($_POST["buildingID4"]);
      $buildingID5 = htmlentities($_POST["buildingID5"]);
      $buildingID6 = htmlentities($_POST["buildingID6"]);
      $buildingID7 = htmlentities($_POST["buildingID7"]);
      $buildingID8 = htmlentities($_POST["buildingID8"]);
      $buildingID9 = htmlentities($_POST["buildingID9"]);
      $buildings = array($buildingID1, $buildingID2, $buildingID3, $buildingID4, $buildingID5, $buildingID6, $buildingID7, $buildingID8, $buildingID9);
      if ($buildingID1 != 0 && $buildingID2 != 0 && $buildingID3 != 0 && $buildingID4 != 0) {
        $query = "INSERT INTO cycleGroup (cName) VALUES ('".$name."');";
        $conn->query($query);
        $cycleid = 0;
        $query2 = "SELECT * FROM cycleGroup";
        $result = $conn->query($query2);
        if ($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            if ($cycleid < $row["cycleID"]) {
              $cycleid = $row["cycleID"];
            }
          }
        }else{  echo "<p>Error:".$conn->error."</p>";   }
        $count = 1;
        foreach( $buildings as $ID ) {
          if ($ID==0) {
            break;
          }
          $query3 = "INSERT INTO buildingCycle (buildingID, cycleID, position) VALUES (".$ID.", ".$cycleid.", ".$count.");";
          $conn->query($query3);
          $count = $count + 1;

        }
      }
      header('Location: tutor-main-screen.php');
    }

?>

<!-- 
Author: Jasmine West
Last updated: 09/03 13:24
-->
