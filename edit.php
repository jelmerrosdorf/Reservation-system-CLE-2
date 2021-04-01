<?php
session_start();
// Check if user is logged in, otherwise move back to loginpage
if (!isset($_SESSION['loggedInUser'])) {
    header("Location: login.php");
    exit;
}

// Fix undefined variable $db & $appointment
/** @var $db */
/** @var $appointment */

// DB required
require_once "database.php";

// Check if form is submitted, else do nothing
if (isset($_POST['submit'])) {
    // Post back the data to the user, first retrieve data from $_POST
    $appointmentId = mysqli_escape_string($db, $_POST['id']);
    $name = mysqli_escape_string($db, $_POST['name']);
    $email = mysqli_escape_string($db, $_POST['email']);
    $date = mysqli_escape_string($db, $_POST['date']);
    $time = mysqli_escape_string($db, $_POST['time']);

    // Adds in the form validation
    require_once "form-validation.php";

    // Save variables to array so the form won't break
    $appointmentsArray = [
        'name' => $name,
        'email' => $email,
        'date' => $date,
        'time' => $time,
    ];

    // If there are no errors...
    if (empty($errors)) {
        // the edited data will be saved to the db
        $query = "UPDATE appointments
                  SET name = '$name', email = '$email', date = '$date', time ='$time'
                  WHERE id = '$appointmentId'";
        $result = mysqli_query($db, $query);

        if ($result) {
            header('Location: read.php');
            exit;
        } else {
            $errors[] = 'Er is iets fout gegaan met het opslaan van de gegevens in de database: ' . mysqli_error($db);
        }
    }

} else if (isset($_GET['id'])) {
    // Get the id parameter from the super global $_GET
    $appointmentId = $_GET['id'];

    // Get the data from the database (checks if there is only one result first)
    $query = "SELECT * FROM appointments WHERE id = " . mysqli_escape_string($db, $appointmentId);
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) == 1) {
        $appointment = mysqli_fetch_assoc($result);
    } else {
        // Redirect when db returns no data
        header('Location: read.php');
        exit;
    }
} else {
    header('Location: read.php');
    exit;
}

// Close db connection
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
        <input id="name" type="text" name="name" value="<?= htmlentities($appointment['name']) ?>"/>
        <span style="color:red" class="errors"><?= isset($errors['name']) ? $errors['name'] : '' ?></span>
    </div>
    <div>
        <label for="email">E-mailadres</label>
        <input id="email" type="text" name="email" value="<?= htmlentities($appointment['email']) ?>"/>
        <span style="color:red" class="errors"><?= isset($errors['email']) ? $errors['email'] : '' ?></span>
    </div>
    <div>
        <label for="date">Datum</label>
        <input id="date" type="text" name="date" value="<?= htmlentities($appointment['date']) ?>"/>
        <span style="color:red" class="errors"><?= isset($errors['date']) ? $errors['date'] : '' ?></span>
    </div>
    <div>
        <label for="time">Tijd</label>
        <input id="time" type="text" name="time" value="<?= htmlentities($appointment['time']) ?>"/>
        <span style="color:red" class="errors"><?= isset($errors['time']) ? $errors['time'] : '' ?></span>
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



