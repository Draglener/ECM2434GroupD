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
		<link rel="shortcut icon" type="image/png" href="findExeterLogo.png"/>
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
<h2 dir="ltr">
    Terms and Conditions
</h2>
<p dir="ltr">
    Welcome to findExeter!
</p>
<p dir="ltr">
    These terms and conditions outline the rules and regulations for the use of
    findExeter's Website, located at
    secondchancelarp.co.uk/ECM2434GroupD-master/ECM2434GroupD-master.
</p>

<p dir="ltr">
    The following terminology applies to these Terms and Conditions, Privacy
    Statement and Disclaimer Notice and all Agreements: "Client", "You" and
    "Your" refers to you, the person log on this website and compliant to the
    Company’s terms and conditions. "The Company", "Ourselves", "We", "Our" and
    "Us", refers to our Company. "Party", "Parties", or "Us", refers to both
    the Client and ourselves. All terms refer to the offer, acceptance and
    consideration of payment necessary to undertake the process of our
    assistance to the Client in the most appropriate manner for the express
    purpose of meeting the Client’s needs in respect of provision of the
    Company’s stated services, in accordance with and subject to, prevailing
    law of Netherlands. Any use of the above terminology or other words in the
    singular, plural, capitalization and/or he/she or they, are taken as
    interchangeable and therefore as referring to same.
</p>
<h3 dir="ltr">
    Cookies
</h3>
<p dir="ltr">
    We employ the use of cookies. By accessing findExeter, you agreed to use
    cookies in agreement with the findExeter's Privacy Policy.
</p>
<p dir="ltr">
    Most interactive websites use cookies to let us retrieve the user’s details
    for each visit. Cookies are used by our website to enable the functionality
    of certain areas to make it easier for people visiting our website. Some of
    our affiliate/advertising partners may also use cookies.
</p>
<h3 dir="ltr">
    License
</h3>
<p dir="ltr">
    Unless otherwise stated, findExeter and/or its licensors own the
    intellectual property rights for all material on findExeter. All
    intellectual property rights are reserved. You may access this from
    findExeter for your own personal use subjected to restrictions set in these
    terms and conditions.
</p>
<p dir="ltr">
    You must not:
</p>
<ul>
    <li dir="ltr">
        <p dir="ltr">
            Republish material from findExeter
        </p>
    </li>
    <li dir="ltr">
        <p dir="ltr">
            Sell, rent or sub-license material from findExeter
        </p>
    </li>
    <li dir="ltr">
        <p dir="ltr">
            Reproduce, duplicate or copy material from findExeter
        </p>
    </li>
    <li dir="ltr">
        <p dir="ltr">
            Redistribute content from findExeter
        </p>
    </li>
</ul>
<p dir="ltr">
    This Agreement shall begin on the date hereof.
</p>
<p dir="ltr">
    Parts of this website offer an opportunity for users to post and exchange
    opinions and information in certain areas of the website. findExeter does
    not filter, edit, publish or review Comments prior to their presence on the
    website. Comments do not reflect the views and opinions of findExeter,its
    agents and/or affiliates. Comments reflect the views and opinions of the
    person who post their views and opinions. To the extent permitted by
    applicable laws, findExeter shall not be liable for the Comments or for any
    liability, damages or expenses caused and/or suffered as a result of any
    use of and/or posting of and/or appearance of the Comments on this website.
</p>
<p dir="ltr">
    findExeter reserves the right to monitor all Comments and to remove any
    Comments which can be considered inappropriate, offensive or causes breach
    of these Terms and Conditions.
</p>
<p dir="ltr">
    You warrant and represent that:
</p>
<ul>
    <li dir="ltr">
        <p dir="ltr">
            You are entitled to post the Comments on our website and have all
            necessary licenses and consents to do so;
        </p>
    </li>
    <li dir="ltr">
        <p dir="ltr">
            The Comments do not invade any intellectual property right,
            including without limitation copyright, patent or trademark of any
            third party;
        </p>
    </li>
    <li dir="ltr">
        <p dir="ltr">
            The Comments do not contain any defamatory, libelous, offensive,
            indecent or otherwise unlawful material which is an invasion of
            privacy
        </p>
    </li>
    <li dir="ltr">
        <p dir="ltr">
            The Comments will not be used to solicit or promote business or
            custom or present commercial activities or unlawful activity.
        </p>
    </li>
</ul>
<p dir="ltr">
    You hereby grant findExeter a non-exclusive license to use, reproduce, edit
    and authorize others to use, reproduce and edit any of your Comments in any
    and all forms, formats or media.
</p>
<h3 dir="ltr">
    Hyperlinking to our Content
</h3>
<p dir="ltr">
    The following organizations may link to our Website without prior written
    approval:
</p>
<ul>
    <li dir="ltr">
        <p dir="ltr">
            Government agencies;
        </p>
    </li>
    <li dir="ltr">
        <p dir="ltr">
            Search engines;
        </p>
    </li>
    <li dir="ltr">
        <p dir="ltr">
            News organizations;
        </p>
    </li>
    <li dir="ltr">
        <p dir="ltr">
            Online directory distributors may link to our Website in the same
            manner as they hyperlink to the Websites of other listed
            businesses; and
        </p>
    </li>
    <li dir="ltr">
        <p dir="ltr">
            System wide Accredited Businesses except soliciting non-profit
            organizations, charity shopping malls, and charity fundraising
            groups which may not hyperlink to our Web site.
        </p>
    </li>
</ul>
<p dir="ltr">
    These organizations may link to our home page, to publications or to other
    Website information so long as the link: (a) is not in any way deceptive;
    (b) does not falsely imply sponsorship, endorsement or approval of the
    linking party and its products and/or services; and (c) fits within the
    context of the linking party’s site.
