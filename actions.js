/**
 * Implements two functions to control visibility on the game master pages depending on the tab
 *
 *@author Jasmine West & Annelise Travis
 *@version 09/03/2020 13:38
 */

/**
 * changes the visibility of a given div
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
 * ensures the right divs are visible on the right tab on the game master page
 */
function openPage(evt, tab, admin) {
  document.getElementById("AddButton").style.display = "none";
  document.getElementById("AddSection").style.display = "none";
  document.getElementById("AddSection2").style.display = "none";
  document.getElementById("AddSection3").style.display = "none";
  document.getElementById("AddSection4").style.display = "none";
  document.getElementById("AddSection5").style.display = "none";

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
  }
}
