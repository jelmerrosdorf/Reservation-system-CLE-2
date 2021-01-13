<?php

require_once "database.php";

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');

if (!empty($name)) {
if (!empty($email)) {

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "rssystem";

// connect to database

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);


if (mysqli_connect_error()) {
    die ('Connect error (' . mysqli_connect_errno() . ') '
        . mysqli_connect_error() );
}
else {
    $sql = "INSERT INTO appointments (name, email)
    values ('$name', '$email')";

    if ($conn->query ($sql)) {
        echo "Je afspraak is goed doorgekomen!";
    }
else {
    echo "Error: " . $sql ."
    " . $conn->error;
}
$conn->close();
}
}
else{
    echo "Naam mag niet leeg zijn!";
    die();
}
}
else{
    echo "Email mag niet leeg zijn!";
    die();
}



