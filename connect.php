<?php
    $db = mysqli_connect('localhost','root','','students_list');
    if($db == false){
        die('Some Error'.mysqli_connect_error($db));
    }


?>