<?php
include 'connect.php';
$role_id=$_GET['role_id'];
$sql="DELETE FROM employee_roles WHERE role_id=$role_id";
$result=mysqli_query($con,$sql);
if($result){
    header("location:displayRoles.php");
}
?>