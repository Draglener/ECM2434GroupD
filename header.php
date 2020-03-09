<!-- 
Author: Annelise Travis and Keith Harrison 
Last updated: 09/03 13:24
-->
<?php
//Creates the header for the student page, specifies which other pages can be accessd from this page
echo "<div class='header'>
  <ul class='topnav' id='myNav'>
  <li><a href='FAQ.php'>FAQ</a></li>
  <li><a href='scoreboard.php'>Scoreboard</a></li>
    <p id='logo'>  <a href='map_code.php'>
<img class='header_image' src='images/findExeterLogo.png'></a></p>
  <li><a href='qr.php'>Scan QR</a></li>
  <div class='dropdown'>
  <li onclick='toggle()' class='dropbtn'>Logout</li>
 <div id='drop'  class='dropdown-content'>
 <li><a href='logout-student.php?from=1'>Reset Location</a></li>
 <li><a href='logout-student.php?from=2'>Save Location</a></li>
 </div>
  </div>
  </ul>
  </div>";
  
  echo "<script>
  function toggle() {
  var x = document.getElementById('drop');
  var y = document.getElementsByClassName('container');
  if (x.style.display === 'none') {
    x.style.display = 'block';
	y.item(0).style.zIndex='-1';
	x.style.zIndex='1';
  } else {
    x.style.display = 'none';
	y.item(0).style.zIndex='1';
	x.style.zIndex='-1';
  }
}

  </script>";
  

?>
