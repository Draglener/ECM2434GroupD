<?php
session_start();
require('connection.php');
$sql = "SELECT * from user WHERE userID = ".$_SESSION['studentID'];
$result =  $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()){
    $currentPoints = $row['points'];
  }
}
?>

<!-- Author: Keith Harrison
Last updated: 02/03 14:34
Created terms and condition page 
-->
<!doctype html>
<html>
	<head>
      <meta charset="UTF-8">
    <title>Terms</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  	<link href="style_sheet.css" rel="stylesheet" type="text/css">
	</head>

	<body class="body" id="body">
<form action="#" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">

<input type="checkbox" name="checkbox" value="check" id="agree" /> I have read and agree to the <a href="https://www.secondchancelarp.co.uk/ECM2434GroupD-master/ECM2434GroupD-master/terms.php">Terms and Conditions and Privacy Policy</a>
<input type="submit" name="submit" value="submit" />

</form>
		<div>
			  <a href="FAQ.php"><input type="button" id="homeButton" value="FAQ"></a>
			  <input type="text" id="pointsDisplayTag" size="30" maxlength="20" disabled>
		</div>

		<div class="informationDisplay" id="informationDisplay">
		 		<a href="map_code.php"><input type="button" id="closeButton" value="&#10006;"></a>
		    <a id= "informationTitle"></i>
             Terms</a>
		</div>

        <div id="informationText">
					<p><h2>Terms and Conditions</h2></p>
					<p>Welcome to findExeter!</p>
					<p>These terms and conditions outline the rules and regulations for the use of findExeter's Website, located at secondchancelarp.co.uk/ECM2434GroupD-master/ECM2434GroupD-master.</p>
					<p>By accessing this website we assume you accept these terms and conditions. Do not continue to use findExeter if you do not agree to take all of the terms and conditions stated on this page. Our Terms and Conditions were created with the help of the Terms And Conditions Generator and the Free Terms & Conditions Generator.</p>
					<p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: "Client", "You" and "Your" refers to you, the person log on this website and compliant to the Company’s terms and conditions. "The Company", "Ourselves", "We", "Our" and "Us", refers to our Company. "Party", "Parties", or "Us", refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client’s needs in respect of provision of the Company’s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p>
					<p><b>Cookies</b></p>
					<p>We employ the use of cookies. By accessing findExeter, you agreed to use cookies in agreement with the findExeter's Privacy Policy.</p>
					<p>Most interactive websites use cookies to let us retrieve the user’s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.</p>
					<p><b>License</b></p>
					<p>Unless otherwise stated, findExeter and/or its licensors own the intellectual property rights for all material on findExeter. All intellectual property rights are reserved. You may access this from findExeter for your own personal use subjected to restrictions set in these terms and conditions.</p>
					<p>You must not:</p> 				
					<ul>
  					<li>Republish material from findExeter</li>
  					<li>Sell, rent or sub-license material from findExeter</li>
  					<li>Reproduce, duplicate or copy material from findExeter</li>
					<li>Redistribute content from findExeter</li>
					</ul>  
					<p>This Agreement shall begin on the date hereof.</p>
					<p>Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. findExeter does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of findExeter,its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws, findExeter shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.</p>
					<p>findExeter reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.</p>
					<p>You warrant and represent that:</p>
					<ul>
  					<li>You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;</li>
  					<li>The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;</li>
  					<li>The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy</li>
					<li>The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.</li>
					</ul> 
					<p> You hereby grant findExeter a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.</p>
					<p><b>Hyperlinking to our Content</b></p>
					<p>The following organizations may link to our Website without prior written approval:</p>
					<ul>
  					<li>Government agencies;</li>
  					<li>Search engines;</li>
  					<li>News organizations;</li>
					<li>Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and</li>
  					<li>System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.</li>
					</ul> 
					<p>These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party’s site.</p>
 
</div>

		 <div style="margin:10px;">
		  	<div id="button"><a href="Scoreboard.php"><input type="button" id="ScoreBoardButton" value="&#8682; ScoreBoard"></a></div>
		    <a data-ga-click="Footer, go to terms, text:terms" href="https://www.secondchancelarp.co.uk/ECM2434GroupD-master/ECM2434GroupD-master/terms.php">Terms</a>
			 <div id="button"><a href="qr.php"><img type="button" src="qrButton.jpg" alt="QRButton" class="QRButton"></a></div>
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
