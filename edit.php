<?php
session_start();
// This page is secured: if user isn't logged in, redirect to loginpage
if (!isset($_SESSION['loggedInUser'])) {
    header("Location: login.php");
    exit;
}

// Fix undefined variable $db & $appointment
/** @var $db */
/** @var $appointment */

require_once "database.php";

// If submit is pressed
if (isset($_POST['submit'])) {
    // Post back the data, mysqli_escape_string for protection from injections
    $appointmentId = mysqli_escape_string($db, $_POST['id']);
    $name = mysqli_escape_string($db, $_POST['name']);
    $email = mysqli_escape_string($db, $_POST['email']);
    $date = mysqli_escape_string($db, $_POST['date']);
    $time = mysqli_escape_string($db, $_POST['time']);

    require_once "form-validation.php";

    $appointmentsArray = [
        'name' => $name,
        'email' => $email,
        'date' => $date,
        'time' => $time,
    ];

    // If no errors are present
    if (empty($errors)) {
        // Save data to db
        $query = "UPDATE appointments
                  SET name = '$name', email = '$email', date = '$date', time ='$time'
                  WHERE id = '$appointmentId'";
        $result = mysqli_query($db, $query);

        // If data is edited, redirect to 'read' page
        if ($result) {
            header('Location: read.php');
            exit;
        } else {
            $errors[] = 'Er is iets fout gegaan met het opslaan van de gegevens in de database: ' . mysqli_error($db);
        }
    }

} else if (isset($_GET['id'])) {
    // Get the given parameter for id, set variable
    $appointmentId = $_GET['id'];

    // Get data from db, first check if there is only one result
    $query = "SELECT * FROM appointments WHERE id = " . mysqli_escape_string($db, $appointmentId);
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) == 1) {
        $appointment = mysqli_fetch_assoc($result);
    } else {
        // Redirect when no data is returned
        header('Location: read.php');
        exit;
    }
} else {
    header('Location: read.php');
    exit;
}

mysqli_close($db);
?>

<!doctype html>
<html lang="nl">
<head>
    <title>Afspraak wijzigen</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<h1>
    Wijzig de afspraak van <?= htmlentities($appointment['name']) ?>
</h1>

<form action="" method="post">
    <div>

        <label for="name">Naam</label>
        <!-- htmlentities for protection -->
        <input id="name" type="text" name="name" value="<?= htmlentities($appointment['name']) ?>"/>
        <!-- Postback name when there are no errors-->
        <span class="errors"><?= isset($errors['name']) ? $errors['name'] : '' ?></span>
    </div>
    <div>
        <label for="email">E-mailadres</label>
        <input id="email" type="text" name="email" value="<?= htmlentities($appointment['email']) ?>"/>
        <span class="errors"><?= isset($errors['email']) ? $errors['email'] : '' ?></span>
    </div>
    <div>
        <label for="date">Datum</label>
        <input id="date" type="text" name="date" value="<?= htmlentities($appointment['date']) ?>"/>
        <span class="errors"><?= isset($errors['date']) ? $errors['date'] : '' ?></span>
    </div>
    <div>
        <label for="time">Tijd</label>
        <input id="time" type="text" name="time" value="<?= htmlentities($appointment['time']) ?>"/>
        <span class="errors"><?= isset($errors['time']) ? $errors['time'] : '' ?></span>
    </div>
    <div>
        <input type="hidden" name="id" value="<?= $appointmentId ?>"/>
        <input type="submit" name="submit" value="Opslaan"/>
    </div>
</form>
<div>
    <a href="read.php">Ga terug naar de lijst met afspraken</a>
</div>
</body>
</html>



