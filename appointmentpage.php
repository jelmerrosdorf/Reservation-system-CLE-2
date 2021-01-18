<?php
// Fix undefined variable $db
/** @var $db */

// DB required
require_once "database.php";

// Check if form is submitted
if (isset($_POST['submit'])) {

    // Post back the data to the user, first retrieve data from $_POST
    $name = mysqli_escape_string($db, $_POST['name']);
    $email = mysqli_escape_string($db, $_POST['email']);
    $date = mysqli_escape_string($db, $_POST['date']);
    $time = mysqli_escape_string($db, $_POST['time']);

    // Adds in the form validation
    require_once "form-validation.php";

    // If there are no errors the data will be saved to the db
    if (empty($errors)) {

        // Save data to db
        $query = "INSERT INTO appointments (name, email, date, time)
                  VALUES ('$name', '$email', '$date', '$time')";
        $result = mysqli_query($db, $query) or die('Error: ' . $query);

        if ($result) {
            echo "Je afspraak is goed doorgekomen!";
        } else {
            $errors['db'] = 'Er is iets fout gegaan met het opslaan van de gegevens in de database: ' . mysqli_error($db);
        }

        // Close the db connection
        mysqli_close($db);
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>CutKapsel</title>
    <link rel="stylesheet" href="./style.css"/>
</head>
<body>
<header></header>


    <div class="topnav">
        <a class="inactive" href="homepage.php">Home</a>
        <a class="inactive" href="./portfoliopage.php">Portfolio</a>
        <a class="inactive" href="./aboutpage.php">Personalia en contact</a>
        <a class="active" href="./appointmentpage.php">Reserveren</a>
        <a class="inactive" href="./login.php">Inloggen</a>
    </div>

<main>
    <h1 id="reserveren">Reserveer hier je afspraak!</h1>

    <form action="" method="post">
        <div>
            <label for="name">Naam</label>
            <input id="name" type="text" name="name" value="<?= isset($name) ? htmlentities($name) : '' ?>"/>
            <span class="errors"><?= isset($errors['name']) ? $errors['name'] : '' ?></span>
        </div>
        <div>
            <label for="email">E-mailadres</label>
            <input id="email" type="text" name="email" value="<?= isset($email) ? htmlentities($email) : '' ?>"/>
            <span class="errors"><?= isset($errors['email']) ? $errors['email'] : '' ?></span>
        </div>
        <div>
            <label for="date">Datum</label>
            <input id="date" type="date" name="date" value="<?= isset($date) ? htmlentities($date) : '' ?>"/>
            <span class="errors"><?= isset($errors['date']) ? $errors['date'] : '' ?></span>
        </div>
        <div>
            <label for="time">Tijd</label>
            <input id="time" type="time" name="time" value="<?= isset($time) ? htmlentities($time) : '' ?>"/>
            <span class="errors"><?= isset($errors['time']) ? $errors['time'] : '' ?></span>
        </div>
        <div>
            <input type="submit" name="submit"/>
        </div>
    </form>
</main>
</body>
</html>
