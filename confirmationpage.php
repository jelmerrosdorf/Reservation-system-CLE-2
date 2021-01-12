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


<div class="topnav">
    <a class="inactive" href="./Homepage.php">Home</a>
    <a class="inactive" href="./portfoliopage.php">Portfolio</a>
    <a class="inactive" href="./aboutpage.php">Personalia</a>
    <a class="inactive">Contact</a>
    <a class="inactive" href="./appointmentpage.php">Reserveren</a>
</div>



    <?php
    $datumTekst = date('d-m-Y', strtotime($_POST['dateAppointment']));
    echo "Naam: " . $_POST['nameCustomer'] . "</br>";
    echo "E-mailadres: " . $_POST['email'] . "</br>";
    echo "Datum: " . $datumTekst . "</br>";
    echo "Tijd:" . $_POST['time'] . "</br>";

    if (isset($_POST['verven'])){
        echo '☑ Verven';
    }
    //opslaan in database
    ?>
</body>

<footer>

</footer>

</html>


