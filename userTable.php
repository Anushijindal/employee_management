<?php
include 'connect.php';
// $search_val = '';
$sort = 'updated_at';
$sort_order="ASC";
if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];
}
if (isset($_GET['search_val'])) {
    $search_val = $_GET['search_val'];
    $search_val = trim($search_val);
    // $sort=$_GET['sort'];
    // $page=$_GET['page'];
}
if(isset($_GET['sort_order']) ){
    $sort_order=$_GET['sort_order'];
}
// echo $sort_order;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER TABLE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>
<style>
    * {
        margin: 0px;
    }

    .add {
        padding: 7px;
        margin-bottom: 5px;
        background-color: #164B60;
        border-radius: 5px;
        color: blue;
    }

    .add:hover {
        padding: 9px;
        background-color: #526D82;
    }

    .update {
        padding: 7px;
        margin: 5px;
        background-color: #304463;
        border-radius: 5px;
    }

    .update:hover {
        font-size: 17px;
        background-color: #153448;
    }

    .delete {
        padding: 7px;
        margin: 5px;
        background-color: red;
        border-radius: 5px;
    }

    .delete:hover {
        background-color: #FC4100;
        font-size: 17px;
    }

    th,
    .heading {
        border-radius: 7px;
        /* border: 2px solid black; */
        padding: 4px;
        color: green;
        font-size: 20px;
        text-decoration: none;
    }

    td {
        padding: 10px;
        margin: 10px;
        color: #164B60;
    }

    h2 {
        text-align: center;
        color: crimson;
        margin-top: 5px;
    }

    tr {
        border-bottom: 1px solid #ddd;
    }

    a {
        font-weight: bold;
        font-size: 15px;
        padding-left: 10px;
        padding-right: 10px;
    }

    .pages {
        /* background-color: rgb(100, 100, 100); */
        padding-top: 10px;
        padding-bottom: 10px;
        color: white;
        display: flex;
        flex-direction: row;
        /* text-align: center; */
        justify-content: center;
        margin-top: 10px;
        position: fixed;
        bottom: 0px;
        /* top: 0px; */
        width: 100%;
    }

    .page {
        border: 2px double #304463;
        margin: 4px;
        text-decoration: none;
        color: #304463;
        padding: 10px 20px;
        border-radius: 4px;
        font-size: 17px;
        /* outline: blue solid 2px; */
    }
    /* .page: {
        background-color: black;
    } */
    input {
        padding: 7px;
        margin-right: 20px;
        width: 400px;
        font-size: 13px;
    }

    input[type~='submit'] {
        width: 100px;
        background-color: #003566;
        color: white;
        border-radius: 5px;
        font-weight: bolder;
    }

    .items {
        display: flex;
        justify-content: center;
        gap: 600px;
        margin: 15px 5px;
    }
    a[title]:hover::after{
        content: attr(title);
        position: absolute;
        background-color: darkslategray;
        color: white;
        padding: 5px;
        top: -1%;
        border-radius: 5px;
  /* left: 0; */
    }
    .pageNum{
        margin: 20px;
        /* position: static; */
    }
</style>

