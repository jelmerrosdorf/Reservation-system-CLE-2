<?php
    // No PHP necessary, kept the page as .php for potential future PHP code
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>CutKapsel</title>
    <link rel="stylesheet" href="./style.css"/>
</head>

<header></header>

<!-- Navigational menu -->
<nav class="topnav">
    <a class="inactive" href="homepage.php">Home</a>
    <a class="inactive" href="./portfoliopage.php">Portfolio</a>
    <a class="active" href="./aboutpage.php">Personalia en contact</a>
    <a class="inactive" href="./appointmentpage.php">Reserveren</a>
    <a class="inactive" href="./login.php">Inloggen</a>
</nav>

<body>
<main>

<div id="wrapper-home">
    <section class="leftsection">
        <div class="headerhome">
            <h1><br>
                Personalia
            </h1><br>
        </div>
        <div class="leftside">
        <img src="https://i.imgur.com/7UAFh0p.jpg" alt="chris">
        </div>
        <div class="rightside">
            <h2>Chris Elshout</h2>
            <p class="p-about">Barber-apprentice</p><br>
            <p class="p-about">Dit is Chris Elshout, kapper in opleiding bij de Barber Parlour in Rotterdam. Ondanks het feit dat hij nog leerling is, knipt hij als een pro! <br> Chris is een kapper voor mannen van alle leeftijden vanaf 12 jaar en werkt in een LHBTQ+-vriendelijke sfeer. Daarnaast kun je tijdens je knipbeurt genieten van een lekker drankje! Zien wij jou binnenkort bij de Barber Parlour? :)</p>
        </div>
    </section>
    <section class="rightsection">
        <div class="headerhome">
            <h1><br>
                Contact
            </h1><br><br>
            <a href="https://www.instagram.com/cutkapsel" target="_blank"><h2>Instagram</h2></a> <br><br>
            <a href="mailto:c-elshout@hotmail.com"><h2>E-Mail</h2></a><br><br>
            <a href="tel:+31620922441"><h2>Tel. nr.</h2></a><br><br>
            <a href="./appointmentpage.php"><button type="button">Maak nu je afspraak!</button></a><br><br>
        </div>

    </section>
</div>

</main>

<footer>
    3MAC Enterprises© 2020-2021 & Rosdorf BV.© 2020-2021
</footer>

</body>
</html>