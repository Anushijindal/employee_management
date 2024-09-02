<?php
include 'connect.php';
$sql="CREATE DATABASE employee";
if (mysqli_query($con, $sql)) {
    echo "Database created successfully";
  } else {
    echo "Error creating database: " . mysqli_error($con);
  }
?>