<?php
    session_start();
    require 'connect.php';

    if (isset($_GET['id'])) {
    $post_id_to_update = $_GET['id'];
        
    $post = mysqli_query($db,"SELECT * FROM registered_students WHERE id=$post_id_to_update");

    if(mysqli_num_rows($post) == 1){
        foreach($post as $row){
            $id = $row['id'];
            $name =$row['name'];
            $mobile = $row['mobile_number'];
            $email = $row['email'];
            $gender = $row['gender'];
            $department = $row['department'];
            $address = $row['address'];

        }
    }
}
$nameError ='';
    $mobileError ='';
    $emailError ='';
    $departmentError ='';
    $addressError ='';
if(isset($_POST['update_button'])){
    $name = $_POST['name'];
     $mobile = $_POST['mobile_number'];
    $mobile = preg_replace('/\D/', '', $mobile);
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $department = $_POST['department'] ?? '';
    $address = $_POST['address'];
    if(empty($name)){
        $nameError="Name is required.";
    }
    if(empty($mobile)){
        $mobileError="Mobile is required.";
    }
    if(empty($email)){
        $emailError="Email is required.";
    }