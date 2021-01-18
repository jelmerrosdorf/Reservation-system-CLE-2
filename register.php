<?php
session_start();

$username = '';
$password = '';

// If session doesn't exist, redirect
if (isset($_SESSION['loggedInUser'])) {
    header('Location: homepage.php');
    exit;
}

if (isset($_POST['submit'])) {
    // Require db
    /** @var $db */
    require_once "database.php";

    // Postback the data showed to the user
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = $_POST['password'];

    $errors = [];
    if ($username == '') {
        $errors['username'] = 'De gebruikersnaam mag niet leeg zijn.';
    }
    if ($password == '') {
        $errors['password'] = 'Het wachtwoord mag niet leeg zijn.';
    }

    if (empty($errors)) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (username, password) VALUES('$username', '$password')";
        $result = mysqli_query($db, $query)
        or die('Error: ' . $query);

        if ($result) {
            header('Location: homepage.php');
            exit;
        } else {
            $errors[] = 'Er is iets fout gegaan met de database. ' . mysqli_error($db);
        }

        // Close db connection
        mysqli_close($db);
    }
}
?>

<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title> Gebruiker registreren</title>
</head>
<body>
<form action="<?= $_SERVER['REQUEST_URI']; ?>" method="post">
    <div>
        <label for="username">Gebruikersnaam</label>
        <input id="username" type="text" name="username" value="<?= $username ?>"/>
        <span class="errors"><?= isset($errors['username']) ? $errors['username'] : '' ?></span>
    </div>
    <div>
        <label for="password">Wachtwoord</label>
        <input id="password" type="password" name="password"/>
        <span class="errors"><?= isset($errors['password']) ? $errors['password'] : '' ?></span>
    </div>
    <div>
        <input type="submit" name="submit" value="Aanmaken"/>
    </div>
</form>
</body>
</html>
