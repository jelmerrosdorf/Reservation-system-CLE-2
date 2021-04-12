<?php
session_start();
// This page is secured: if user isn't logged in, redirect to loginpage
if (!isset($_SESSION['loggedInUser'])) {
    header("Location: login.php");
    exit;
}

// Fix undefined variable $db
/** @var $db */

require_once "includes/database.php";

// Get data from db
$query = "SELECT * FROM appointments";
$result = mysqli_query($db, $query) or die ('Error: ' . $query);

// Loop through the data and show it in an array
$appointments = [];
while ($row = mysqli_fetch_assoc($result)) {
    $appointments[] = $row;
}

mysqli_close($db);
?>

<!doctype html>
<html lang="nl">
<head>
    <title>Afspraken</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Naam</th>
        <th>E-mailadres</th>
        <th>Datum</th>
        <th>Tijd</th>
    </tr>
    </thead>
    <tbody>
<!--  Foreach loop through the data to show it in a table  -->
    <?php foreach ($appointments as $appointment) { ?>
        <tr>
            <td><?= $appointment['id'] ?></td>
            <td><?= $appointment['name'] ?></td>
            <td><?= $appointment['email'] ?></td>
            <td><?= $appointment['date'] ?></td>
            <td><?= $appointment['time'] ?></td>
            <td><a href="edit.php?id=<?= $appointment['id'] ?>">Wijzig</a></td>
            <td><a href="delete.php?id=<?= $appointment['id'] ?>">Verwijder</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<a class="readpageappointment" href="appointmentpage.php">Maak een nieuwe afspraak</a>
</body>
</html>









