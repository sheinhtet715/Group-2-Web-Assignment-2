<?php
require 'connect.php';



$name = '';
$mobile = '';
$email = '';
$gender = '';
$department = '';
$address = '';

$nameError = '';
$mobileError = '';
$emailError = '';
$genderError = '';
$departmentError = '';
$addressError = '';

if (isset($_POST['create_btn'])) {
    $name       = $_POST['name']        ;