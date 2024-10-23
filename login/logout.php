<?php
session_start();
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session
header("Location: C:\xampp\htdocs\perspectiva\login\admin_login.php"); // Redirect to login page
exit();
?>
