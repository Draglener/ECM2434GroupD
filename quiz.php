<?php
session_start();

/*
Author: Katie Jones, Anneliese Travis and Piranavie Thangasuthan
Last updated: 25/02 15:12
*/

?>
<!DOCTYPE html>
<?php
require('connection.php');
$session = $_SESSION['appuser'];
if ($_SESSION['status'] == "student"){
}else{
  header('Location: homepage.php');
}

$sql = "SELECT * from user WHERE userID = ".$_SESSION['studentID'];
$result =  $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()){
	  $position = $row['location'];
	  $cycle = $row['currentCycle'];
  }
}

if ($position == 9){
	$nextLocation = 0;
} else {
	$nextLocation = $position + 1;
	
}
$sql = "SELECT buildingID from buildingCycle WHERE position = ".$nextLocation." AND cycleID = ".$cycle;
$result =  $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()){
	  $building = $row['buildingID'];
  }
}


$sql = "SELECT * from question WHERE correctBuildingID = ".$building." LIMIT 1";
$result =  $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()){
    $id = $row['questionID'];
    $answer = $row['correctBuildingID'];
    $wrong1 = $row['wrongBuilding1'];
    $wrong2 = $row['wrongBuilding2'];
    $wrong3 = $row['wrongBuilding3'];
	$q = $row['question'];
    $question = array($id, $answer, $wrong1, $wrong2, $wrong3, $q);
	
  }

} else {
  echo $sql." ".$conn->error;
}

$sql = "SELECT * from building WHERE buildingID = ".$answer;
$result =  $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()){
	  $answerName = $row['name'];
  }
}

$sql = "SELECT * from building WHERE buildingID = ".$wrong1;
$result =  $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()){
	  $wrong1Name = $row['name'];
  }
}

$sql = "SELECT * from building WHERE buildingID = ".$wrong2;
$result =  $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()){
	  $wrong2Name = $row['name'];
  }
}

$sql = "SELECT * from building WHERE buildingID = ".$wrong3;
$result =  $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()){
	  $wrong3Name = $row['name'];

  }
}
$names = array("0", $answerName, $wrong1Name, $wrong2Name, $wrong3Name);
$sql = "SELECT * from user WHERE userID = ".$_SESSION['studentID'];
$result =  $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()){
    $currentPoints = $row['points'];
  }
}
$sql = "SELECT * from user WHERE userID = ".$_SESSION['studentID'];
$result =  $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()){
    $currentQuizDone = $row['quizDone'];
  }
}
?>

<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/png" href="images/findExeterLogo.png"/>
    <title>Quiz</title>
    <link href="style_sheet.css" rel="stylesheet" type="text/css">

	<style>
	#quiz{
		display:grid;
	}
	</style>
  </head>
	   <?php
  include('header3.php');
  ?>
  <body>

<a class= "title">Quiz</a>
    <div class="container" id="quiz">
	
	<p id="error"></p>
	</div>
	<p class="score"><?php echo $_SESSION['username']; ?>'s current score: <span id="points"><span> Points </p>

	<script>
var currentPoi = <?php echo $currentPoints; ?>;
var currentquizDone = <?php echo $currentQuizDone; ?>;
if (currentquizDone==1 ){
	window.location.href = 'map_code.php';
}
document.getElementById('points').innerHTML = currentPoi;
var points = 3;

/**
 * Loads the next question
 *
 * @param numb	tracks the number of the output
 */
function next(numb){
		  switch(numb) {
  case 1:
    numb++;
    break;
  case 2:
    numb++;
    break;
  case 3:
   numb++;
    break;
  default:
    numb = 1;
}
return numb;
}
    var question = <?php echo json_encode($question); ?>;
	var names = <?php echo json_encode($names); ?>;
	var nextLoc = <?php echo $nextLocation; ?>;

/**
 * Creates the question and multiple choice answers. 
 */	
