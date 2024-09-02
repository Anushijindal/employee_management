<?php
include 'connect.php';
if (isset($_POST['submit'])) {
    $errors = [];
    if (empty($_POST['role_name'])) {
        $errors['role_name'] = 'Role is Required';
    }
    if ($_POST['role_name'] === 'selectRole') {
        $errors['role_name'] = "select Role";
    } else {
        $role_name = $_POST['role_name'];
    }
    if (empty($_POST['user_firstname'])) {
        $errors['user_firstname'] = 'First name is Required';
    } else {
        $user_firstname = $_POST['user_firstname'];
    }
    if (empty($_POST['user_lastname'])) {
        $errors['user_lastname'] = 'Last name is Required';
    } else {
        $user_lastname = $_POST['user_lastname'];
    }
    if (empty($_POST['user_email'])) {
        $errors['user_email'] = 'Email is Required';
    } else {
        $user_email = $_POST['user_email'];
        if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
            $errors['user_email'] = 'Invalid Email Format';
        } else {
            $sql_check = "SELECT * from `employee_users` WHERE user_email='$user_email'";
            $result_check = mysqli_query($con, $sql_check);
            if (mysqli_num_rows($result_check) > 0) {
                $errors['user_email'] = "Email already exists";
            }
        }
    }
    if (empty($_POST['user_phone'])) {
        $errors['user_phone'] = 'Phone is Required';
    } else {
        $user_phone = $_POST['user_phone'];
    }
    if (empty($_POST['country'])) {
        $errors['country'] = "Country is Required";
    }
    if ($_POST['country'] === 'select') {
        $errors['country'] = "select country";
    } else {
        $user_country_id = $_POST['country'];
        $sql = "SELECT * FROM `countries` WHERE country_id='$user_country_id'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        $user_country_id = $row['country_name'];
    }
    if (empty($_POST['user_street_address'])) {
        $errors['user_street_address'] = "Address is Required";
    } else {
        $user_street_address = $_POST['user_street_address'];
    }
    if (empty($_POST['user_password'])) {
        $errors['user_password'] = "Password is Required";
    } else {
        $user_password = $_POST['user_password'];
        $pattern = '/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&-+=()])(?=\S+$).{8,20}$/';
        if (!preg_match($pattern, $user_password)) {
            $errors['user_password'] = "Please add atleast one uppercase, one lowercase, one digit, 
            one special character and it must be atleast 8 characters long";
        } else {
            $user_password = $_POST['user_password'];
            // $user_password=md5($user_password);
        }
    }
    if (empty($_POST['status'])) {
        $errors['status'] = "status is Required";
    } else {
        $active_status = $_POST['status'];
    }
    if (empty($_POST['city'])) {
        $errors['city'] = "city is Required";
    } else {
        $user_city_id = $_POST['city'];
        $sql = "SELECT * FROM `cities` WHERE city_id='$user_city_id'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        $user_city_id = $row['city_name'];
    }
    if (empty($_POST['state'])) {
        $errors['state'] = "state is Required";
    } else {
        $user_state_id = $_POST['state'];
        $sql = "SELECT * FROM `states` WHERE state_id='$user_state_id'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        $user_state_id = $row['state_name'];
    }
    if (empty($errors)) {
        // $user_firstname=$_POST['user_firstname'];
        $sql = "SELECT * FROM employee_roles WHERE role_name='$role_name'";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $role_id = $row['role_id'];
            $role_name = $row['role_name'];
            $role_slug = $row['role_slug'];
            $sql1 = "INSERT INTO `employee_users` (user_role_id,user_firstname,user_lastname,user_email,user_phone,Active_status,user_password,user_street_address,user_city_id,user_state_id,user_country_id)
        VALUES ('$role_id','$user_firstname','$user_lastname','$user_email','$user_phone','$active_status','$user_password','$user_street_address','$user_city_id','$user_state_id','$user_country_id')";
            $res = mysqli_query($con, $sql1);
            if ($res) {
                // echo "success";
                header('location:userTable.php?search_val=&sort=updated_at&page=1');
            }
        }
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
        form {
            border: 2px solid black;
            width: 40%;
            margin: auto;
            padding: 10px;
            border-radius: 5px;
            background-color: blanchedalmond;
            box-shadow: 10px 10px rgb(100, 100, 100, 0.3);
        }

        label {
            font-weight: bold;
            font-size: 18px;
            color: blue;
            padding-left: 10px;
        }

        input {
            margin: 5px;
            padding-left: 50px;
            padding-right: 50px;
            padding-top: 5px;
            padding-bottom: 5px;
            font-size: 15px;
            border-radius: 5px;
            text-align: center;
            width: 80%;
        }

        select {
            margin: 2px;
            padding-left: 30px;
            padding-right: 30px;
            padding-top: 5px;
            padding-bottom: 5px;
            width: 50%;
            text-align: center;
            font-size: 15px;
        }

        input[type~='submit'] {
            background-color: green;
            color: white;
            font-weight: bolder;
            font-size: 20px;
            width: 95%;
        }

        input[type~='submit']:hover {
            background-color: ;
        }

        span {
            color: red;
            font-size: small;
            margin: auto;
        }
    </style>
