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
<header></header>


    <div class="topnav">
        <a class="inactive" href="./Homepage.php">Home</a>
        <a class="inactive" href="./portfoliopage.php">Portfolio</a>
        <a class="inactive" href="./aboutpage.php">Personalia en contact</a>
        <a class="active" href="./appointmentpage.php">Reserveren</a>
    </div>

<main>
    <h1 id="reserveren">Reserveer hier je afspraak!</h1>

    <form action="./connect.php" method="post">
        <div>
            <label for="name">Naam:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">E-mailadres:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="date">Datum:</label>
            <input type="date" id="date" name="date"
                   value="date('Y/m/d')" required pattern="\d{4}-\d{2}-\d{2}">
        </div>
        <div>
            <label for="time">Tijd:</label>
            <input type="time" id="time" name="time" required>
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
