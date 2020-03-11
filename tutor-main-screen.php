<?php
  //checks the correct session is established
  session_start();
  
/*
Author: Annelise Travis and Jasmine West and Keith Harrison 
Last updated: 09/03 13:24
*/
  require('connection.php');
  $session = $_SESSION['appuser'];
  if ($_SESSION['status'] == "gamemaster"){
  }else{
    //redirects the user if they do not have the correct session
    header('Location: index.php');
  }

?>


<html>
  <head class="head" id="head">
    <link rel="stylesheet" href="tutor-style.css">
    <title>GM page</title>
    <link href="style_sheet.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" type="image/png" href="images/findExeterLogo.png"/>
    <script src="actions.js"></script>
  </head>

  <!-- cresting the tabs and linking them to openPage -->
  <body class="body" id="body" onload="openPage(event, 'Groups',  <?php echo $_SESSION['user'];?>); addVis()">
    <div><h1>Game Master Page</h1></div>
    <div class="tab">
      <button class="tablinks" onclick="openPage(event, 'Groups', <?php echo $_SESSION['user'];?>)">Tutor Groups</button>
      <button class="tablinks" onclick="openPage(event, 'Students', 0)">Students</button>
      <button class="tablinks" onclick="openPage(event, 'Rooms', 0)">Rooms</button>
      <button class="tablinks" onclick="openPage(event, 'Buildings', 0)">Buildings</button>
      <button class="tablinks" onclick="openPage(event, 'Cycles', 0)">Cycles</button>
    </div>





    <!--Content for the tutor tab -->
    <div id="Groups" class="tabcontent">
      <h2>Tutor Groups</h2>
      <p>This is the Tutor groups page it displays the tutor ID name and the groups score.</p>
      <div class="Table"><h3>Tutor Table</h3>
        <!-- creating the titles for the table -->
         <table>
          <tr><th>Name</th><th>Lastname</th><th>Group Score</th></tr>
          <?php
          $sql = "SELECT tutorID, fName, lName, score from tutorGroup";
          $result = $conn->query($sql);
          if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
				 $sql2 = "SELECT SUM(points) as total from user WHERE tutorID = ".$row["tutorID"];
				 $result2 = $conn->query($sql2);
                 if ($result2->num_rows > 0){
					while($row2 = $result2->fetch_assoc()){
						$total = $row2['total'];
						echo "<tr><td>".$row["fName"]."</td><td>".$row["lName"]."</td><td>".$total."</td></tr>";
					}
				} else{
					echo $conn->error;
				}
			}
            echo "</table>";
			} else {
				echo "<p>No tutors.</p><p>Use buttons to add tutors.</p>";
			}
          ?>
      </div>
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
	      /**
	       * Function to populate drop-down menu for office rooms
	       */
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
	  /**
	   * Select a tutor to delete froma drop down menu
	   */
          function dropdownDeleteTutor() {
            require('connection.php');
            $sql = "SELECT * FROM tutorGroup WHERE tutorID >=1";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()){
              echo "<option value='".$row['tutorID']."'>".$row['fName']." ".$row['lName']."</option>";
            }
          }

        dropdownDeleteTutor();
        ?>
        </select>
        <input type="submit"  name="removeTutor" value="Remove Tutor"/>
      </form>
    </div>

    <!-- Student tab section -->
    <div id="Students" class="tabcontent">
      <h2>Students</h2>
      <p>This is the students page. It displays a table of the students, which group they are in and where they are</p>
      <div class="Table"><h3>Students Table</h3>
        <table>
          <!-- table headers -->
          <tr><th>ID</th><th>Username</th><th>Tutor</th><th>Cycle</th><th>Points</th><th>Location</th></tr>
          <?php
          $sql = "SELECT user.*, tutorGroup.lName, tutorGroup.fName,  cycleGroup.cName, buildingCycle.buildingID, building.name FROM user
          INNER JOIN buildingCycle  ON user.location = buildingCycle.position AND user.currentCycle = buildingCycle.cycleID
          INNER JOIN cycleGroup ON user.currentCycle = cycleGroup.cycleID
          INNER JOIN tutorGroup ON user.tutorID = tutorGroup.tutorID
          INNER JOIN building ON buildingCycle.buildingID = building.buildingID
          ORDER BY user.userID";
          $result = $conn->query($sql);


          if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
              //filling the database with the data retreved from the database
              echo "<tr><td>".$row["userID"]."</td>
              <td>".$row["username"]."</td>
              <td>".$row['fName']." ".$row['lName']."</td>
              <td>".$row["cName"]."</td>
              <td>".$row["points"]."</td>
              <td>".$row["name"]."</td>";
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
          Enter their username<input type="text" name="username"/><hr/>
          <label for="tutor"><b>Tutor:</b></label>
          <select name="tutorID" required id="tutorList">
           <?php
	      /**
	       * Function to populate the drop-down list with tutors from the database
	       */
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
	  /**
	   * Function to populate the drop-down list with students from the database
	   */
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
          </select>
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
          <label for="building"><b>Enter the building the room is in:</b></label>
          <select name="buildingID" required id="buildingList">
           <?php
	      /**
	       * Function to populate the drop-down list with buildings from the database
	       */
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
	    /**
	     * Function to remove a room from the database
	     */
            function dropdownRoomWOOffice() {
              require('connection.php');
              $sql = "SELECT * FROM room WHERE type != 'Office'";
              $result = $conn->query($sql);
              while($row = $result->fetch_assoc()){
                echo "<option value='".$row['roomID']."'>".$row['name']."</option>";
              }
            }
            dropdownRoomWOOffice();
            ?>
            </select>
          <input type="submit"  name="removeRoom" value="Remove Room"/>
        </form>
      </div>

    </div>





    <div id="Buildings" class="tabcontent">
      <h2>Buildings</h2>
      <p>This is the buildings page and will show all current buildings.</p>
      <div class="Table"><h3>Buildings Table</h3>
        <table>
          <!-- output the titles for the columns -->
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Info</th>
          </tr>
          <?php
          $sql = "SELECT * FROM building";
          $result = $conn->query($sql);
          if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
              //fill that table with data from the database
              echo "<tr><td>".$row["buildingID"]."</td><td>".$row["name"]."</td><td>".$row["info"]."</td></tr>";
            }
            echo "</table>";
          }else{  echo "<p>Error:".$conn->error."</p>";   }
          ?>
      </div>

      <div id="AddButton4">
        <button onclick="addVis('AddSection4')">Add Buildings</button>
      </div>

      <!-- Section to add and remove buildings from the database -->
      <div id="AddSection4">
        <h3>Add a Building </h3>
        <form method="post" action="addData.php">
          <input type="hidden" name="from" value="addBuilding">
          Enter the Building name<input type="text" name="name"/><hr/>
          Enter the Building information<input type="text" name="info"/><hr/>
          Enter the Building Latitude<input type="text" name="latitude"/><hr/>
          Enter the Building Longitude<input type="text" name="longitude"/><hr/>
          Enter the Question for the Building <input type="text" name="question"/><hr/>
          <label for="building"><b>Select three building to be the wrong answers:</b></label>
          <select name="wBuilding1" required id="buildingList">
            <?php dropdownBuildings();  ?>
          </select>
          <select name="wBuilding2" required id="buildingList">
            <?php  dropdownBuildings();  ?>
          </select>
          <select name="wBuilding3" required id="buildingList">
            <?php  dropdownBuildings();  ?>
          </select>
          <input type="submit"  name="addBuilding" value="Add Building"/>
        </form>


        <!--
      <h3>Remove a building </h3>
      <form method="post" action="addData.php">
        <input type="hidden" name="from" value="removeBuilding">
        <label for="building"><b>Select the Building to Remove:</b></label>
        <select name="buildingID" required id="buildingList">
          <?php
          //dropdownBuildings();
          ?>
        <input type="submit"  name="removeBuilding" value="Remove Building"/>
      </form>
      -->
    </div>
  </div>




  <div id="Cycles" class="tabcontent">
    <h2>Cycles</h2>
    <div>
      <?php
      $loop = 0;
      $maxloop=0;

      $sql = "SELECT * FROM cycleGroup";
      $result = $conn->query($sql);
      if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
          //echo "<h3>Cycle ".$row["cycleID"].": ".$row["position"]."</h3>";
          if ($row["cycleID"]>$maxloop) {
            $maxloop=$row["cycleID"]; }
        }
      }else{  echo ""; }


      while ($loop <= $maxloop) {
        $sql = "SELECT * FROM cycleGroup WHERE cycleID = ".$loop;
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo "<h3>Cycle ".$row["cycleID"].": ".$row["cName"]."</h3>";
          }
        }else{  echo ""; }


        echo "<table><tr>";
        $sql = "SELECT buildingCycle.*, building.name FROM buildingCycle, building WHERE building.buildingID=buildingCycle.buildingID AND buildingCycle.cycleID = ".$loop." ORDER BY buildingCycle.position";
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo "<td>Location ".$row["position"].": ".$row["name"]."</td>";
          }
        }else{  echo ""; }
        echo "</tr></table>";
        $loop = $loop+1;
      }

      ?>
      </div>

       <div id="AddButton5">
         <button onclick="addVis('AddSection5')">Add a New Cycle</button>
       </div>

       <!-- Section to add and remove buildings from the database -->
       <div id="AddSection5">
         <h3>Add a new cycle </h3>
         <form method="post" action="addData.php">
           <input type="hidden" name="from" value="addCycle">
           Enter the cycle name<input type="text" name="name"/><hr/>

           <label for="building"><b>Select a building to add to the cycle:</b></label>
           <select name="buildingID1" required id="buildingList">
            <option value='0'>Select a building...</option>
            <?php dropdownBuildings(); ?>
            </select>
           <label for="building"><b>Select a building to add to the cycle:</b></label>
           <select name="buildingID2" required id="buildingList">
            <option value='0'>Select a building...</option>
            <?php dropdownBuildings(); ?>
            </select>
           <label for="building"><b>Select a building to add to the cycle:</b></label>
           <select name="buildingID3" required id="buildingList">
            <option value='0'>Select a building...</option>
            <?php dropdownBuildings(); ?>
            </select>
           <label for="building"><b>Select a building to add to the cycle:</b></label>
           <select name="buildingID4" required id="buildingList">
            <option value='0'>Select a building...</option>
            <?php dropdownBuildings(); ?>
            </select>
           <label for="building"><b>Select a building to add to the cycle:</b></label>
           <select name="buildingID5" required id="buildingList">
            <option value='0'>Select a building...</option>
            <?php dropdownBuildings(); ?>
            <option value='0'>End Cycle</option>
            </select>
           <label for="building"><b>Select a building to add to the cycle:</b></label>
           <select name="buildingID6" required id="buildingList">
            <option value='0'>Select a building...</option>
            <?php dropdownBuildings(); ?>
            <option value='0'>End Cycle</option>
            </select>
           <label for="building"><b>Select a building to add to the cycle:</b></label>
           <select name="buildingID7" required id="buildingList">
            <option value='0'>Select a building...</option>
            <?php dropdownBuildings(); ?>
            <option value='0'>End Cycle</option>
            </select>
            <label for="building"><b>Select a building to add to the cycle:</b></label>
            <select name="buildingID8" required id="buildingList">
             <option value='0'>Select a building...</option>
             <?php dropdownBuildings(); ?>
             <option value='0'>End Cycle</option>
             </select>
           <label for="building"><b>Select a building to add to the cycle:</b></label>
           <select name="buildingID9" required id="buildingList">
            <option value='0'>Select a building...</option>
            <?php dropdownBuildings(); ?>
            <option value='0'>End Cycle</option>
            </select>
           <input type="submit"  name="addBuilding" value="Add Cycle"/>
         </form>
      </div>
    </div>

      <button onclick="window.location.href = 'logout.php';">Logout</button>
  </body>
</html>
