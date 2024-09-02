<?php
include 'connect.php';
$role_id=$_GET['role_id'];
$sql="SELECT * FROM employee_roles WHERE role_id=$role_id";
$result=mysqli_query($con,$sql);
// if($result){
    $row=mysqli_fetch_assoc($result);
    $role_slug=$row['role_slug'];
    $role_name=$row['role_name'];
// }
if(isset($_POST['submit'])){
    $role_slug=$_POST['role_slug'];
    $role_name=$_POST['role_name'];
    $sql= "UPDATE `employee_roles` SET role_slug='$role_slug',role_name='$role_name' WHERE role_id=$role_id";
    $result=mysqli_query($con,$sql);
    // echo $result;
    if($result){
        header("location:displayRoles.php");
        // echo "updated";
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
        <h1>UPDATE employee_roles</h1>
        <!-- <input type="number" placeholder="Enter role_id" name="role_id" required> -->
        <br>
        <input type="text" placeholder="Enter role_slug" name="role_slug" required value=<?php echo $role_slug; ?> >
        <br>
        <input type="text" placeholder="Enter role_name" name="role_name" required value=<?php echo $role_name; ?>>
        <br>
        <input type="submit" value="submit" name="submit">
    </form>
</body>
</html>