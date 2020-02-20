
<?php
  session_start();

  if ( isset($_SESSION['appuser'])){
    header('Location: MainScreen.php');
    $error=null;

  } else if( isset($_SESSION['apperror'] )){
    $error = $_SESSION['apperror'] ;
    echo $error;
    session_unset();
    session_destroy();
  }
?>

<html>
  <head>
    <script src="Validate.js"></script>
    <link href="style_sheet.css" rel='stylesheet' type='text/css'/>
    <title>Login</title>
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
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
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
      <div class="loginContent">
        <div class="TableHeader"><h1>Tutor Login</h1></div>
        <form name="loginForm" action="CheckLogin.php" method="post" onsubmit="return validateForm()">
        
        //this needs to be updated with a connection to the database
        <label for="tutor"><b>Select your tutor id?:</b></label>
        <select name="tutor" required>
         <option value='1'>Jonathan Fieldsend</option><option value='2'>Edward Keedwell</option>        </select>
        <p></p>

        <p>Please enter your password:</p>
        <input type="password" name="password" value="">
        <p></p>
        <input type="submit" value="Login">
        </form>
      </div>
  </body>
</html>
