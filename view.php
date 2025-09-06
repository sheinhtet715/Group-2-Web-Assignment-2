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