</head>

<body style="margin-auto; ">
    <h1 style="color:crimson; text-align:center">Add User</h1>
    <form method="POST" name="myForm" onsubmit="return validateForm()">

        <!-- <input type="text" name="role_slug" placeholder="Role slug"><br> -->
        <label for="fname">First Name: <span>*</span></label><br>
        <input type="text" name="user_firstname" id="firstName" class="check" 
            placeholder="User FirstName" value=<?php echo $_POST['user_firstname']; ?>><br>
        <span id="fname-error"><?php echo isset($errors['user_firstname']) ? $errors['user_firstname'] : " "; ?></span>
        <span id="firstName_error"></span><br>
        <label for="fname">Last Name: <span>*</span></label><br>
        <input type="text" name="user_lastname" id="lastName" placeholder="User LastName" value=<?php echo $_POST['user_lastname']; ?>><br>
        <span><?php echo isset($errors['user_lastname']) ? $errors['user_lastname'] : " "; ?></span>
        <span id="lastName_error"></span><br>
        <label for="role">Select Role <span>*</span></label><br>
        <Select id="role" name="role_name" value=<?php echo $_POST['role_name']; ?>><br>
            <option value="selectRole">Select Role</option>
            <option value="Developer">Developer</option>
            <option value="Sr. Developer">Sr. Developer</option>
            <option value="Team Lead">Team Lead</option>
            <option value="Manager">Manager</option>
            <option value="CEO">CEO</option>
            <option value="BDE">BDE</option>
            <option value="CTO">CTO</option>
            <option value="Office Boy">Office Boy</option>
            <option value="Tester">Tester</option>
            <option value="Analyst">Analyst</option>
            <?php
            // $sql="SELECT * from employee_roles";
            // $result=mysqli_query($con,$sql);
            // if($result){
            //     while($row=mysqli_fetch_assoc($result)){
            //         $role_name=$row['role_name'];
            //         echo "<option value=$role_name>$role_name</option>";
            // }}
            ?>
        </Select><br>
        <span><?php echo isset($errors['role_name']) ? $errors['role_name'] : " "; ?></span>
        <span id="role_error"></span><br>
        <!-- <input type="text" name="role_name" placeholder="Role name"><br> -->
        <label for="fname">Email: <span>*</span></label><br>
        <input type="text" id="email" name="user_email" placeholder="Email" value=<?php echo $_POST['user_email']; ?>><br>
        <span><?php echo isset($errors['user_email']) ? $errors['user_email'] : " "; ?></span>
        <span id="email_error"></span><br>
        <label for="fname">Phone: <span>*</span></label><br>
        <input type="text" id="phone" name="user_phone" placeholder="Phone" value=<?php echo $_POST['user_phone']; ?>><br>
        <span><?php echo isset($errors['user_phone']) ? $errors['user_phone'] : " "; ?></span>
        <span id="phone_error"></span><br>
        <label for="fname">Select Address: <span>*</span></label><br>
        <input type="text" id="address" name="user_street_address" placeholder="Address" value=<?php echo $_POST['user_street_address']; ?>><br>
        <span><?php echo isset($errors['user_street_address']) ? $errors['user_street_address'] : " "; ?></span>
        <span id="address_error"></span><br>
        <label for="fname">Enter Password: <span>*</span></label><br>
        <input type="text" pattern='/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&-+=()])(?=\S+$).{8,20}$/'
            id="password" name="user_password" placeholder="Enter Password" value=<?php echo $_POST['user_password']; ?>><br>
        <span><?php echo isset($errors['user_password']) ? $errors['user_password'] : " "; ?></span>
        <span id="password_error"></span><br>
        <label for="fname">Select Status <span>*</span></label><br>
        <select name="status" id="status" value=<?php echo $_POST['status']; ?>><br>
            <option value="Active">Active</option>
            <option value="InActive">InActive</option>
        </select>
        <span><?php echo isset($errors['status']) ? $errors['status'] : " "; ?></span>
        <span id="status_error"></span><br>
        <label for="fname">Select Country <span>*</span></label><br>
        <select name="country" id="ctr" onclick="fetch_state()" value=<?php echo $_POST['country']; ?>><br>
            <option value="select">Select Country</option>
            <?php
            $sql = "SELECT country_name,country_id FROM countries";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $country_name = $row['country_name'];
                $country_id = $row['country_id'];
                echo "<option value='$country_id'>$country_name</option>";
            }
            ?>
        </select><br>
        <span><?php echo isset($errors['country']) ? $errors['country'] : " "; ?></span>
        <span id="country_error"></span><br>
        <label for="fname">Select State <span>*</span></label>
        <select disabled name="state" id="ste" onclick="fetch_city()" value=<?php echo $_POST['state']; ?>><br>
            <option value="select">Select State</option>
        </select>
        <span><?php echo isset($errors['state']) ? $errors['state'] : " "; ?></span>
        <span id="state_error"></span><br>
        <label for="fname">Select City <span>*</span></label>
        <select disabled name="city" id="city" value=<?php echo $_POST['city']; ?>><br>
            <option value="select">Select City</option>
        </select>
        <span><?php echo isset($errors['city']) ? $errors['city'] : " "; ?></span>
        <span id="city_error"></span><br>
        <!-- <input type="text" name="user_city_id" placeholder="City_id"><br>
        <input type="text" name="user_state_id" placeholder="State_id"><br> -->
        <input type="submit" value="Submit" name="submit">
    </form>
    <script>
        function fetch_state() {
            const country_id = document.getElementById('ctr').value;
            if (typeof (country_id) === "number") {
                document.getElementById('ste').removeAttribute("disabled");
            }
            else {
                document.getElementById('ste').setAttribute("disabled", true);
                document.getElementById('city').setAttribute("disabled", true);
            }
            console.log(country_id);
            const requestOptions = {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    country_id: country_id
                }),
                redirect: 'follow'
            };

            fetch("getData.php/", requestOptions)
                .then(response => {

                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    const contentType = response.headers.get('content-type');
                    if (contentType && contentType.includes('application/json')) {
                        return response.json();
                    } else {
                        throw new Error('Response is not JSON');
                    }
                })
                .then(result => {
                    const countrySelect = document.getElementById('ste');
                    countrySelect.innerHTML = '';
                    result.forEach(element => {
                        let option = document.createElement('option');
                        option.textContent = element.state_name;
                        option.value = element.state_id;
                        countrySelect.appendChild(option);
                        option = null
                    });
                    countrySelect.removeAttribute('disabled')
                }
                )
                .catch(error => console.log('error', error));
        }
        function fetch_city() {
            const state_id = document.getElementById('ste').value;
            if (typeof (state_id) === "number") {
                document.getElementById('city').removeAttribute("disabled");
            } else {
                document.getElementById('city').setAttribute("disabled", true);
            }
            // document.getElementById('city').removeAttribute("disabled");
            console.log(state_id);

            const requestOptions = {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    state_id: state_id
                }),
                redirect: 'follow'
            };
            fetch("getDataCity.php/", requestOptions)
                .then(response => {

                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }

                    const contentType = response.headers.get('content-type');
                    if (contentType && contentType.includes('application/json')) {
                        return response.json();
                    } else {
                        throw new Error('Response is not JSON');
                    }
                })
                .then(result => {
                    const stateSelect = document.getElementById('city');
                    stateSelect.innerHTML = '';
                    result.forEach(element => {
                        let option = document.createElement('option');
                        option.textContent = element.city_name;
                        option.value = element.city_id;
                        stateSelect.appendChild(option);
                        option = null
                    });
                    stateSelect.removeAttribute('disabled')
                }
                )
                .catch(error => console.log('error', error));
        }
        function validateForm() {
            let isValid = true;
            let firstName = document.getElementById('firstName').value;
            let lastName = document.getElementById('lastName').value;
            let phone = document.getElementById('phone').value;
            let email = document.getElementById('email').value;
            let password = document.getElementById('password').value;
            let country = document.getElementById('ctr').value;
            let state = document.getElementById('ste').value;
            let city = document.getElementById('city').value;
            let role = document.getElementById('role').value;
            let address = document.getElementById('address').value;
            let status = document.getElementById('status').value;
            var pass_pattern = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&-+=()])(?=\S+$).{8,20}$/;
            var email_pattern = /[A-Za-z0-9\._%+\-]+@[A-Za-z0-9\.\-]+\.[A-Za-z]{2,}/;
            document.getElementById("firstName_error").innerHTML = "";
            document.getElementById("lastName_error").innerHTML = "";
            document.getElementById("email_error").innerHTML = "";
            document.getElementById("phone_error").innerHTML = "";
            document.getElementById("country_error").innerHTML = "";
            document.getElementById("state_error").innerHTML = "";
            document.getElementById("city_error").innerHTML = "";
            document.getElementById("status_error").innerHTML = "";
            document.getElementById("role_error").innerHTML = "";
            document.getElementById("password_error").innerHTML = "";
            document.getElementById("address_error").innerHTML = "";
            if (firstName == "") {
                document.getElementById("firstName_error").innerHTML = "Enter firstName";
                isValid = false;
            }
            if (lastName == "") {
                document.getElementById("lastName_error").innerHTML = "Enter lastname";
                isValid = false;
            }
            if (role == "selectRole") {
                document.getElementById("role_error").innerHTML = "Enter role";
                isValid = false;
            }
            if (country == "select") {
                document.getElementById("country_error").innerHTML = "Select country";
                isValid = false;
            }
            if (state == "") {
                document.getElementById("state_error").innerHTML = "select state";
                isValid = false;
            }if (state == "select") {
                document.getElementById("state_error").innerHTML = "Select state";
                isValid = false;
            }
            if (city == "") {
                document.getElementById("city_error").innerHTML = "select city";
                isValid = false;
            }
            if (city == "select") {
                document.getElementById("city_error").innerHTML = "Select city";
                isValid = false;
            }
            if (address == "") {
                document.getElementById("address_error").innerHTML = "Enter address";
                isValid = false;
            }
            if (status == "") {
                document.getElementById("status_error").innerHTML = "select status";
                isValid = false;
            }
            if (phone == "") {
                document.getElementById("phone_error").innerHTML = "Enter mobile number";
                isValid = false;
            } else if (phone.length != 10) {
                document.getElementById("phone_error").innerHTML = "Enter valid mobile number";
                isValid = false;
            }
            if (email == "") {
                document.getElementById("email_error").innerHTML = "Enter email";
                isValid = false;
            } else if (!email.match(email_pattern)) {
                document.getElementById("email_error").innerHTML = "Enter valid email";
                isValid = false;
            }
            if (password == "") {
                document.getElementById("password_error").innerHTML = "Enter password";
                isValid = false;
            } else if (!password.match(pass_pattern)) {
                document.getElementById("password_error").innerHTML = "password must be atleast 8 characters long and it should have 1 uppercase 1 lowercase 1 digit and 1 special character "
                isValid = false;
            }
            return isValid;
        }
    </script>

</body>

</html>