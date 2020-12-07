<?php

?>
<!DOCTYPE HTML>
<html lang="nl">

    <head>
        <meta charset="UTF-8">
        <title>Geslaagd!</title>
        <link rel="stylesheet" href="style.css">
    </head>
<body>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<nav>
    <div>Portfolio</div>
    <div>Over ons</div>
    <div>Contact</div>
    <div><a href="./appointmentpage.php">Reserveren</a></div>
</nav>


    <?php
    $datumTekst = date('d-m-Y', strtotime($_POST['dateAppointment']));
    echo "Naam: " . $_POST['nameCustomer'] . "</br>";
    echo "E-mailadres: " . $_POST['email'] . "</br>";
    echo "Datum: " . $datumTekst . "</br>";

    if (isset($_POST['verven'])){
        echo '☑ Verven';
    }
    //opslaan in database
    ?>
</body>

<footer>

</footer>

</html>


