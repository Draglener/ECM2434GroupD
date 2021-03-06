<?php
session_start();
?>

<!DOCTYPE html>

<?php
//If a student is not logged in, this code redirects the user to the homepage
require('connection.php');
$session = $_SESSION['appuser'];
if ($_SESSION['status'] == "student"){
}else{
  header('Location: homepage.php');
}
?>

<!-- 
Author: Piranavie Thangasuthan and Katie Jones and Keith Harrison 
Last updated: 09/03 13:24
-->

<html>
	<head>
      <meta charset="UTF-8">
    <title>FAQ</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  	<link href="style_sheet.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" type="image/png" href="images/findExeterLogo.png"/>
	</head>
	
	<?php
  	include('header.php');
  	?>
	
	<body>
	 <a class= "title"><i class="fa fa-info-circle"></i>  Information</a>
		<div class="container" id="informationDisplay">
            		<!--
			Adds and formats all relevant information for the FAQ
			-->
			<div id="informationText">
				<p><h2>Health and Wellbeing</h2></p>
				<p><b>University Information</b></p>
				<p>The <a href="https://www.exeter.ac.uk/newstudents/supportandservices/yourhealthandwelfare/">university website</a> has details on the campus GP, disability access, mental wellbeing services, and sexual health clinics.</p>
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
				<p>There are three floors to Devonshire House. DH1 contains an informal study space with sofas, food outlets, and the offices of the Full Time Officers (who run the Guild). DH2 has more places to eat, the joint eXmedia and Exepose office, and a bank. DH3 contains a silent study space called The Loft.</p>
				<p><b>Full-Time Officers</b></p>
				<p>The Guild has Full-Time Officers that are elected each year. They run the Guild and represent the interests of the students to the university. You can find more information on the Full-Time Officers <a href="https://www.exeterguild.org/officers/">here</a>.</p>
				<p><b>Societies</b></p>
				<p>The Guild is responsible for over 250 societies. This includes subject societies, music and drama, politics and activism, volunteering, special interest, and the Athletics Union. Societies are run by a committee elected by society members. Information about societies can be found on the <a href="https://www.exeterguild.org/societies/">Guild website</a> where you can also buy membership.</p>
					
				<p><h2>Student Safety</h2></p>
				<p><b>Estate Patrol</b></p>
				<p>Estate Patrol are responsible for student safety on campus. They can deal with lock-outs, intruders, emergency maintance calls, noise complaints, and are trained in first aid. They are available 24/7 and can be called 01392 723999 for routine calls and 01392 722222 for emergencies.</p>
					
				<p><h2>Careers</h2></p>
				<p><b>The Career Zone</b></p>
				<p>The Career Zone runs talks, workshops, and much more to help you plan your career planning. You can login to your page in the Career Zone using your univeristy login and from there research opportunities. As well as skills workshops, there are internship and jobs listings you can search through.</p>
				<p><b>The Exeter Award</b></p>
				<p>The Exeter Award is an employability award given out by the university. It requires a minimum number of hours worked and attendence at a nubmer of personal development workshops and talks. It is a great addition to your CV.</p>
        		</div>
		</div>
	</body>

<?php 
unset($_SESSION['apperror']);
unset($_SESSION['error']);
?>
</html>
