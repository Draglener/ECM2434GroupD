<?php
echo "<div class='header'>
  <ul class='topnav' id='myNav'>
  <li></li>
  <li></li>
  <p id='logo'>  <img class='header_image' src='images/findExeterLogo.png'></p>
  <li></li>
  <li><a id='myBtn'>Logout</a></li>
  </ul>
  </div>";
echo '
<div id="myModal" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Logout</h2>
    </div>
    <div class="modal-body">
      <p>Would you like to reset your location?</p>
      <p id = yes>Yes</p>
      <p id = no>No</p>
    </div>
  </div>
</div>';
echo '<script type = "text/javascript">
var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
var yes = document.getElementById("yes");
var no = document.getElementById("no");


btn.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}

yes.onclick = function(){
    location.replace("logout-student.php?from=1");
}

no.onclick = function(){
   location.replace("logout-student.php?from=2");
    
}
</script>';


?>




