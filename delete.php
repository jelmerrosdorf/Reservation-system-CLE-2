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

// If the submit button gets pressed...
if (isset($_POST['submit'])) {

    // delete data from db
    $query = "DELETE FROM appointments WHERE id = " . mysqli_escape_string($db, $_POST['id']);

    mysqli_query($db, $query) or die ('Error: ' . mysqli_error($db));

    // Close db connection
    mysqli_close($db);

    // Redirect to 'read' page after deletion
    header("Location: read.php");

} else if(isset($_GET['id'])) {
    // Get the id parameter from the super global $_GET
    $appointmentId = $_GET['id'];

    // Get the data from the db
    $query = "SELECT * FROM appointments WHERE id = " . mysqli_escape_string($db, $appointmentId);
    $result = mysqli_query($db, $query) or die ('Error: ' . $query);

    if(mysqli_num_rows($result) == 1)
    {
        $appointment = mysqli_fetch_assoc($result);
    }
    else {
        // Redirect to 'read' page when db returns no results (or more than one result)
        header('Location: read.php');
        exit;
    }
} else {
    // this gets executed if id was not present in the url or the form was not submitted
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
        Weet je zeker dat je de afspraak van "<?= $appointment['name']?>" wil verwijderen?
    </p>
    <input type="hidden" name="id" value="<?= $appointment['id'] ?>"/>
    <input type="submit" name="submit" value="Verwijderen"/>
</form>
</body>
</html>
