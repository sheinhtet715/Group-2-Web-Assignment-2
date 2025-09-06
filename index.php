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
        
    <div class="">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email;?>" >
        <span class="text-danger"><?php echo $emailError; ?></span><br><br>
    </div>

    <div class="">
        <label for="gender">Gender:</label>
        <input type="radio" id="male" name="gender" value="Male"  <?php if ($gender === "Male") echo "checked"; ?>> Male
        <input type="radio" id="female" name="gender" value="Female" <?php if ($gender === "Female") echo "checked"; ?>> Female 
        <span class="text-danger"><?php echo $genderError; ?></span><br><br>
    </div>

     <div class="">

        <label for="department">Department:</label><br>
        <input type="checkbox" id="english"  name="department" value="English" <?php if ($department === "English") echo "checked"; ?>> English
        <input type="checkbox" id="computer" name="department" value="Computer" <?php if ($department === "Computer") echo "checked"; ?>> Computer
        <input type="checkbox" id="business" name="department" value="Business" <?php if ($department === "Business") echo "checked"; ?>> Business
        <span class="text-danger"><?php echo $departmentError; ?></span><br><br>
        </div>

        <div class="">

        <label for="address">Address:</label><br>
        <textarea id="address" name="address" rows="4" cols="30" value="<?php echo $address;?>"></textarea>
         <span class="text-danger"><?php echo $addressError; ?></span><br><br>
        </div>

        <button type="submit" value="Register" name="create_btn">Register</button>
        <br><br>
        <a href="view.php">View All Registered Students</a>
        </form>
</body>
</html>