function create() {
    var numb = Math.floor( Math.random() * 3 )+1;
	console.log(question[5]);
      var quiz = document.getElementById('quiz');
	  
      var bt1 = document.createElement('button'); 
	  bt1.setAttribute('id',  +question[numb]); 	    
      bt1.setAttribute('value', +question[numb]);
	  bt1.setAttribute('onclick', "validate(this.value);");
      bt1.setAttribute('class', 'unchecked');
	  bt1.onclick = function(){validate(this.value);};
	  var lb1 = document.createElement('label');
	  lb1.setAttribute('for', 'bt1');   
	  lb1.appendChild(document.createTextNode(names[numb])); 
	  
	  numb = next(numb);
	    
	  
	  var bt2 = document.createElement('button');
	  bt2.setAttribute('id',  +question[numb]);       
	  bt2.setAttribute('name',  +names[numb]); 
      bt2.setAttribute('value', +question[numb]);
      bt2.setAttribute('class', 'unchecked');
	  bt2.setAttribute('onclick', "validate(this.value);");
	  bt2.onclick = function(){validate(this.value);};
	  
	  var lb2 = document.createElement('label');
	  lb2.setAttribute('for', 'bt2');   
	  lb2.appendChild(document.createTextNode(names[numb])); 
	  
	  
	  numb = next(numb);
	  
	  var bt3 = document.createElement('button');
	  bt3.setAttribute('id',  +question[numb]); 	    
	  bt3.setAttribute('name',  +names[numb]); 
      bt3.setAttribute('value', +question[numb]);
      bt3.setAttribute('class', 'unchecked');
	  bt3.setAttribute('onclick', "validate(this.value);");
	  bt3.onclick = function(){validate(this.value);};
	  
	  var lb3 = document.createElement('label');
	  lb3.setAttribute('for', 'bt3');   
	  lb3.appendChild(document.createTextNode(names[numb])); 
	  
	  
	  numb = next(numb);
	  
	  var bt4 = document.createElement('button');
	  bt4.setAttribute('id',  +question[numb]); 	   
	  bt4.setAttribute('name',  +names[numb]); 
      bt4.setAttribute('value', +question[numb]);
      bt4.setAttribute('class', 'unchecked');
	  bt4.setAttribute('onclick', "validate(this.value);");
	  bt4.onclick = function(){validate(this.value);};
	  
	  var lb4 = document.createElement('label');
	  lb4.setAttribute('for', 'bt4');   
	  lb4.appendChild(document.createTextNode(names[numb])); 
	  
	  
      var q = document.createElement('p'); 
	  var text = document.createTextNode(question[5]);
     q.appendChild(text);
	 q.setAttribute('class', 'question');

      quiz.appendChild(q);
      quiz.appendChild(bt1);
	  bt1.appendChild(lb1);
      quiz.appendChild(bt2);
	  bt2.appendChild(lb2);
      quiz.appendChild(bt3);
	  bt3.appendChild(lb3);
	  quiz.appendChild(bt4);
	  bt4.appendChild(lb4);
	  document.getElementById("error").innerHTML = points + " points available to win."
  }
  create();
  
  /**
   * Validates the given answer to see if it is correct or incorrect and carrys out the appropriate response
   */
  function validate(answer){
	  if (answer == question[1]){
		  document.getElementById(answer).setAttribute('style', 'background-color:green;');
		  document.getElementById("error").innerHTML = "Correct - well done! You scored " + points + " points!"
		  setTimeout(function(){
			  window.location.href = 'quizValidate.php?points='+points+"&loc="+nextLoc;
         }, 1000);
		  
	  } else {
		  document.getElementById(answer).setAttribute('disabled', 'true');
		  document.getElementById(answer).setAttribute('style', 'background-color:red;');
		  points--;
		  document.getElementById("error").innerHTML = "Not quite - try again. " + points + " points available to win."
	  }
  }
    </script>
  </body>
    <?php 
	unset($_SESSION['apperror']);
    unset($_SESSION['error']);
	?>
</html>
