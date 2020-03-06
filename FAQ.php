<?php
session_start();
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
    $currentPoints = $row['points'];
  }
}
?>

<!-- Author: Piranavie Thangasuthan and Katie Jones and Keith Harrison
Last updated: 01/03 14:34
Adding score to page
-->

<html>
	<head>
      <meta charset="UTF-8">
    <title>FAQ</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  	<link href="style_sheet.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" type="image/png" href="findExeterLogo.png"/>
	</head>
	<?php
  include('header.php');
  ?>
	<body>
		
		<div class="container" id="informationDisplay">
		 		
		    <a class= "title"><i class="fa fa-info-circle"></i>
            Information</a>
			<div id="informationText">
					<p><h2>Health and Wellbeing</h2></p>
					<p><b>University Information</b></p>
					<p>The <a href="https://www.exeter.ac.uk/newstudents/supportandservices/yourhealthandwelfare/
">university website</a> has details on the campus GP, disability access, mental wellbeing services, and sexual health clinics.</p>
					<p><b>Nightline</b></p>
					<p>NightLine is a student run volunteer service that offers a free phone listening service from 8pm to 8am. You can call them for any reason. Their number can be found on your student card.</p>
					<p><b>Drop-ins</b></p>
					<p>The info-point hubs run 10 minute wellbeing drop-ins. This can be helpful to signpost you to other resources, or act as a check in with your wellbeing. Contact your college hub to find out the days and times they take place.</p>
					
					<p><h2>Study Areas</h2></p>
					<p><b>Study Spaces</b></p>
					<p>There are a number of study spaces across the university. Many buildings have an informal group study space. In addition, in the Forum there is study space in the library, the Santuary, and Devonshire House.</p>
					<p>During exams, the Forum seminar rooms are also opened as extra study spaces.</p>
					<p>Study spaces are split into different types based on the allowed level of noise. Quiet study areas must maintain a low level of noise and silent study spaces must remain silent. The Library consists of quiet and silent spaces. Make sure you respect the allowed level of noise in a study space and the other students studying.</p>
					
					<p><h2>The Guild</h2></p>
					<p><b>What is the Guild?</b></p>
					<p>The Guild is the student union. They represent the interests of the students to the university, facilitate over 250 societies, and offer advice to students on a number of issues. More information on the Guild can be found on <a href="https://www.exeterguild.org/">their website</a>.</p>
					<p><b>Devonshire House</b></p>
					<p>Attached to the Guild, Devonshire House contains food outlets, study spaces, and facilities for societies.</p>
					<p>There are three floors to Devonshire House. DH1 contains an informal study space with sofas, food outlets, and the offices of the Full Time Officers (who run the Guild). DH2 has more places to eat, the joint eXmedia, and Exepose office, and a bank. DH3 contains a silent study space called The Loft.</p>
					<p><b>Full-Time Officers</b></p>
					<p>The Guild has Full-Time Officers that are elected each year. They run the Guild and represent the interests of the students to the university. You can find more information on the Full-Time Officers <a href="https://www.exeterguild.org/officers/">here</a>.</p>
					<p><b>Societies</b></p>
					<p>The Guild is responsible for over 250 societies. This includes subject societies, music and drama, politics and activism, volunteering, special interest, and the Athletics Union. Societies are run by a committee elected by society members. Information about societies can be found on the <a href="https://www.exeterguild.org/societies/">Guild website</a> where you can also buy membership.</p>>
					
        </div>
		</div>


<script>
var currentPoi = <?php echo $currentPoints; ?>;
document.getElementById('pointsDisplayTag').value = currentPoi;
</script>
	</body>
<?php 
	unset($_SESSION['apperror']);
    unset($_SESSION['error']);
	?>
</html>
