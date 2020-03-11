<?php
session_start();
/*
Author: Jasmine West and Keith Harrison 
Last updated: 09/03 13:24
*/

// remove all session variables
session_unset();
// destroy the session
session_destroy();
header('Location: index.php');
?>

