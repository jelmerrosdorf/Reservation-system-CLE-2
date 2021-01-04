<?php

?>
<!DOCTYPE HTML>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>CutKapsel</title>
    <link rel="stylesheet" href="./style.css"/>
    <!-- jQuery incoderen-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
    </script>
    <!-- link naar masonry jS -->
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
</head>
<body>
<header>CutKapsel</header>

<div class="topnav">
    <a class="inactive" href="./Homepage.php">Home</a>
    <a class="active" href="./portfoliopage.php">Portfolio</a>
    <a class="inactive">Personalia</a>
    <a class="inactive">Contact</a>
    <a class="inactive" href="./appointmentpage.php">Reserveren</a>
</div>

<style>
    /*      */
    .grid-item {
        float: left;
        width: 80px;
        height: 60px;
        border: 2px solid hsla(0, 0%, 0%, 0.5);
    }

    .grid-item--width2 { width: 160px; }
    .grid-item--height2 { height: 140px; }
</style>
<script>
    // Grid voor afbeeldingen van kapsels via jQuery ingevoegd

    $('.grid').masonry({
        // options...
        itemSelector: '.grid-item',
        columnWidth: 200
    });
</script>

<!-- jQuery wordt afgekeurd. Beste <src> voor jS-->

<div class="grid" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": 200 }'>
        <div class="grid-item"><img src="http://placekitten.com/80/60"></div>
        <div class="grid-item grid-item--width2"><img src="http://placekitten.com/160/60"></div>
        <div class="grid-item grid-item--height2"><img src="http://placekitten.com/84/144"></div>
        <div class="grid-item"><img src="http://placekitten.com/80/60"></div>
        <div class="grid-item grid-item--width2"><img src="http://placekitten.com/160/60"></div>
        <div class="grid-item grid-item--height2"><img src="http://placekitten.com/84/144"></div>
</div>

</body>
</html>