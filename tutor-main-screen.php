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
    <script src="actions.js"></script>
  </head>

  <body class="body" id="body" onload="openPage(event, 'Groups'); addVis()">
    <div><h1>Game Master Page</h1></div>
    <div class="tab">
      <button class="tablinks" onclick="openPage(event, 'Groups')">Tutor Groups</button>
      <button class="tablinks" onclick="openPage(event, 'Students')">Students</button>
      <button class="tablinks" onclick="openPage(event, 'Rooms')">Rooms</button>
    </div>

    <div id="Groups" class="tabcontent">
      <h2>Tutor Groups</h2>
      <p>this is the groups/tutor page.</p>

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
        $conn->close();
        ?>


      <div id="AddButton">
        <button onclick="addVis('AddSection')">Add New Tutor</button>
      </div>

      <div id="AddSection">
        //need to ask for all the information stored about a tutor in the database
        //the tutor should be given a dropdown list when selecting their office
        <form method="post" action="addData.php">
          Enter X<input type="text" name="name"/><hr/>
          Enter Y<input type="text" name="edition"/><hr/>
          Enter Z<input type="number" name="amount"/><hr/>
          <input type="submit"  name="addTutor" value="Add Thing"/>
        </form>
      </div>
    </div>


    <div id="Students" class="tabcontent">
      <h2>Students</h2>
      <p>this is the students page. it displays a table of the students, which group they are in and where they were?</p>
      <div class="Table"><h3>Students Table</h3>
        <table style="width:70%">
          <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Username</th>
            <th>Tutor</th>
            <th>Location</th>
          </tr>
          <tr>
            <th>Test</th>
            <th>lName</th>
            <th>abc123</th>
            <th>Matt Collision</th>
            <th>Amory moot</th>
          </tr>
        </table>
      </div>
    </div>


    <div id="Rooms" class="tabcontent">
      <h2>Rooms</h2>
      <p>this is the rooms page is shows the rooms and which building they are in.</p>
      <div class="Table"><h3>Rooms Table</h3>
        <table style="width:70%">
          <tr>
            <th>Room Name</th>
            <th>Type</th>
            <th>Building</th>
          </tr>
          <tr>
            <th>Amory moot</th>
            <th>lecture theater</th>
            <th>Amory</th>
          </tr>
        </table>
      </div>

      <div id="AddButton2">
        <button onclick="addVis('AddSection2')">Add New Room</button>
      </div>

      <div id="AddSection2">
        //need to ask for all the information +an option to add it to the end of a cicle?
        <form method="post" action="addData.php">
          Enter X<input type="text" name="name"/><hr/>
          Enter Y<input type="text" name="edition"/><hr/>
          Enter Z<input type="number" name="amount"/><hr/>
          <input type="submit"  name="addRoom" value="Add Thing"/>
        </form>
      </div>
    </div class=sessions>
      <button onclick="window.location.href = 'logout.php';">Logout</button>
  </body>
</html>

