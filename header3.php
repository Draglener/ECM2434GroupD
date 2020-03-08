<?php
echo "<div class='header'>
  <ul class='topnav' id='myNav'>
  <li></li>
  <li></li>
  <p id='logo'>  <img class='header_image' src='images/findExeterLogo.png'></p>
  <li></li>
   <div class='dropdown'>
  <li onclick='toggle()' class='dropbtn'>Logout</li>
 <div id='drop' onclick='toggle()' class='dropdown-content'>
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




