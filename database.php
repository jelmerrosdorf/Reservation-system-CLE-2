<?php

// General settings for database
$host = "localhost";
$database = "rssystem";
$user = "root";
$password = "";

$db = mysqli_connect($host, $user, $password, $database)
or die("Error: " . mysqli_connect_error());
