function showResponsiveMenu() {
  var topNav = document.getElementById("myNav");
  if (topNav.className === "topnav")  {
    topNav.className += " responsive";
  }
  else {
    topNav.className = "topnav";
  }
}
