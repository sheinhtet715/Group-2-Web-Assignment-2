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
     if(empty($department)){
        $departmentError="Department is required.";
    }
    if(empty($address)){
        $addressError="Address is required.";
    }
   if(!empty($name) && !empty($mobile) && !empty($email) && !empty($gender) && !empty($department) && !empty($address)){
        $sql = "UPDATE registered_students SET name='$name', mobile_number='$mobile', email='$email', gender = '$gender',  department='$department', address='$address'
        WHERE id=$post_id_to_update";
        $result = mysqli_query($db,$sql);
        if($result){
            $_SESSION['message'] = "Record Updated Successfully";
            header("Location: process.php");
        }else{
            echo "Failed: " . mysqli_error($db);
        }
    }  
}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=s, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
     <style>
        *{
            margin: 0;
            padding: 0;
          
        }