</p>
<p dir="ltr">
    We may consider and approve other link requests from the following types of
    organizations:
</p>
<ul>
    <li dir="ltr">
        <p dir="ltr">
            commonly-known consumer and/or business information sources;
        </p>
    </li>
    <li dir="ltr">
        <p dir="ltr">
            dot.com community sites;
        </p>
    </li>
    <li dir="ltr">
        <p dir="ltr">
            associations or other groups representing charities;
        </p>
    </li>
    <li dir="ltr">
        <p dir="ltr">
            online directory distributors;
        </p>
    </li>
    <li dir="ltr">
        <p dir="ltr">
            internet portals;
        </p>
    </li>
    <li dir="ltr">
        <p dir="ltr">
            accounting, law and consulting firms; and
        </p>
    </li>
    <li dir="ltr">
        <p dir="ltr">
            educational institutions and trade associations.
        </p>
    </li>
</ul>
<p dir="ltr">
    We will approve link requests from these organizations if we decide that:
    (a) the link would not make us look unfavorably to ourselves or to our
    accredited businesses; (b) the organization does not have any negative
    records with us; (c) the benefit to us from the visibility of the hyperlink
    compensates the absence of findExeter; and (d) the link is in the context
    of general resource information.
</p>
<p dir="ltr">
    These organizations may link to our home page so long as the link: (a) is
    not in any way deceptive; (b) does not falsely imply sponsorship,
    endorsement or approval of the linking party and its products or services;
    and (c) fits within the context of the linking party’s site.
</p>
<p dir="ltr">
    If you are one of the organizations listed in paragraph 2 above and are
    interested in linking to our website, you must inform us by sending an
    e-mail to findExeter. Please include your name, your organization name,
    contact information as well as the URL of your site, a list of any URLs
    from which you intend to link to our Website, and a list of the URLs on our
    site to which you would like to link. Wait 2-3 weeks for a response.
</p>
<p dir="ltr">
    Approved organizations may hyperlink to our Website as follows:
</p>
<ul>
    <li dir="ltr">
        <p dir="ltr">
            By use of our corporate name; or
        </p>
    </li>
    <li dir="ltr">
        <p dir="ltr">
            By use of the uniform resource locator being linked to; or
        </p>
    </li>
    <li dir="ltr">
        <p dir="ltr">
            By use of any other description of our Website being linked to that
            makes sense within the context and format of content on the linking
            party’s site.
        </p>
    </li>
</ul>
<p dir="ltr">
    No use of findExeter's logo or other artwork will be allowed for linking
    absent a trademark license agreement.
</p>
<h3 dir="ltr">
    iFrames
</h3>
<p dir="ltr">
    Without prior approval and written permission, you may not create frames
    around our Webpages that alter in any way the visual presentation or
    appearance of our Website.
</p>
<h3 dir="ltr">
    Content Liability
</h3>
<p dir="ltr">
    We shall not be hold responsible for any content that appears on your
    Website. You agree to protect and defend us against all claims that is
    rising on your Website. No link(s) should appear on any Website that may be
    interpreted as libelous, obscene or criminal, or which infringes, otherwise
    violates, or advocates the infringement or other violation of, any third
    party rights.
</p>
<h3 dir="ltr">
    Your Privacy
</h3>
<p dir="ltr">
    Please read Privacy Policy
</p>
<h3 dir="ltr">
    Reservation of Rights
</h3>
<p dir="ltr">
    We reserve the right to request that you remove all links or any particular
    link to our Website. You approve to immediately remove all links to our
    Website upon request. We also reserve the right to amen these terms and
    conditions and it’s linking policy at any time. By continuously linking to
    our Website, you agree to be bound to and follow these linking terms and
    conditions.
</p>
<h3 dir="ltr">
    Removal of links from our website
</h3>
<p dir="ltr">
    If you find any link on our Website that is offensive for any reason, you
    are free to contact and inform us any moment. We will consider requests to
    remove links but we are not obligated to or so or to respond to you
    directly.
</p>
<p dir="ltr">
    We do not ensure that the information on this website is correct, we do not
    warrant its completeness or accuracy; nor do we promise to ensure that the
    website remains available or that the material on the website is kept up to
    date.
</p>
<h3 dir="ltr">
    Disclaimer
</h3>
<p dir="ltr">
    To the maximum extent permitted by applicable law, we exclude all
    representations, warranties and conditions relating to our website and the
    use of this website. Nothing in this disclaimer will:
</p>
<ul>
    <li dir="ltr">
        <p dir="ltr">
            limit or exclude our or your liability for death or personal
            injury;
        </p>
    </li>
    <li dir="ltr">
        <p dir="ltr">
            limit or exclude our or your liability for fraud or fraudulent
            misrepresentation;
        </p>
    </li>
    <li dir="ltr">
        <p dir="ltr">
            limit any of our or your liabilities in any way that is not
            permitted under applicable law; or
        </p>
    </li>
    <li dir="ltr">
        <p dir="ltr">
            exclude any of our or your liabilities that may not be excluded
            under applicable law.
        </p>
    </li>
</ul>
<p dir="ltr">
    The limitations and prohibitions of liability set in this Section and
    elsewhere in this disclaimer: (a) are subject to the preceding paragraph;
    and (b) govern all liabilities arising under the disclaimer, including
    liabilities arising in contract, in tort and for breach of statutory duty.
</p>
<p dir="ltr">
    As long as the website and the information and services on the website are
    provided free of charge, we will not be liable for any loss or damage of
    any nature.
</p>
<br/>
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
