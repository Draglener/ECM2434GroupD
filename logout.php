<?php
session_start();
// remove all session variables
session_unset();
// destroy the session
session_destroy();
header('Location: index.php');
?>

<!-- 
Author: Jasmine West and Keith Harrison 
Last updated: 09/03 13:24
-->
