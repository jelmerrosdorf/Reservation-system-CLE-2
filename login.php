<?php
session_start();

// DB required
/** @var $db */
require_once "database.php";

// Check if user is logged in, otherwise move back to homepage
if (isset($_SESSION['loggedInUser'])) {
    header("Location: homepage.php");
    exit;
}

// If form is posted, validate it
if (isset($_POST['submit'])) {
    // Retrieve posted data
    $username = mysqli_escape_string($db, $_POST['username']);
    $password = $_POST['password'];

    // Get username and password from db
    $query = "SELECT *
              FROM users
              WHERE username = '$username'";
    $result = mysqli_query($db, $query) or die('Error: ' . $query);
    $user = mysqli_fetch_assoc($result);

    // Check if username exists in database
    $errors = [];
    if ($user) {
        // Validate password
        if (password_verify($password, $user['password'])) {
            // Set username for later use in session
            $_SESSION['loggedInUser'] = [
                'name' => $user['name'],
                'id' => $user['id']
            ];

            // Redirect to secure page
            header("Location: homepage.php");
            exit;
        } else {
            $errors[] = 'Je logingegevens zijn onjuist';
        }
    } else {
        $errors[] = 'Je logingegevens zijn onjuist';
    }
}
?>

<!doctype html>
<html lang="nl">
<head>
    <title>Login CutKapsel</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<h1>Login</h1>
<?php if (isset($errors) && !empty($errors)) { ?>
    <ul class="errors">
        <?php for ($i = 0; $i < count($errors); $i++) { ?>
            <li><?= $errors[$i]; ?></li>
        <?php } ?>
    </ul>
<?php } ?>

<form id="login" method="post" action="<?= $_SERVER['REQUEST_URI']; ?>">
    <div>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?= (isset($username) ? $username : ''); ?>"/>
    </div>
    <div>
        <label for="password">Wachtwoord</label>
        <input type="password" name="password" id="password"/>
    </div>
    <div>
        <input type="submit" name="submit" value="Login"/>
    </div>
</form>
<div>
    <a href="homepage.php">Go back to the homepage</a>
</div>
</body>
</html>
