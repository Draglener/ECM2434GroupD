<!DOCTYPE html>
<html>
  <head>
    <style>
      body {font-family: Arial, Helvetica, sans-serif; background-color: #98EAFA;}

      input{
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
      }

      select{
        width: 100%;
        height: 30px;
        padding: 12px 20px;
        display: inline-block;
        border: 1px solid #ccc;
      }


      button {
        background-color: black;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
      }

      img.peopleExploring{
        width: 200px;
        display: block;
        margin-left: auto;
        margin-right: auto;
      }

      img.people{
        width: 200px;
        display: block;
        margin-left: auto;
        margin-right: auto;
      }
    </style>
  </head>

  <body>
    <form name="loginForm" action="login.php">
     <div class="image">
        <img src="img_avatar2.png" alt="peopleExploring" class="peopleExploring">
      </div>

      <div class="userLogin">
        <label for="username"><b>University Username:</b></label>
        <input type="text" placeholder="Enter the name of your group" name="username" required>
          <p></p>

        <label for="tutor"><b>Tutor:</b></label>
        <select name="tutor" required>
         <?php
            //function to populate drop-down menu from distinct tutorvalues in database
            function dropdownOptions() {
              require('connection.php');
              $sql = "SELECT * FROM tutor_group";
              $result = $conn->query($sql);
              while($row = $result->fetch_assoc()){
                echo "<option value='".$row['tutorID']."'>".$row[$'fName']." ".$row[$'lName]."</option>";
              }
            }
            dropdownOptions();
            ?>
        </select>
        <p></p>

        <button type="submit" name="submit">Join</button>
      </div>

      <div class="image">
        <img src="img_avatar2.png" alt="people" class="people">
      </div>
    </form>
  </body>
</html>
