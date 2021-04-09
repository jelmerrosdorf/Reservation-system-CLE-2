<?php
session_start();

$username = '';
$password = '';

// If session doesn't exist, redirect to 'homepage'
if (isset($_SESSION['loggedInUser'])) {
    header('Location: homepage.php');
    exit;
}

if (isset($_POST['submit'])) {
    // Fix undefined variable $db
    /** @var $db */
    require_once "database.php";

    // Post back the data, mysqli_escape_string for protection from injections
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = $_POST['password'];

    // Show errors if there are any
    $errors = [];
    if ($username == '') {
        $errors['username'] = 'De gebruikersnaam mag niet leeg zijn.';
    }
    if ($password == '') {
        $errors['password'] = 'Het wachtwoord mag niet leeg zijn.';
    }

    // If there are no errors, hash the pw and insert the data into db
    if (empty($errors)) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (username, password) VALUES('$username', '$password')";
        $result = mysqli_query($db, $query)
        or die('Error: ' . $query);

        // If successful, redirect to 'homepage'
        if ($result) {
            header('Location: homepage.php');
            exit;
        } else {
            $errors[] = 'Er is iets fout gegaan met de database. ' . mysqli_error($db);
        }

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
        <!-- Postback username when there are no errors-->
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
