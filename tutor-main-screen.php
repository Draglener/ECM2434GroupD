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

      <?php
        require('connection.php');
        $query = "SELECT * FROM tutorGroup";

        echo '<table border="0" cellspacing="2" cellpadding="2">
              <tr>
                  <td> <font face="Arial">TutorID</font> </td>
                  <td> <font face="Arial">First Name</font> </td>
                  <td> <font face="Arial">Last Name</font> </td>
                  <td> <font face="Arial">Score</font> </td>
                  <td> <font face="Arial">Office</font> </td>
              </tr>';

              if ($result = $mysqli->query($query)) {
                  while ($row = $result->fetch_assoc()) {
                      $field1name = $row["col1"];
                      $field2name = $row["col2"];
                      $field3name = $row["col3"];
                      $field4name = $row["col4"];
                      $field5name = $row["col5"];

                      echo '<tr>
                                <td>'.$field1name.'</td>
                                <td>'.$field2name.'</td>
                                <td>'.$field3name.'</td>
                                <td>'.$field4name.'</td>
                                <td>'.$field5name.'</td>
                            </tr>';
                  }
                  $result->free();
              }

        ?>
      <!--
      <div class="Table"><h3>Groups Table</h3>
        <table style="width:70%">
          <tr>
            <th>Tutor</th>
            <th>No. in group</th>
            <th>Current Destination</th>
            <th>Next destination</th>
            <th>Current Score</th>
          </tr>
          <tr>
            <th>Matt Collision</th>
            <th>1</th>
            <th>Amory Moot</th>
            <th>Harrison 208</th>
            <th>14</th>
          </tr>
        </table>
      </div>
    -->

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