<body style="align-items: center;">
    <h2 style="font-size: 30px;">User Data</h2>
    <div class="items">
        <!-- <div></div> -->
        <button class="add"><a style="text-decoration: none; color:white;" href="AddUser.php">Add User</a></button>
        <form method="GET" class="search">
            <input type="text" name="search_val" placeholder="search" value=<?php echo $_GET['search_val']; ?>>
            <input class="search" type="submit" value="Search">
        </form>
        <!-- <div></div> -->
    </div>
    <?php
    ?>
    <table border="2" style="width: 80%;text-align: center;margin:auto;padding:10px; ">
        <tr style="border-bottom: 1px solid #ddd; ">
            <th><a class="heading" id="updated_at"
                    href="userTable.php?search_val=<?php echo $search_val; ?>&sort=updated_at&sort_order=<?= $sort=="updated_at" && $sort_order=="ASC"?"DESC":"ASC"?>&page=1">S. No
                    <?php if ($sort === "updated_at" && $sort_order==="DESC")
                        echo "<i class='fa-solid fa-arrow-down fa-2xs'></i>";
                    else if($sort === "updated_at" && $sort_order==="ASC")
                    echo "<i class='fa-solid fa-arrow-up fa-2xs'></i>"
                     ?></a></th>
            <th><a class="heading" id="role_name"
                    href="userTable.php?search_val=<?php echo $search_val; ?>&sort=role_name&sort_order=<?= $sort=="role_name" && $sort_order=="ASC"?"DESC":"ASC"?>&page=1">Role
                    <?php if ($sort === "role_name" && $sort_order==="DESC")
                        echo "<i class='fa-solid fa-arrow-down fa-2xs'></i>";
                    else if($sort === "role_name" && $sort_order==="ASC")
                    echo "<i class='fa-solid fa-arrow-up fa-2xs'></i>"
                     ?></a></th>
            <th><a class="heading" id="user_firstname"
                    href="userTable.php?search_val=<?php echo $search_val; ?>&sort=user_firstname&sort_order=<?= $sort=="user_firstname" && $sort_order=="ASC"?"DESC":"ASC"?>&page=1">User Name
                    <?php if ($sort === "user_firstname" && $sort_order==="DESC")
                        echo "<i class='fa-solid fa-arrow-down fa-2xs'></i>";
                    else if($sort === "user_firstname" && $sort_order==="ASC")
                    echo "<i class='fa-solid fa-arrow-up fa-2xs'></i>"
                     ?></a></th>
            <th><a class="heading" id="user_email"
                    href="userTable.php?search_val=<?php echo $search_val; ?>&sort=user_email&sort_order=<?= $sort=="user_email" && $sort_order=="ASC"?"DESC":"ASC"?>&page=1">Email
                    <?php if ($sort === "user_email" && $sort_order==="DESC")
                        echo "<i class='fa-solid fa-arrow-down fa-2xs'></i>";
                    else if($sort === "user_email" && $sort_order==="ASC")
                    echo "<i class='fa-solid fa-arrow-up fa-2xs'></i>"
                     ?></a></th>
            <th><a class="heading" id="user_phone"
                    href="userTable.php?search_val=<?php echo $search_val; ?>&sort=user_phone&sort_order=<?= $sort=="user_phone" && $sort_order=="ASC"?"DESC":"ASC"?>&page=1">Phone
                    <?php if ($sort === "user_phone" && $sort_order==="DESC")
                        echo "<i class='fa-solid fa-arrow-down fa-2xs'></i>";
                    else if($sort === "user_phone" && $sort_order==="ASC")
                    echo "<i class='fa-solid fa-arrow-up fa-2xs'></i>"
                     ?></a></th>
            <th><a class="heading" id="user_street_address"
                    href="userTable.php?search_val=<?php echo $search_val; ?>&sort=user_street_address&sort_order=<?= $sort=="user_street_address" && $sort_order=="ASC"?"DESC":"ASC"?>&page=1">Address
                    <?php if ($sort === "user_street_address" && $sort_order==="DESC")
                        echo "<i class='fa-solid fa-arrow-down fa-2xs'></i>";
                    else if($sort === "user_street_address" && $sort_order==="ASC")
                    echo "<i class='fa-solid fa-arrow-up fa-2xs'></i>"
                     ?></a></th>
            <th><a class="heading" id="user_country_id"
                    href="userTable.php?search_val=<?php echo $search_val; ?>&sort=user_country_id&sort_order=<?= $sort=="user_country_id" && $sort_order=="ASC"?"DESC":"ASC"?>&page=1">Country
                    <?php if ($sort === "user_country_id" && $sort_order==="DESC")
                        echo "<i class='fa-solid fa-arrow-down fa-2xs'></i>";
                    else if($sort === "user_country_id" && $sort_order==="ASC")
                    echo "<i class='fa-solid fa-arrow-up fa-2xs'></i>"
                     ?></a></th>
            <th><a class="heading" id="user_state_id"
                    href="userTable.php?search_val=<?php echo $search_val; ?>&sort=user_state_id&sort_order=<?= $sort=="user_state_id" && $sort_order=="ASC"?"DESC":"ASC"?>&page=1">State
                    <?php if ($sort === "user_state_id" && $sort_order==="DESC")
                        echo "<i class='fa-solid fa-arrow-down fa-2xs'></i>";
                    else if($sort === "user_state_id" && $sort_order==="ASC")
                    echo "<i class='fa-solid fa-arrow-up fa-2xs'></i>"
                     ?></a></th>
            <th><a class="heading" id="user_city_id"
                    href="userTable.php?search_val=<?php echo $search_val; ?>&sort=user_city_id&sort_order=<?= $sort=="user_city_id" && $sort_order=="ASC"?"DESC":"ASC"?>&page=1">City
                    <?php if ($sort === "user_city_id" && $sort_order==="DESC")
                        echo "<i class='fa-solid fa-arrow-down fa-2xs'></i>";
                    else if($sort === "user_city_id" && $sort_order==="ASC")
                    echo "<i class='fa-solid fa-arrow-up fa-2xs'></i>"
                     ?></a></th>
            <th>Actions</th>
        </tr>
        <?php
        // $sql="SELECT * FROM `employee_roles`,`employee_users` WHERE role_id=user_role_id";
        $rows_num = 10;
        $query = "SELECT * FROM employee_roles JOIN employee_users ON 
        employee_roles.role_id=employee_users.user_role_id AND 
        employee_users.deleted_at is null WHERE user_firstname LIKE '$search_val%'
         or user_lastname LIKE '$search_val%'
         or role_name LIKE '$search_val%'
         or user_city_id LIKE '$search_val%'
         or user_state_id LIKE '$search_val%'
         or user_country_id LIKE '$search_val%'
         ORDER BY $sort $sort_order";
        $result2 = mysqli_query($con, $query);
        $totalRows = mysqli_num_rows($result2);
        // echo "$totalRows";
        $numPages = ceil($totalRows / $rows_num);
        // echo $numPages;
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        $first_row = ($page - 1) * $rows_num;
        $sql = "SELECT * FROM employee_roles JOIN employee_users on 
        employee_roles.role_id=employee_users.user_role_id AND employee_users.deleted_at 
        is null WHERE user_firstname LIKE '$search_val%'
        or user_lastname LIKE '$search_val%'
        or user_country_id LIKE '$search_val%'
        or user_city_id LIKE '$search_val%'
         or user_state_id LIKE '$search_val%'
         or role_name LIKE '$search_val%'
         ORDER BY $sort $sort_order
         LIMIT $rows_num OFFSET $first_row";
        $SNo = $first_row;
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $SNo++;
                $role_id = $row['role_id'];
                $user_id = $row['user_id'];
                $role_name = $row['role_name'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['user_email'];
                $user_phone = $row['user_phone'];
                $user_street_address = $row['user_street_address'];
                $user_password = $row['user_password'];
                $active_status = $row['Active_status'];
                $country = $row['user_country_id'];
                $state = $row['user_state_id'];
                $city = $row['user_city_id'];
                echo '<tr style="border: 1px solid #ddd;">
                    <td style="border-bottom: 1px solid #ddd;">' . $SNo . '</td>
                    <td style="border-bottom: 1px solid #ddd;">' . $role_name . '</td>
                    <td style="border-bottom: 1px solid #ddd;">' . $user_firstname . " " . $user_lastname . '</td>
                    <td style="border-bottom: 1px solid #ddd;">' . $user_email . '</td>
                    <td style="border-bottom: 1px solid #ddd;">' . $user_phone . '</td>
                    <td style="border-bottom: 1px solid #ddd;">' . $user_street_address . '</td>
                    <td style="border-bottom: 1px solid #ddd;">' . $country . '</td>
                    <td style="border-bottom: 1px solid #ddd;">' . $state . '</td>
                    <td style="border-bottom: 1px solid #ddd;">' . $city . '</td>
                    <td style="border-bottom: 1px solid #ddd;"><button class="update"><a style="text-decoration:none; 
                    color:white" href="updateUser.php?user_id=' . $user_id . '">Update</a></button>
            <button class="delete" ><a onClick="return confirm(`Are you sure You want to Delete it?`)" 
            style="text-decoration:none; color:white" href="DeleteUser.php?user_id=' . $user_id . '">Delete</a></button></td>
                    </tr>';
            }
        }
        ?>
    </table>
    <div>
    <div class="pages">
        <?php
        // echo "<";
        if ($page > 1) {
            echo '<a class="page" title="Previous" href="userTable.php?search_val=' . $search_val . '&sort=' . $sort .'&sort_order='.$sort_order. '&page=' . ($page - 1) . '"> &laquo</a>';
        } else {
            echo "<a style='color:blue;' class='page' disabled'>&laquo</a>";
        }
        for ($cur_page = 1; $cur_page <= $numPages; $cur_page++) {
            echo '<a class="page" href="userTable.php?search_val=' . $search_val . '&sort=' . $sort .'&sort_order='.$sort_order. '&page=' . $cur_page . '">' . $cur_page . '</a>';
        }
        if ($page < $numPages) {
            echo '<a class="page" title="Next" href="userTable.php?search_val=' . $search_val . '&sort=' . $sort .'&sort_order='.$sort_order. '&page=' . ($page + 1) . '"> &raquo</a>';
        } else {
            echo "<a style='color:blue;' class='page' disabled'>&raquo</a>";
        }
        ?>
    </div>
    <div class="pageNum">
        <p>Page: <?php echo $page;?> of <?php echo $numPages;?></p>
    </div></div>
</body>

</html>