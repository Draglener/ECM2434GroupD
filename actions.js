/**
 * Implements two functions to control visibility on the game master pages depending on the tab
 *
 *@author Jasmine West & Annelise Travis
 *@version 09/03/2020 13:38
 */

/**
 * Changes the visibility (wether or not it appears) of a given element.
 *
 * @param visName The nameof the element that needs to have its visibility changed
 */
function addVis(visName){
  var x = document.getElementById(visName);
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }

/**
 * Ensures the right elements are visible on the right tab on the game master page.
 *
 * @param evt   Checks the right event has occurred
 * @param tab   Checks which tab is open
 * @param admin A check value to check if the current session is an administrator.
 */
function openPage(evt, tab, admin) {
  document.getElementById("AddButton").style.display = "none";
  document.getElementById("AddSection").style.display = "none";
  document.getElementById("AddSection2").style.display = "none";
  document.getElementById("AddSection3").style.display = "none";
  document.getElementById("AddSection4").style.display = "none";
  document.getElementById("AddSection5").style.display = "none";
  document.getElementById("AddButton2").style.display = "none";
  document.getElementById("AddButton3").style.display = "none";
  document.getElementById("AddButton4").style.display = "none";
  document.getElementById("AddButton5").style.display = "none";
  document.getElementById("logout1").style.display = "none";
  document.getElementById("logout2").style.display = "none";
  document.getElementById("logout3").style.display = "none";
  document.getElementById("logout4").style.display = "none";
  document.getElementById("logout5").style.display = "none";

  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tab).style.display = "block";
  evt.currentTarget.className += " active";
  if (admin == 0 && tab== 'Groups') {
      document.getElementById("AddButton").style.display = "block";
	  document.getElementById("logout").style.display = "none";
	  document.getElementById("logout").style.display = "block";
  }
  if (admin == 0 && tab== 'Students') {
      document.getElementById("AddButton2").style.display = "block";
	  document.getElementById("logout").style.display = "none";
	  document.getElementById("logout2").style.display = "block";
  }
  if (admin == 0 && tab== 'Rooms') {
      document.getElementById("AddButton3").style.display = "block";
	  document.getElementById("logout").style.display = "none";
	  document.getElementById("logout3").style.display = "block";
  }
  if (admin == 0 && tab== 'Buildings') {
      document.getElementById("AddButton4").style.display = "block";
	  document.getElementById("logout").style.display = "none";
	  document.getElementById("logout4").style.display = "block";
  }
  if (admin == 0 && tab== 'Cycles') {
      document.getElementById("AddButton5").style.display = "block";
	  document.getElementById("logout").style.display = "none";
	  document.getElementById("logout5").style.display = "block";
  }
}
