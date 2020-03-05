<?php
  //checks the correct session is established
  session_start();
  require('connection.php');
  $session = $_SESSION['appuser'];
  if ($_SESSION['status'] == "gamemaster"){
  }else{
    //redirects the user if they do not have the correct session
    header('Location: tutor-login.php');
  }

?>


<html>
  <head class="head" id="head">
    <link rel="stylesheet" href="tutor-style.css">
    <img src="findExeterLogo.png" height="150px" style="float: right;">
    <script src="actions.js"></script>
  </head>

  <!-- cresting the tabs and linking them to openPage -->
  <body class="body" id="body" onload="openPage(event, 'Groups'); addVis()">
    <div><h1>Game Master Page</h1></div>
    <div class="tab">
      <button class="tablinks" onclick="openPage(event, 'Groups')">Tutor Groups</button>
      <button class="tablinks" onclick="openPage(event, 'Students')">Students</button>
      <button class="tablinks" onclick="openPage(event, 'Rooms')">Rooms</button>
    </div>






    <!--Content for the tutor tab -->
    <div id="Groups" class="tabcontent">
      <h2>Tutor Groups</h2>
      <p>This is the Tutor groups page it displays the tutor ID name and the groups score.</p>
      <div class="Table"><h3>Tutor Table</h3>
        <!-- creating the titles for the table -->
        <table>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Lastname</th>
            <th>Score</th>
          </tr>
          <?php
          $sql = "SELECT tutorID, fName, lName, score from tutorGroup";
          $result = $conn->query($sql);
          if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
              //filling in the table with content from the database
              echo "<tr><td>".$row["tutorID"]."</td><td>".$row["fName"]."</td><td>".$row["lName"]."</td><td>".$row["score"]."</td></tr>";
            }
            echo "</table>";
          }else{ echo "<p>No tutors.</p><p>Use buttons to add tutors.</p>"; }
          ?>
      </div>

      <!-- Button to show the add and delete section -->
      <div id="AddButton">
        <button onclick="addVis('AddSection')">Add & Remove Tutors</button>
      </div>

      <!-- Add and delete section -->
      <div id="AddSection">
        <h3>Add a tutor </h3>
        <form method="post" action="addData.php">
          <!-- from value is used to determine which function has called it -->
          <input type="hidden" name="from" value="addTutor">
          Enter Your Firstname<input type="text" name="fName"/><hr/>
          Enter Your Lastname<input type="text" name="lName"/><hr/>
          Enter a Password<input type="text" name="password"/><hr/>
          <label for="office"><b>Office:</b></label>
          <select name="office" required id="officeList">
           <?php
              //function to populate drop-down menu for office rooms
              function dropdownOffice() {
                require('connection.php');
                $sql = "SELECT * FROM room WHERE type='office'";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                  echo "<option value='".$row['roomID']."'>".$row['name']."</option>";
                }
              }
              dropdownOffice();
              ?>
          </select>
          <input type="submit"  name="addTutor" value="Add Tutor"/>
        </form>


        <h3>Remove a tutor </h3>
        <form method="post" action="addData.php">
          <!-- Allows the user to select a tutor from a drop-down list to delete from the database -->
          <input type="hidden" name="from" value="removeTutor">
          <label for="tutor"><b>Select Tutor to Remove:</b></label>
          <select name="tutorID" required id="tutorList">
          <?php
          dropdownTutor();
          ?>
          <input type="submit"  name="removeTutor" value="Remove Tutor"/>
        </form>

      </div>
    </div>







    <!-- Student tab section -->
    <div id="Students" class="tabcontent">
      <h2>Students</h2>
      <p>This is the students page. It displays a table of the students, which group they are in and where they are</p>
      <div class="Table"><h3>Students Table</h3>
        <table>
          <!-- table headers -->
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Tutor</th>
            <th>Location</th>
            <th>Score</th>
            <th>Help</th>
          </tr>
          <?php
          $sql = "SELECT user.*, tutorGroup.lName, tutorGroup.fName, building.name FROM user INNER JOIN building ON user.location = building.buildingID INNER JOIN tutorGroup ON user.tutorID = tutorGroup.tutorID  ORDER BY user.userID";
           //
          $result = $conn->query($sql);
          if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
              //filling the database with the data retreved from the database
              echo "<tr><td>".$row["userID"]."</td><td>".$row["username"]."</td><td>".$row['fName']." ".$row['lName']."</td><td>".$row["name"]."</td><td>".$row["points"]."</td><td>".$row["help"]."</td></tr>";
            }
            echo "</table>";
          }else{  echo "<p>Error:".$conn->error."</p>"; }
          ?>
      </div>

      <div id="AddButton2">
        <button onclick="addVis('AddSection2')">Add & Remove Students</button>
      </div>

      <div id="AddSection2">
        <h3>Add a Student </h3>
        <form method="post" action="addData.php">
          <input type="hidden" name="from" value="addStudent">
          Enter the username<input type="text" name="username"/><hr/>
          <label for="tutor"><b>Tutor:</b></label>
          <select name="tutorID" required id="tutorList">
           <?php
           //function to populate the drop-down list with tutors from the database
              function dropdownTutor() {
                require('connection.php');
                $sql = "SELECT * FROM tutorGroup";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                  echo "<option value='".$row['tutorID']."'>".$row['fName']." ".$row['lName']."</option>";
                }
              }
              dropdownTutor();
              ?>
          </select>
          <input type="submit"  name="addStudent" value="Add Student"/>
        </form>

        <h3>Remove a Student </h3>
        <form method="post" action="addData.php">
          <input type="hidden" name="from" value="removeStudent">
          <label for="student"><b>Select the Student to Remove:</b></label>
          <select name="userID" required id="studentList">
          <?php
          //function to populate the dropdown list with students using the database.
          function dropdownStudent() {
            require('connection.php');
            $sql = "SELECT * FROM user";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
              echo "<option value='".$row['userID']."'>".$row['username']."</option>";
            }
          }
          dropdownStudent();
          ?>
          <input type="submit"  name="removeStudent" value="Remove Student"/>
        </form>
      </div>
    </div>







    <div id="Rooms" class="tabcontent">
      <h2>Rooms</h2>
      <p>This is the rooms page is shows the rooms and which building they are in.</p>
      <div class="Table"><h3>Rooms Table</h3>
        <table>
          <!-- output the titles for the columns -->
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>BuildingID</th>
          </tr>
          <?php
          $sql = "SELECT room.*, building.name AS bname from room INNER JOIN building ON room.buildingID = building.buildingID";
          $result = $conn->query($sql);
          if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
              //fill that table with data from the database
              echo "<tr><td>".$row["roomID"]."</td><td>".$row["name"]."</td><td>".$row["type"]."</td><td>".$row["bname"]."</td></tr>";
            }
            echo "</table>";
          }else{  echo "<p>Error:".$conn->error."</p>";   }
          ?>
      </div>


      <div id="AddButton3">
        <button onclick="addVis('AddSection3')">Add & Remove Rooms</button>
      </div>

      <!-- Section to add and remove rooms from the database -->
      <div id="AddSection3">
        <h3>Add a room </h3>
        <form method="post" action="addData.php">
          <input type="hidden" name="from" value="addRoom">
          Enter the room name<input type="text" name="name"/><hr/>
          Enter the room type<input type="text" name="type"/><hr/>
          <label for="building"><b>Building:</b></label>
          <select name="building" required id="buildingList">
           <?php
           //fucntion to populate the drop-down list
              function dropdownBuildings() {
                require('connection.php');
                $sql = "SELECT * FROM building";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                  echo "<option value='".$row['buildingID']."'>".$row['name']."</option>";
                }
              }
              dropdownBuildings();
              ?>
          </select>
          <input type="submit"  name="addRoom" value="Add Room"/>
        </form>

        <h3>Remove a room </h3>
        <form method="post" action="addData.php">
          <input type="hidden" name="from" value="removeRoom">
          <label for="room"><b>Select the Room to Remove:</b></label>
          <select name="roomID" required id="roomList">
            <?php
            function dropdownRoom() {
              require('connection.php');
              $sql = "SELECT * FROM room";
              $result = $conn->query($sql);
              while($row = $result->fetch_assoc()){
                echo "<option value='".$row['roomID']."'>".$row['name']."</option>";
              }
            }
            dropdownRoom();
            ?>
          <input type="submit"  name="removeRoom" value="Remove Room"/>
        </form>
      </div>





    </div class=sessions>
      <button onclick="window.location.href = 'logout.php';">Logout</button>
  </body>
</html>

