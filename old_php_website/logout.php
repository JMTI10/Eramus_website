<?php
/*
 * File:   logout.php
 * Author: Iuri Gonçalves
 * Date:   2018
 */
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: login.php");
exit;
?>
