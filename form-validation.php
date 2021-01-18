<?php
// This page checks if the data submitted in the form is valid and generates an error if it is not

// Fix undefined variables error
/** @var $name  */
/** @var $email */
/** @var $date  */
/** @var $time  */

$errors = [];
if ($name == "") {
    $errors['name'] = 'Naam mag niet leeg zijn.';
}
if ($email == "") {
    $errors['email'] = 'E-mailadres mag niet leeg zijn.';
}
if ($date == "") {
    $errors['date'] = 'Datum mag niet leeg zijn.';
}
if ($time == "") {
    $errors['time'] = 'Tijd mag niet leeg zijn.';
}
