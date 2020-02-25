<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
     <title>Scoreboard</title>

     <style>
     table {
           width: -webkit-fill-available;
       border-collapse: collapse;
       margin:15px;
       table-layout: auto;
     }

     th {

       font-size: 1.5em;
       padding: 5px;
       text-align: left;

       width: auto;
       text-shadow:1px 1px 2px black;
       font-weight: lighter;
     }
     tr {
  font-size: 1.3em;
       font-family: thryn;
     }
td, th {
  width: 25%;
}
@media screen and (max-width: 600px) {
  th {

    font-size: 1.5em;
    padding: 5px;
    text-align: left;
    width: auto;
    text-shadow:1px 1px 2px black;
    font-weight: lighter;
  }
  tr {
    font-size: unset ;
    font-family: thryn;
  }
}
     table, td, th {
       border: 1px solid black;
       padding: 5px;
     }
     button, input[type=submit] form > button. td > button{


     }
  td{
    width: auto;
  }
form{
  display: inline;
  padding:0px;
}
   </style>
   </head>

   <body style="height:100%;">
         
       <p class="error"><?php echo $_SESSION['error']; ?></p>
    <!-- database results will be displayed here -->
  
      <?php
      require('connection.php');
      $sql = "SELECT * FROM tutorGroup";
      $result = $conn->query($sql);

      //creating a table for the results
      echo "<div class='main'><table>
      <tr>
      <th>Tutor ID</th>
      <th>Tutor Name</th>
      <th>Group Score</th>
      <th>Current Building</th>
      </tr>";

      //populating table
      while($row = $result->fetch_assoc()){
        $id = intval($row['tutorID']);
        echo "<tr>";
		echo "<td>"  . $row['score'] . "</td>";
		echo "<td>".$row['fName']." ".$row['lName']."</td>";
        echo "<td>"  . $row['score'] . "</td>";
        echo "<td>".$row['current_pos']."</td>";
        echo "</tr>";
      }
      echo "</table></div>";
      mysqli_close($con);
      ?>

    </body>
    <?php unset($_SESSION['error']); ?>
</html>
