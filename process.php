<?php
    session_start();
    require 'connect.php';
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<style>
        *{
            margin: 0;
            padding: 0;
          
        }
        body{
            padding: 20px 10px;


        }
</style>
<body>
         <?php if(!isset($_SESSION['message'])): ?>
        <h1>New Record Created Successfully</h1>
        <a href="index.php">Back to Registration</a><br>
        <a href="view.php">View all Registration</a>
        <?php endif; ?>
        <?php if(isset($_SESSION['message'])): ?>
        <h1>Record Updated Successfully</h1>
        <a href="index.php">Back to Registration</a><br>
        <a href="view.php">View all Registration</a>
         <?php unset($_SESSION['message']); ?>
    <?php endif; ?>

</body>
</html>