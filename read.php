<?php

// Use the data from the db to put on this page
/** @var $db */
require_once "database.php";


//
$query = "SELECT * FROM appointments";
$result = mysqli_query($db, $query);

// save the appointments in an empty array
$appointments = [];
while($row = mysqli_fetch_assoc($result)) {
    $appointments[] = $row;
}

// close db connection
mysqli_close($db);
?>

<!doctype html>
<html lang="nl">
<head>
    <title>CutKapsel</title>
    <meta charset="utf-8"/>
    <link   />  // css goes here
</head>
<body>
<h1>Afspraken voor Chris</h1>
<table>
    <thead>
    <tr>
        <th></th>
        <th>#</th>
        <th>Naam</th>
        <th>Emailadres</th>
        <th>Datum</th>
        <th>Tijd</th>
        <th colspan="2"></th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <td colspan="9">Gemaakte afspraken</td>
    </tr>
    </tfoot>

    // Table to show the appointments
    <tbody>
    <?php foreach ($appointments as $appointment) { ?>
        <tr>
            <td><?= $appointment['id'] ?></td>
            <td><?= $appointment['email'] ?></td>
            <td><?= $appointment['date'] ?></td>
            <td><?= $appointment['time'] ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</body>
</html>









