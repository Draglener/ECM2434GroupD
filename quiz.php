<?php
session_start();
require('connection.php');
$_SESSION['studentID'] = 2;
$sql = "SELECT * from user WHERE userID = ".$_SESSION['studentID'];
$result =  $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()){
	  $location = $row['location'];
  }
}
if ($location == 9){
	$nextLocation = 0;
} else {
	$nextLocation = $location + 1;
	
}
$sql = "SELECT * from question WHERE correctBuildingID = ".$nextLocation." LIMIT 1";
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

?>
<!-- Author: Katie Jones, Anneliese Travis and Piranavie Thangasuthan
Last updated: 25/02 15:12
Has the quiz linked to the PHP to change location of current user
and changed links from html pages to php
-->
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Quiz</title>
    <link href="style_sheet.css" rel="stylesheet" type="text/css">
	<style>
	#quiz{
		display:grid;
	}
	</style>
  </head>

  <body class="body" id="body">
    <div>
  	  <a href="faq.html"><input type="button" id="homeButton" value="FAQ"></a>
  	  <input type="text" id="pointsDisplayTag" value="&#9733; xxxx points" size="30" maxlength="20">
    </div>

    <div class="mapDisplay" id="mapDisplay">

    </div>

    <div class="quiz" id="quiz">
	<a id= "quizTitle">Quiz</a>
	<p id="error"></p>
	</div>
    	<a href="map_code.php"><input type="button" id="closeButton" value="&#10006;"></a>
        
    

    <div>
    	<a href="Scoreboard.html"><input type="button" id="ScoreBoardButton" value="&#8682; ScoreBoard"></a>
    </div>
	<script>
	var points = 3;
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
  function validate(answer){
	  if (answer == question[1]){
		  document.getElementById(answer).setAttribute('style', 'background-color:green;');
		  document.getElementById("error").innerHTML = "Correct - well done! You scored " + points + " points!"
		  setTimeout(function(){
			  window.location.href = 'quizValidate.php?points='+points+"&loc="+nextLoc;
         }, 3000);
		  
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
