<?php
include 'connect.php';
$user_id = $_GET['user_id'];
// echo "$user_id";
$sql = "SELECT * FROM employee_users WHERE user_id=$user_id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$user_firstname = $row['user_firstname'];
$user_lastname = $row['user_lastname'];
$user_email = $row['user_email'];
$user_phone = $row['user_phone'];
$user_street_address = $row['user_street_address'];
$user_city_id = $row['user_city_id'];
$user_state_id = $row['user_state_id'];
$user_country_id = $row['user_country_id'];
$role_id = $row['user_role_id'];
$sql1 = "SELECT * FROM employee_roles WHERE role_id='$role_id'";
$result1 = mysqli_query($con, $sql1);
$row1 = mysqli_fetch_assoc($result1);
$role_val = $row1['role_name'];
// echo $role_val;
if (isset($_POST['submit'])) {
    $role_name = $_POST['role_name'];
    // $role_slug = $_POST['role_slug'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_phone = $_POST['user_phone'];
    $user_street_address = $_POST['user_street_address'];
    $user_city_id = $_POST['user_city_id'];
    $user_state_id = $_POST['user_state_id'];
    $user_country_id = $_POST['user_country_id'];
    $sql = "SELECT * FROM employee_roles WHERE role_name='$role_name'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $role_id = $row['role_id'];
    $role_name = $row['role_name'];
    $role_slug = $row['role_slug'];
    // echo "$role_id $role_name $role_slug";
    $sql1 = "UPDATE `employee_users` SET  user_role_id='$role_id',user_firstname='$user_firstname',
        user_lastname='$user_lastname',user_email='$user_email',user_phone='$user_phone',
        user_street_address='$user_street_address',user_city_id='$user_city_id',user_state_id='$user_state_id',
        user_country_id='$user_country_id' WHERE user_id=$user_id";
    $res = mysqli_query($con, $sql1);
    if ($res) {
        // echo "success";
        header('location:userTable.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input {
            margin: 5px;
            padding: 2px;
        }
    </style>
</head>

<body>
    <h1>Update User</h1>
    <form method="POST">

        <!-- <input type="text" name="role_slug" placeholder="Role slug"><br> -->
        <input type="text" name="user_firstname" placeholder="User FirstName" value=<?php echo $user_firstname; ?>><br>
        <input type="text" name="user_lastname" placeholder="User LastName" value=<?php echo $user_lastname; ?>><br>
        <label for="role"><Select name="role_name">
                <option value="Developer" <?php if ($role_val == "Developer")
                    echo "selected=\"selected\""; ?>>Developer
                </option>
                <option value="Sr. Developer" <?php if ($role_val == "Sr. Developer")
                    echo "selected=\"selected\""; ?>>Sr.
                    Developer</option>
                <option value="Team Lead" <?php if ($role_val == "Team Lead")
                    echo "selected=\"selected\""; ?>>Team Lead
                </option>
                <option value="Manager" <?php if ($role_val == "Manager")
                    echo "selected=\"selected\""; ?>>Manager</option>
                <option value="CEO" <?php if ($role_val == "CEO")
                    echo "selected=\"selected\""; ?>>CEO</option>
                <option value="BDE" <?php if ($role_val == "BDE")
                    echo "selected=\"selected\""; ?>>BDE</option>
                <option value="CTO" <?php if ($role_val == "CTO")
                    echo "selected=\"selected\""; ?>>CTO</option>
                <option value="Office Boy" <?php if ($role_val == "Office Boy")
                    echo "selected=\"selected\""; ?>>Office Boy
                </option>
                <option value="Tester" <?php if ($role_val == "Tester")
                    echo "selected=\"selected\""; ?>>Tester</option>
                <option value="Analyst" <?php if ($role_val == "Analyst")
                    echo "selected=\"selected\""; ?>>Analyst</option>
            </Select></label>
        <br>
        <!-- <input type="text" name="role_name" placeholder="Role name"><br> -->
        <input type="text" name="user_email" placeholder="Email" value=<?php echo $user_email; ?>><br>
        <input type="text" name="user_phone" placeholder="Phone" value=<?php echo $user_phone; ?>><br>
        <input type="text" name="user_street_address" placeholder="Address" value=<?php echo $user_street_address; ?>><br>
        <input type="text" name="user_city_id" placeholder="City_id" value=<?php echo $user_city_id; ?>><br>
        <input type="text" name="user_state_id" placeholder="State_id" value=<?php echo $user_state_id; ?>><br>
        <input type="text" name="user_country_id" placeholder="Country_id" value=<?php echo $user_country_id; ?>><br>
        <input type="submit" value="submit" name="submit">
    </form>
</body>

</html>