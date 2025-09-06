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
$mobile     = $_POST['mobile']     ;
$mobile = preg_replace('/\D/', '', $mobile);
$email      = $_POST['email']      ;
$gender     = $_POST['gender']    ?? '';
$department = $_POST['department'] ?? '';
$address    = $_POST['address']    ;
if(empty($name)){
    $nameError = "Name is required";
}
if(empty($mobile)){
    $mobileError = "Mobile no. is required";
}
if(empty($email)){
    $emailError = "Email is required";
}
if(empty($gender)){
    $genderError = "Gender is required";
}
if(empty($department)){
    $departmentError = "Department is required";
}
if(empty($address)){
    $addressError = "Address is required";
}

if(!empty($name) && !empty($mobile) && !empty($email) && !empty($gender) && !empty($department) && !empty($address)){
    $sqlquery = "INSERT INTO registered_students (name, mobile_number, email, gender, department, address) VALUES (
     '$name', '$mobile', '$email', '$gender', '$department', '$address'
    )";
        mysqli_query($db, $sqlquery);
        $_SESSION['status'] = "Student Registered Successfully";
        header("Location: process.php");
        exit();
    }

}