<?php

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>CutKapsel</title>
    <link rel="stylesheet" href="./style.css"/>
</head>
<body>
<header>Reserveer hier je afspraak!</header>

<nav>
    <div id="divHome"><a href="./Homepage.php">Home</a></div>
    <div>Portfolio</div>
    <div>Over ons</div>
    <div>Contact</div>
    <div><a href="./appointmentpage.php">Reserveren</a></div>
</nav>

<main>
    <h1 id="reserveren">Reserveren</h1>

    <form action="./confirmationpage.php" method="post">
        <div>
            <label for="nameCustomer">Naam:</label>
            <input type="text" id="nameCustomer" name="nameCustomer" required>
        </div>
        <div>
            <label for="email">E-mailadres:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="dateAppointment">Datum:</label>
            <input type="date" id="dateAppointment" name="dateAppointment"
                   value="date('Y/m/d')" required pattern="\d{4}-\d{2}-\d{2}">
        </div>
        <div>

        </div>
        <div>
            <label for="verven">Haar verven?</label>
            <input type="checkbox" id="verven" name="verven">
        </div>
        <div>
            <button type="submit">Reserveren</button>
        </div>
    </form>
</main>
</body>
</html>
