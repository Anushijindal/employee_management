<?php
include 'connect.php';
if(isset($_POST['submit'])){
    $role_slug=$_POST['role_slug'];
    $role_name=$_POST['role_name'];
    $sql= "INSERT INTO `employee_roles` (role_slug,role_name) 
    VALUES ('$role_slug','$role_name')";
    $result=mysqli_query($con,$sql);
    if($result){
        header("location:displayRoles.php");
        // echo "inserted";
    }else{
        // die(mysqli_error($con));
        echo "error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Role</title>
    <style>
        input{
            padding: 2px;
            margin: 2px;
        }
    </style>
</head>
<body>
<!-- role_id,role_slug,role_name,role_created_at,role_updated_at,role_deleted_at -->
    <form method="POST">
        <h1>Add employee_roles</h1>
        <!-- <input type="number" placeholder="Enter role_id" name="role_id" required> -->
        <br>
        <input type="text" placeholder="Enter role_slug" name="role_slug" required>
        <br>
        <input type="text" placeholder="Enter role_name" name="role_name" required>
        <br>
        <input type="submit" value="submit" name="submit">
    </form>
</body>
</html>