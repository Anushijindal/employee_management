<?php
include 'connect.php';

$sql1 = "select *from Country";
$result1 = $con->query($sql1);


$sql3 = "select *from City";
$result3 = $con->query($sql3);



if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = md5($_POST['password']);
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $createdAT = time();
    $updatedAT = time();

    $sql = "insert into `employees` (fname,lname,age,email,mobile,password,country,state,city,createdAT,updatedAt) values('$fname','$lname','$age','$email','$mobile','$password','$country','$state','$city','$createdAT','$updatedAT')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header('location:index.php');
    } else {
        die(mysqli_error($con));
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="index.css">
    <title>CRUD</title>

</head>

<body>
    <div class="conatiner">
        <form method="post">
            <h2>Enter Details:</h2>
            <div class="form-group">
                <label>Enter First Name</label>
                <input type="text" class="form-control" name="fname" placeholder="Enter first name:" name="fname" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Enter Last Name</label>
                <input type="text" class="form-control" name="lname" placeholder="Enter last name:" name="lname" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Age</label>
                <input type="text" class="form-control" name="age" placeholder="Enter Age:" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" placeholder="Enter email:">
            </div>
            <div class="form-group">
                <label>Mobile No.</label>
                <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile:">
            </div>
            <div class="form-group">
                <label>Address:</label>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <h3>Country</h3>
                            <select name="country" class="countries form-control" id="countryId" onclick="test()">
                                <?php while ($row1 = mysqli_fetch_array($result1)) {
                                    echo " <option value='$row1[id]'>$row1[c_name]</option>";
                                } ?>
                            </select>

                        </div>
                        <div class="col-sm-4">
                            <h3>State</h3>
                            <select disabled name="state" class="states form-control" id="stateId">
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <h3>City</h3>
                            <select disabled name="city" class="cities form-control" id="cityId">
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter password:">
            </div>
            <button type="submit" class="btn-submit" name="submit">Submit</button>
        </form>
    </div>
    <script>
        function test() {
            const countryId = document.getElementById('countryId').value;
            document.getElementById('stateId').removeAttribute("disabled");
            console.log(countryId);

            const requestOptions = {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    countryId: countryId
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
                    const countrySelect = document.getElementById('stateId');
                    countrySelect.innerHTML = '';
                    result.forEach(element => {
                        let option = document.createElement('option');
                        option.textContent = element.state_name;
                        option.value = element.id;
                        countrySelect.appendChild(option);
                        option = null
                    });
                    countrySelect.removeAttribute('disabled')

                }

                )
                .catch(error => console.log('error', error));
        }
    </script>
</body>

</html>