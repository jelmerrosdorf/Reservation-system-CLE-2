<?php
session_start();
// This page is secured: if user isn't logged in, redirect to 'login' page
if (!isset($_SESSION['loggedInUser'])) {
    header("Location: login.php");
    exit;
}

// Fix undefined variable $db & $appointment
/** @var $db */
/** @var $appointment */

require_once "includes/database.php";

// If submit is pressed
if (isset($_POST['submit'])) {

    // Delete selected appointment from db
    $query = "DELETE FROM appointments WHERE id = " . mysqli_escape_string($db, $_POST['id']);

    mysqli_query($db, $query) or die ('Error: ' . mysqli_error($db));

    mysqli_close($db);

    // Redirect to 'read' page
    header("Location: read.php");

} else if(isset($_GET['id'])) {
    // Get the given parameter for id, set variable
    $appointmentId = $_GET['id'];

    // Get the data from the db
    $query = "SELECT * FROM appointments WHERE id = " . mysqli_escape_string($db, $appointmentId);
    $result = mysqli_query($db, $query) or die ('Error: ' . $query);

    if(mysqli_num_rows($result) == 1)
    {
        $account = mysqli_fetch_assoc($result);
    }
    else {
        // Redirect to 'read' page when db returns more or less than one result
        header('Location: read.php');
        exit;
    }
} else {
    // If no id is present or submit isn't pressed
    header('Location: read.php');
    exit;
}
?>

<!doctype html>
<html lang="nl">
<head>
    <title>Afspraak verwijderen</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<form action="" method="post">
    <p>
        Weet je zeker dat je je afspraak wil verwijderen?
    </p>
    <input type="hidden" name="id" value="<?= $account['id'] ?>"/>
    <input type="submit" name="submit" value="Verwijderen"/>
</form>
</body>
</html>
