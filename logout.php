<?php
session_start();
session_destroy();

// Redirect to 'homepage' after logging out
header("Location: homepage.php");
exit;
