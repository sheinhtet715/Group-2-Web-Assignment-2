<?php
    session_start();
    require 'connect.php';
    require 'studentscreate.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group - 2, Assignment - 1</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<style>
        *{
            margin: 0;
            padding: 0;
          
        }
        body{
            padding: 20px 10px;
        }

        button {

            padding: 0px 3px; 

            border-radius: 6px; 
          
        }
</style>
</head>
<body>
    <h1>Student Registration Form</h1><br>
    <form action="" method="POST">
        <div class="">
        <label for="name">Student Name:</label>
        <input type="text" id="name" name="name" placeholder="Name" value="<?php echo $name;?>">
        <span class="text-danger"><?php echo $nameError; ?></span><br><br>
        </div>

    <div class="">
        <label for="mobile">Mobile no.: +95 - </label>
        <input type="text" id="mobile" name="mobile" value="<?php echo $mobile;?>" >
         <span class="text-danger"><?php echo $mobileError; ?></span><br><br>
        </div>
        
</body>
</html>
