<?php
// No PHP necessary, kept the page as .php for potential future PHP code
?>
<!DOCTYPE HTML>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>CutKapsel</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>

<header></header>


<!-- Navigational menu -->
<nav class="topnav">
    <a class="active" href="./homepage.php">Home</a>
    <a class="inactive" href="./portfoliopage.php">Portfolio</a>
    <a class="inactive" href="./aboutpage.php">Personalia en contact</a>
    <a class="inactive" href="./appointmentpage.php">Reserveren</a>
    <a class="inactive" href="./login.php">Inloggen</a>
</nav>

<main>

<div id="wrapper-home">

    <!--linker div-->
    <section class="leftsection">
        <div class="headerhome">
        <h1><br>
            Welkom bij CutKapsel!
        </h1></br>
        </div>
        <p class="p-home">
            <img class="logo" src="https://i.imgur.com/WuaX8oT.jpg" alt="logo">
        </p>
    </section>

<!--Rechter div-->
    <section class="rightsection">
        <div class="headerhome">
        <h1><br>
            Behandelingen en tarieven
        </h1></br>
            <h2>Haircut:</h2><h2 class="price">€35,-</h2> <br>
            <h2>Beard Trim</h2><h2 class="price">€20,-</h2> <br>
            <h2>Hair and Beard</h2><h2 class="price">€50,-</h2> <br>
            <h2>Touch up</h2> <h2 class="price">€15,-</h2> <br>
            <h2>Zowel contant betalen als pinnen <br>mogelijk op locatie!</h2><br>
            <a href="./appointmentpage.php"><button type="button">Maak nu je afspraak!</button></a><br><br>
        </div>
    </section>
</div>

</main>

<br>

<footer>
    <p> 3MAC Enterprises© 2020-2021 & Rosdorf BV.© 2020-2021</p>
</footer>

</body>
</html>




