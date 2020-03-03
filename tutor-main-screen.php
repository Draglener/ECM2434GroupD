<?php
  session_start();
  require('connection.php');
  $session = $_SESSION['appuser'];
  if ($_SESSION['status'] == "gamemaster"){
  }else{
    header('Location: tutor-login.php');
  }
?>

<html>
  <head class="head" id="head">
    <link rel="stylesheet" href="tutor-style.css">
	<link rel="shortcut icon" type="image/png" href="findExeterLogo.png"/>
    <script src="actions.js"></script>
  </head>

  <body class="body" id="body" onload="openPage(event, 'Groups'); addVis()">
	<img src="findExeterLogo.png" height="150px" style="float: right;">
    <div><h1>Game Master Page</h1></div>
    <div class="tab">
      <button class="tablinks" onclick="openPage(event, 'Groups')">Tutor Groups</button>
      <button class="tablinks" onclick="openPage(event, 'Students')">Students</button>
      <button class="tablinks" onclick="openPage(event, 'Rooms')">Rooms</button>
    </div>

    <div id="Groups" class="tabcontent">
      <h2>Tutor Groups</h2>
      <p>This is the Tutor groups page it displays the tutor ID name and the groups score.</p>

      <div class="Table"><h3>Tutor Table</h3>
        <!-- Stock Table -->
        <table>
          <!-- Table headers -->
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Lastname</th>
            <th>Score</th>
          </tr>

          <!-- PHP to fetch data, and fill table -->
          <?php
          $sql = "SELECT tutorID, fName, lName, score from tutorGroup";
          $result = $conn->query($sql);
          if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
              echo "<tr><td>".$row["tutorID"]."</td><td>".$row["fName"]."</td><td>".$row["lName"]."</td><td>".$row["score"]."</td></tr>";
            }
            echo "</table>";
          }else{
            echo "<p>No stock.</p><p>Use buttons to add stock.</p>";
          }

          ?>
      </div>

      <div id="AddButton">
        <button onclick="addVis('AddSection')">Add New Tutor</button>
      </div>

      <div id="AddSection">
        <form method="post" action="addData.php">
          Enter Your Firstname<input type="text" name="fName"/><hr/>
          Enter Your Lastname<input type="text" name="lName"/><hr/>
          Enter a Password<input type="text" name="password"/><hr/>
          <label for="office"><b>Office:</b></label>
          <select name="office" required id="officeList">
           <?php
              //function to populate drop-down menu for office rooms
              function dropdownOptions() {
                require('connection.php');
                $sql = "SELECT * FROM room WHERE type='office'";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()){
                  echo "<option value='".$row['roomID']."'>".$row['name']."</option>";
                }
              }
              dropdownOptions();
              ?>
          </select>
          <input type="submit"  name="addTutor" value="Add Tutor"/>
        </form>
      </div>
    </div>


    <div id="Students" class="tabcontent">
      <h2>Students</h2>
      <p>This is the students page. It displays a table of the students, which group they are in and where they are</p>
      <div class="Table"><h3>Students Table</h3>
        <!-- Stock Table -->
        <table>
          <!-- Table headers -->
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>TutorID</th>
            <th>Location</th>
            <th>Score</th>
			<th>Help</th>
          </tr>

          <!-- PHP to fetch data, and fill table -->
          <?php
          $sql = "SELECT * from user";
          $result = $conn->query($sql);
          if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
              echo "<tr><td>".$row["userID"]."</td><td>".$row["username"]."</td><td>".$row["tutorID"]."</td><td>".$row["location"]."</td><td>".$row["points"]."</td><td>".$row["help"]."</td></tr>";
            }
            echo "</table>";
          }else{
            echo "<p>Error:".$conn->error."</p>";
          }
          ?>
      </div>
    </div>




    <div id="Rooms" class="tabcontent">
      <h2>Rooms</h2>
      <p>This is the rooms page is shows the rooms and which building they are in.</p>
      <div class="Table"><h3>Rooms Table</h3>
        <!-- Stock Table -->
        <table>
          <!-- Table headers -->
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>BuildingID</th>
          </tr>

          <!-- PHP to fetch data, and fill table -->
          <?php
          $sql = "SELECT * from room";
          $result = $conn->query($sql);
          if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
              echo "<tr><td>".$row["roomID"]."</td><td>".$row["name"]."</td><td>".$row["type"]."</td><td>".$row["buildingID"]."</td></tr>";
            }
            echo "</table>";
          }else{
            echo "<p>Error:".$conn->error."</p>";
          }
          ?>
      </div>

      <div id="AddButton2">
        <button onclick="addVis('AddSection2')">Add New Room</button>
      </div>

      <div id="AddSection2">
        <form method="post" action="addData.php">
          Enter roomID<input type="number" name="roomID"/><hr/>
          Enter Name<input type="text" name="name"/><hr/>
          Enter Type<input type="text" name="type"/><hr/>
	  Enter buildingID<input type="text" name="buildingID"/><hr/>
          <input type="submit"  name="addRoom" value="Add Room"/>
        </form>
      </div>
    </div class=sessions>
      <button onclick="window.location.href = 'logout.php';">Logout</button>
  </body>
</html>

