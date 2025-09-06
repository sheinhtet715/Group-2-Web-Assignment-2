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
        body{
            padding: 20px 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse; 
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #b4b2b2ff; 
        }
         th, td {
          padding: 8px;
          text-align: left;
        }
        th {
            background-color:  #d8dadcff;
        }
        button {

            padding: 0px 3px; 

            border-radius: 6px; 
          
        }

    </style>
</head>
<body>

    <?php if (!isset($post_id_to_update)): ?>
    <h1>Registered Students</h1><br>

    <table class="table table-bordered">
        <thead>
            <tr class="table-secondary">
                <th>ID</th>
                <th>Student Name</th>
                <th>Mobile No.</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Department</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
             <?php 
              $query ="SELECT * FROM registered_students";
              $students = mysqli_query($db,$query);
                foreach($students as $student){
            //  foreach ($students as $student): ?>
        <tr>
            <td><?php echo $student['id']; ?></td>
            <td><?php echo $student['name']; ?></td>
            <td><?php echo $student['mobile_number']; ?></td>
            <td><?php echo $student['email']; ?></td>
            <td><?php echo $student['gender']; ?></td>
            <td><?php echo $student['department']; ?></td>
            <td><?php echo $student['address']; ?></td>
            <td><a href="view.php?id=<?php echo $student['id']; ?>">Edit</a></td>

        </tr>
    <?php } ?>
        </tbody>
    </table>
    <a href="index.php">Register a New Student</a>
<?php endif; ?>
<?php if (isset($post_id_to_update)): ?>
<h1>Edit Student Record</h1><br>
<form action="" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div>
    <label for="name">Student Name:</label>
    <input type="text" id="name" name="name" placeholder="Name" value="<?php echo $name ?>"> 
    <span class="text-danger"><?php echo $nameError ?></span>
    </div><br>
    <div>
    <label for="mobile">Mobile no.: +95 - </label>
    <input type="text" id="mobile" name="mobile_number" value="<?php echo $mobile ?>">
    <span class="text-danger"><?php echo $mobileError ?></span>
    </div><br>
    <div>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $email?>">
    <span class="text-danger"><?php echo $emailError ?></span>
    </div><br>

     <div>
        <label for="gender">Gender:</label>
        <input type="radio" id="male" name="gender" value="Male" <?php if($gender=="Male"){echo "checked";} ?>> Male
        <input type="radio" id="female" name="gender" value="Female" <?php if($gender=="Female"){echo "checked";} ?>> Female
        </div><br>

        <div>
        <label for="department">Department:</label><br>
        <input type="checkbox" id="english" name="department" value="English" <?php if($department=="English"){echo "checked";} ?>> English
        <input type="checkbox" id="computer" name="department" value="Computer" <?php if($department=="Computer"){echo "checked";} ?>> Computer
        <input type="checkbox" id="business" name="department" value="Business" <?php if($department=="Business"){echo "checked";} ?>> Business
        <span class="text-danger"><?php echo $departmentError; ?></span>
        </div><br>
        
        <div>
        <label for="address">Address:</label><br>
        <textarea id="address" name="address" rows="4" cols="30" ><?php echo $address; ?></textarea>
        <span class="text-danger"><?php echo $addressError ?></span>
        </div><br>

        <button type="submit" value="Update" name="update_button">Update Record</button>
        <br><br>
        <a href="view.php">Cancel and Go Back to List</a>
        </form>

        <?php endif; ?>

</body>
</html>