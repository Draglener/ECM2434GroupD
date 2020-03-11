# findExeter

## Contents

- [Link](#link)
- [Description](#description)
- [Usage](#usage)
	- [Student](#student)
	- [Tutor](#tutor)
	- [Administrator](#administrator)
	- [Developer](#developer)
- [Requirements](#requirements)
- [Tests](#tests)
- [License](#license)

## Link

[findExeter](https://www.secondchancelarp.co.uk/findExeter/)

## Description

A web app game used to help new students find their way around Exeter campus, but it can be adapted with minimal changes to work for other campuses.

## Usage

### Student

Students must select the Student Login then input their IT user name and select their personal tutor.
They must agree to the terms and conditions to continue. 
Students must then select a cycle of buildings to traverse, they are then redirected to a quiz where they have to answer a multiple choice question, with 4 answers about a building correctly.
There are a maximum of 3 points available, for every incorrect guess they lose a point. 
Once the correct answer has been selected, the student is redirected to the map with a new marker highlighting the building where the next QR code is.
Scanning the next QR code redirects the student to the next question.
Scanning a bonus QR code gives a student a bonus 5 points.
Attempting to scan a QR code that isn't the next one will cause nothing to happen.
Students can select multiple tabs at the top of the screen to view the FAQ, Scoreboard, and QR scanner.
From the scoreboard screen, students can select a different cycle.
There is also a button to log out, students can select wether they wish to save or reset their position.
The map page can be accessed from another page by clicking the logo.

### Tutor

Tutors can log in to see a variety of statistics about their own group as well as the combined score of all the students in comparison with their colleagues.
On the students page Tutors can view the individual score and last recorded location for each student oras well as which cycle they are following. 
Tutors (or game masters) can add and remove students from this page.
The room page is used to record which rooms are in which building and allows tutors to add and remove rooms.
The buildings page does the same for buildings.
The cycles page allows tutors to create their own paths (or cycles) for students to follow.


### Administrator

The administrator account is a normal tutor account for all intents and purposes but with the added privilege of being able to add and remove tutors.

### Developer

For developers, the different files are named appropriately.
- **FAQ.php** - Code for the FAQ page
- **actions.js** - Code for ensuring the right divs are visible for the game master
- **addData.php** - Code for the game master to add and remove students, tutors, buildings, rooms, and cycles.
- **connection.php** - Code for connecting the client to the server
- **cycleUpdate.php** - Code for updating a players current cycle
- **header.php** - Code for the header of the page
- **header2.php** - ""				""
- **header3.php** - ""				""
- **homepage.php** - Code for the student login page
- **index.php** - Code for the index page
- **login.php** - Further code for the student login page
- **logout-students.php** - Code for students log out
- **logout.php** - Code for logging out
- **map_code.php** - Code to initialise maps and markers
- **pick.php** - Code for selecting a cycle
- **qr.php** - Code for the QR scanner and QR scanner page
- **quiz.php** - Code for the quiz page
- **quizUpdate.php** - Code to reset the location and restart the quiz
- **quizValidate.php** - Code to validate the quiz answer
- **resetCycle.php** - Code to reset the current cycle
- **scoreboard.php** - Code for the scoreboard page
- **style_sheet.css** - Style sheet for the student page
- **terms.php** - Code for the Ts&Cs
- **tutor-login-action.php** - Code for the Tutor Login
- **tutor-login.php** - Further code for the Tutor Login
- **tutor-main-screen.php** - Code for the tutor main screen
- **tutor-style.css** - Style sheet for the Tutor page

In order to adapt this app for another campus or site, the center variable in the map_code.php in order to center this on another campus.
All other data can be changed from the game master page, in order to remove buildings the commented out section in addData.php must be uncommented.
In order to replace the logo, change the image link in header.php, header2.php, and header3.php.

For information about the structure of the database please refer to the ER diagram.
![Image of Yaktocat](https://github.com/Draglener/ECM2434GroupD/blob/master/ER%20diagram.png)

## Requirements

In order to deploy new changes to the website, a server is required alongside a cross platform FTP application such as FileZilla. 

## Tests

The findExeter app comes with
[generic specifications](https://en.wikipedia.org/wiki/Specification_(technical_standard)). 
This is a method of testing that we have found effective.

Unit tests can be ran in selenium.

## Authors 

Jasmine West, Keith Harrison, Annelise Travis, Steven Reynolds, Katie Jones, and Piranavie Thangusthan
