<?php

require_once "database.php";

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$date = filter_input(INPUT_POST, 'date');
$time = filter_input(INPUT_POST, 'time');

if (!empty($name)) {
if (!empty($email)) {
if (!empty($date)) {
if (!empty($time)) {

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
    $sql = "INSERT INTO appointments (name, email, date, time)
    values ('$name', '$email', '$date', '$time')";

    // Confirm appointment
    if ($conn->query ($sql)) {
        $datumTekst = date('d-m-Y', strtotime($_POST['date']));
        echo "Je reservering is goed doorgekomen!" . "</br>";
        echo "Naam: " . $_POST['name'] . "</br>";
        echo "E-mailadres: " . $_POST['email'] . "</br>";
        echo "Datum: " . $datumTekst . "</br>";
        echo "Tijd:" . $_POST['time'] . "</br>";

    // if (isset($_POST['verven'])){
        // echo '☑ Verven';
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
}
else{
    echo "Datum mag niet leeg zijn!";
    die();
}
}
else{
    echo "Tijd mag niet leeg zijn!";
    die();
}




