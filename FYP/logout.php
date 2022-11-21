<?php
include("dprocess.php"); // db.php included in dprocess.php
// remove all session variables
session_unset();

// destroy the session
session_destroy();
header('Location: index.html');
exit;
?>