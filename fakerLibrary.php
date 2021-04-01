<?php
// connect to database
require_once "../rssystem/database.php";
//requires faker
require_once "../rssystem/vendor/fzaninotto/faker/src/autoload.php";
require_once "../rssystem/vendor/fzaninotto/faker/src/Faker/Provider/base.php";

$faker = Faker\Factory::create();

for ($i=0; $i<3; $i++){
    $query = "INSERT INTO appointments (name, email, date, time)
            VALUES(
            '$faker->name',
            '$faker->safeEmail',
            '$faker->date',
            '$faker->time')";
    $result = mysqli_query($db, $query);
    echo $query . "<br>";
}





