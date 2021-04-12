<?php
// Fix undefined variable $db
/** @var $db */

require_once "database.php";

// If submit is pressed
if (isset($_POST['submit'])) {

    // Post back the data, mysqli_escape_string for protection from injections
    $name = mysqli_escape_string($db, $_POST['name']);
    $email = mysqli_escape_string($db, $_POST['email']);
    $date = mysqli_escape_string($db, $_POST['date']);
    $time = mysqli_escape_string($db, $_POST['time']);

    require_once "form-validation.php";

    // Check for errors
    if (empty($errors)) {

        // Save data to db
        $query = "INSERT INTO appointments (name, email, date, time)
                  VALUES ('$name', '$email', '$date', '$time')";
        $result = mysqli_query($db, $query) or die('Error: ' . $query);

        // If result is true, do nothing. Else, give the errors
        if ($result) {
            echo "";
        } else {
            $errors['db'] = 'Er is iets fout gegaan met het opslaan van de gegevens in de database: ' . mysqli_error($db);
        }

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

<!-- Navigational menu -->
    <nav class="topnav">
        <a class="inactive" href="homepage.php">Home</a>
        <a class="inactive" href="./portfoliopage.php">Portfolio</a>
        <a class="inactive" href="./aboutpage.php">Personalia en contact</a>
        <a class="active" href="./appointmentpage.php">Reserveren</a>
        <a class="inactive" href="./login.php">Inloggen</a>
    </nav>

<main>
    <h1 id="reserveren">Reserveer hier je afspraak!</h1>

    <form action="" method="post">
        <div>
            <label for="name">Naam</label>
            <!-- Postback name if set, htmlentities for protection -->
            <input id="name" type="text" name="name" value="<?= isset($name) ? htmlentities($name) : '' ?>"/>
            <!-- Postback error name when there are any, else place nothing-->
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

        <div>
        <!-- If submit is pressed and there are no errors, show confirmation message-->
            <p><?php if (isset($_POST['submit']) && (empty($errors))) echo "Je afspraak is goed doorgekomen!" ?></p>
        </div>
    </form>

</main>

<br>

<footer>
    <p> 3MAC Enterprises© 2020-2021 & Rosdorf BV.© 2020-2021</p>
</footer>

</body>
</html>
