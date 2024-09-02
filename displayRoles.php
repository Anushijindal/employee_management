<?php
include 'connect.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <table style="width:100%">
            <Caption>employee_roless</Caption>
            <tr>
                <th>role_id</th>
                <th>role_slug</th>
                <th>role_name</th>
                <th>role_created_at</th>
                <th>role_updated_at</th>
                <th>role_deleted_at</th>
                <th>Operations</th>
            </tr>
            <?php
            $sql = "SELECT * FROM `employee_roles`";
            $result = mysqli_query($con, $sql);
            if ($result) {
                #(role_id,role_slug,role_name,role_created_at,role_updated_at,role_deleted_at)
                while ($row = mysqli_fetch_assoc($result)) {
                    $role_id = $row['role_id'];
                    $role_slug = $row['role_slug'];
                    $role_name = $row['role_name'];
                    $role_created_at = $row['role_created_at'];
                    $role_updated_at = $row['role_updated_at'];
                    $role_deleted_at = $row['role_deleted_at'];
                    echo '<tr>
      <td>' . $role_id . '</td>
      <td>' . $role_slug . '</td>
      <td>' . $role_name . '</td>
      <td>' . $role_created_at . '</td>
      <td>' . $role_updated_at . '</td>
      <td>' . $role_deleted_at . '</td>
      <td><button><a style="text-decoration:none" href="updateRole.php?role_id='.$role_id.'">Update</a></button>
            <button><a style="text-decoration:none" onclick="return confirm(`Are you sure You want to Delete it?`)" href="deleteRole.php?role_id='.$role_id.'">Delete</a></button></td>
      </tr>';
                }
            } else {
                echo 'error';
            }
            ?>

        </table>
        <button><a href="addRole.php">Add Role</a></button>
        <hr>
        <table style="width:100%">
            <Caption>employee_users</Caption>
            <tr>
                <th>user_id</th>
                <th>user_role_id</th>
                <th>user_firstname</th>
                <th>user_lastname</th>
                <th>user_email</th>
                <th>user_phone</th>
                <th>user_street_address</th>
                <th>user_city_id</th>
                <th>user_state_id</th>
                <th>user_country_id</th>
                <th>Operations</th>
            </tr>
            <?php
            $sql = "SELECT * FROM `employee_users`";
            $result = mysqli_query($con, $sql);
            if ($result) {
                #user_id,user_role_id,user_firstname,user_lastname,user_email,user_phone, user_street_address,user_city_id,user_state_id,user_country_id)
                while ($row = mysqli_fetch_assoc($result)) {
                    $user_id = $row['user_id'];
                    $user_role_id = $row['user_role_id'];
                    $user_firstname = $row['user_firstname'];
                    $user_lastname = $row['user_lastname'];
                    $user_email = $row['user_email'];
                    $user_phone = $row['user_phone'];
                    $user_street_address = $row['user_street_address'];
                    $user_city_id = $row['user_city_id'];
                    $user_state_id = $row['user_state_id'];
                    $user_country_id = $row['user_country_id'];

                    echo '<tr>
      <td>' . $user_id . '</td>
      <td>' . $user_role_id . '</td>
      <td>' . $user_firstname . '</td>
      <td>' . $user_lastname . '</td>
      <td>' . $user_email . '</td>
      <td>' . $user_phone . '</td>
      <td>' . $user_street_address . '</td>
      <td>' . $user_city_id . '</td>
      <td>' . $user_state_id . '</td>
      <td>' . $user_country_id . '</td>
      <td><button><a style="text-decoration:none" href="#">Update</a></button>
            <button><a style="text-decoration:none" href="#">Delete</a></button></td>
      </tr>';
                }
            } else {
                echo 'error';
            }
            ?>

        </table>
        <button><a href="#"></a>Add User</button>
        <hr>
        <table style="width:100%">
            <Caption>Country</Caption>
            <tr>
                <th>country_id</th>
                <th>country_name</th>
                <th>country_code</th>
                <th>Operations</th>
            </tr>
            <?php
            $sql = "SELECT * FROM `country`";
            $result = mysqli_query($con, $sql);
            if ($result) {
                #country_id,country_name,country_code
                while ($row = mysqli_fetch_assoc($result)) {
                    $country_id = $row['country_id'];
                    $country_name = $row['country_name'];
                    $country_code = $row['country_code'];
                    echo '<tr>
      <td>' . $country_id . '</td>
      <td>' . $country_name . '</td>
      <td>' . $country_code . '</td>
      <td><button><a style="text-decoration:none" href="#">Update</a></button>
            <button><a style="text-decoration:none" href="#">Delete</a></button></td>
      </tr>';
                }
            } else {
                echo 'error';
            }
            ?>

        </table >
        <button><a href="#"></a>Add Country</button>
        <hr>
        <table style="width:100%">
            <Caption>State</Caption>
            <tr>
                <th>state_id</th>
                <th>state_name</th>
                <th>state_code</th>
                <th>Operations</th>
            </tr>
            <?php
            $sql = "SELECT * FROM `state`";
            $result = mysqli_query($con, $sql);
            if ($result) {
                #state_id,state_name,state_code
                while ($row = mysqli_fetch_assoc($result)) {
                    $state_id = $row['state_id'];
                    $state_name = $row['state_name'];
                    $state_code = $row['state_code'];
                    echo '<tr>
      <td>' . $state_id . '</td>
      <td>' . $state_name . '</td>
      <td>' . $state_code . '</td>
      <td><button><a style="text-decoration:none" href="#">Update</a></button>
            <button><a style="text-decoration:none" href="#">Delete</a></button></td>
      </tr>';
                }
            } else {
                echo 'error';
            }
            ?>

        </table >
        <button><a href="#"></a>Add State</button>
        <hr>
        <table style="width:100%"> 
            <Caption>City</Caption>
            <tr>
                <th>city_id</th>
                <th>city_name</th>
                <th>city_code</th>
                <th>Operations</th>
            </tr>
            <?php
            $sql = "SELECT * FROM `city`";
            $result = mysqli_query($con, $sql);
            if ($result) {
                #city_id,city_name,city_code
                while ($row = mysqli_fetch_assoc($result)) {
                    $city_id = $row['city_id'];
                    $city_name = $row['city_name'];
                    $city_code = $row['city_code'];
                    echo '<tr>
      <td>' . $city_id . '</td>
      <td>' . $city_name . '</td>
      <td>' . $city_code . '</td>
      <td><button><a style="text-decoration:none" href="#">Update</a></button>
            <button><a style="text-decoration:none" href="#">Delete</a></button></td>
      </tr>';
                }
            } else {
                echo 'error';
            }
            ?>

        </table>
        <button><a href="#"></a>Add City</button>
    </div>
</body>

</html>