<?php
include 'connect.php';
$sql = "CREATE TABLE employee_roless (
role_id INT(10) PRIMARY KEY,
role_slug VARCHAR(20) NOT NULL,
role_name VARCHAR(20) NOT NULL,
role_created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
role_updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
role_deleted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
$sql = "CREATE TABLE employee_users (
    user_id INT(10) PRIMARY KEY,
    user_role_id INT,
    user_firstname VARCHAR(20) NOT NULL,
    user_lastname VARCHAR(20) NOT NULL,
    user_email VARCHAR(20) NOT NULL,
    user_phone INT(10) NOT NULL,
    user_street_address VARCHAR(40) NOT NULL,
    user_city_id INT(20) NOT NULL,
    user_state_id INT(20) NOT NULL,
    user_country_id INT(20) NOT NULL,
    FOREIGN KEY(user_role_id) REFERENCES employee_roless(role_id)
    )";
$sql = "INSERT INTO employee_roless(role_id,role_slug,role_name,role_created_at,role_updated_at,role_deleted_at)
         VALUES (1111,'aaaa','developer','2024-06-15 12:30:20','2024-06-15 12:30:20','2024-06-15 12:30:20')";
$sql = "INSERT INTO employee_roless(role_id,role_slug,role_name,role_created_at,role_updated_at,role_deleted_at)
         VALUES (1112,'bbbb','sr. developer','2024-06-15 12:30:20','2024-06-15 12:30:20','2024-06-15 12:30:20')";
$sql = "INSERT INTO employee_roless(role_id,role_slug,role_name,role_created_at,role_updated_at,role_deleted_at)
         VALUES (1113,'cccc','teamlead','2024-06-15 12:30:20','2024-06-15 12:30:20','2024-06-15 12:30:20')";
$sql = "INSERT INTO employee_roless(role_id,role_slug,role_name,role_created_at,role_updated_at,role_deleted_at)
         VALUES (1114,'dddd','manager','2024-06-15 12:30:20','2024-06-15 12:30:20','2024-06-15 12:30:20')";
$sql = "INSERT INTO employee_roless(role_id,role_slug,role_name,role_created_at,role_updated_at,role_deleted_at)
         VALUES (1115,'eeee','ceo','2024-06-15 12:30:20','2024-06-15 12:30:20','2024-06-15 12:30:20')";
$sql = "INSERT INTO employee_roless(role_id,role_slug,role_name,role_created_at,role_updated_at,role_deleted_at)
         VALUES (1116,'ffff','cto','2024-06-15 12:30:20','2024-06-15 12:30:20','2024-06-15 12:30:20')";
$sql = "INSERT INTO employee_roless(role_id,role_slug,role_name,role_created_at,role_updated_at,role_deleted_at)
         VALUES (1117,'gggg','office boy','2024-06-15 12:30:20','2024-06-15 12:30:20','2024-06-15 12:30:20')";
$sql = "INSERT INTO employee_roless(role_id,role_slug,role_name,role_created_at,role_updated_at,role_deleted_at)
         VALUES (1118,'hhhh','developer','2024-06-15 12:30:20','2024-06-15 12:30:20','2024-06-15 12:30:20')";
$sql = "INSERT INTO employee_users(user_id,user_role_id,user_firstname,user_lastname,user_email,user_phone, 
user_street_address,user_city_id,user_state_id,user_country_id) VALUES (1221,1111,'John','Doe',
'john@gmail.com',98876986,'chennai',62,78,45)";
$sql = "INSERT INTO employee_users(user_id,user_role_id,user_firstname,user_lastname,user_email,user_phone, 
user_street_address,user_city_id,user_state_id,user_country_id) VALUES (1222,1118,'Olive ','Yew',
'olive@gmail.com',98234867,'punjab',89,2332,452)";
$sql = "INSERT INTO employee_users(user_id,user_role_id,user_firstname,user_lastname,user_email,user_phone, 
user_street_address,user_city_id,user_state_id,user_country_id) VALUES (1223,1111,'Dee','End',
'dee@gmail.com',98438727,'punjab',48,2332,473)";
$sql = "INSERT INTO employee_users(user_id,user_role_id,user_firstname,user_lastname,user_email,user_phone, 
user_street_address,user_city_id,user_state_id,user_country_id) VALUES (1224,1114,'Ray','Sin',
'ray@gmail.com',25246565,'haryana',231,43,54)";
$sql = "INSERT INTO employee_users(user_id,user_role_id,user_firstname,user_lastname,user_email,user_phone, 
user_street_address,user_city_id,user_state_id,user_country_id) VALUES (1225,1112,'Anita','Letterback',
'anita@gmail.com',86754733,'tamilnadu',342,43,87)";
$sql = "INSERT INTO employee_users(user_id,user_role_id,user_firstname,user_lastname,user_email,user_phone, 
user_street_address,user_city_id,user_state_id,user_country_id) VALUES (1226,1118,'Bea','Mine',
'bea@gmail.com',63773543,'telangana',88,546,987)";
$sql = "INSERT INTO employee_users(user_id,user_role_id,user_firstname,user_lastname,user_email,user_phone, 
user_street_address,user_city_id,user_state_id,user_country_id) VALUES (1227,1113,'Barry','Cuda',
'barry@gmail.com',56453435,'patna',467,67,675)";
$sql = "INSERT INTO employee_users(user_id,user_role_id,user_firstname,user_lastname,user_email,user_phone, 
user_street_address,user_city_id,user_state_id,user_country_id) VALUES (1228,1116,'Ben','Dover',
'ben@gmail.com',46357763,'noida',142,32,12)";
$sql = "INSERT INTO employee_users(user_id,user_role_id,user_firstname,user_lastname,user_email,user_phone, 
user_street_address,user_city_id,user_state_id,user_country_id) VALUES (1229,1117,'Manny','Jah',
'manny@gmail.com',98554654,'chennai',354,534,78)";
$sql = "INSERT INTO employee_users(user_id,user_role_id,user_firstname,user_lastname,user_email,user_phone, 
user_street_address,user_city_id,user_state_id,user_country_id) VALUES (1230,1115,'Mark','Ateer',
'mark@gmail.com',78465435,'bangalore',34,564,965)";
$sql = "INSERT INTO employee_users(user_id,user_role_id,user_firstname,user_lastname,user_email,user_phone, 
user_street_address,user_city_id,user_state_id,user_country_id) VALUES (1231,1113,'Tex','Ryta',
'tex@gmail.com',78754367,'noida',3473,564,546)";
$sql = "UPDATE employee_roless SET role_slug='dev',role_name='Developer',role_created_at=now() WHERE role_id=1111";
$sql = "UPDATE employee_roless SET role_slug='sr.dev',role_name='Sr. Developer',role_created_at=now() WHERE role_id=1112";
$sql = "UPDATE employee_roless SET role_slug='tl',role_name='Team Lead',role_created_at=now() WHERE role_id=1113";
$sql = "UPDATE employee_roless SET role_slug='mgr',role_name='Manager',role_created_at=now() WHERE role_id=1114";
$sql = "UPDATE employee_roless SET role_slug='ceo',role_name='CEO',role_created_at=now() WHERE role_id=1115";
$sql = "UPDATE employee_roless SET role_slug='cto',role_name='CTO',role_created_at=now() WHERE role_id=1116";
$sql = "UPDATE employee_roless SET role_slug='ob',role_name='Office Boy',role_created_at=now() WHERE role_id=1117";
$sql = "UPDATE employee_roless SET role_slug='dev',role_name='Developer',role_created_at=now() WHERE role_id=1118";
$sql = "CREATE TABLE country(country_id INT(10) NOT NULL,country_name VARCHAR(20) NOT NULL, country_code INT(10) NOT NULL, CONSTRAINT ccountry UNIQUE(country_id,country_code))";
$sql = "INSERT INTO country (country_id,country_name,country_code)
VALUES (121,'India',561)";
$sql = "INSERT INTO country (country_id,country_name,country_code)
VALUES (122,'Japan',562)";
$sql = "INSERT INTO country (country_id,country_name,country_code)
VALUES (123,'Bhutan',563)";
$sql = "CREATE TABLE state(state_id INT(10) NOT NULL,state_name VARCHAR(20) NOT NULL, state_code INT(10) NOT NULL, CONSTRAINT sstate UNIQUE(state_id,state_code))";
$sql = "INSERT INTO state (state_id,state_name,state_code)
VALUES (111,'Haryana',987)";
$sql = "INSERT INTO state (state_id,state_name,state_code)
VALUES (112,'Punjab',988)";
$sql = "CREATE TABLE city(city_id INT(10) NOT NULL,city_name VARCHAR(20) NOT NULL, city_code INT(10) NOT NULL, CONSTRAINT ccity UNIQUE(city_id,city_code))";
$sql = "INSERT INTO city (city_id,city_name,city_code)
VALUES (441,'Ludhiana',66)";
$sql = "INSERT INTO city (city_id,city_name,city_code)
VALUES (443,'Mohali',65)";
$sql = "ALTER TABLE employee_roless AUTO_INCREMENT=100";
// $sql="ALTER TABLE employee_roless AUTO_INCREMENT=100";
// $sql="TRUNCATE "
$sql = "INSERT INTO employee_roless(role_slug,role_name)
         VALUES ('dev','Developer')";
// $sql="ALTER TABLE employee_roless MODIFY role_id INT(5) AUTO_INCREMENT=1000";
$sql = "CREATE TABLE employee_roles (
    role_id INT(10) PRIMARY KEY AUTO_INCREMENT,
    role_slug VARCHAR(20) NOT NULL,
    role_name VARCHAR(20) NOT NULL,
    role_created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    role_updated_at TIMESTAMP DEFAULT null ON UPDATE CURRENT_TIMESTAMP,
    role_deleted_at TIMESTAMP DEFAULT null ON UPDATE CURRENT_TIMESTAMP
    )";
$sql = "CREATE TABLE employee_users (
        user_id INT(10) PRIMARY KEY AUTO_INCREMENT,
        user_role_id INT,
        user_firstname VARCHAR(20) NOT NULL,
        user_lastname VARCHAR(20) NOT NULL,
        user_email VARCHAR(20) NOT NULL,
        user_phone INT(10) NOT NULL,
        user_street_address VARCHAR(40) NOT NULL,
        user_city_id INT(20) NOT NULL,
        user_state_id INT(20) NOT NULL,
        user_country_id INT(20) NOT NULL,
        FOREIGN KEY(user_role_id) REFERENCES employee_roles(role_id)
        )";
$sql = "INSERT INTO employee_roles(role_slug,role_name)
        VALUES ('dev','Developer')";
$sql = "INSERT INTO employee_roles(role_slug,role_name)
        VALUES ('sr dev','Sr. Developer')";
$sql = "INSERT INTO employee_roles(role_slug,role_name)
        VALUES ('tl','TeamLead')";
$sql = "INSERT INTO employee_roles(role_slug,role_name)
        VALUES ('mgr','Manager')";
$sql = "INSERT INTO employee_roles(role_slug,role_name)
        VALUES ('ceo','CEO')";
$sql = "INSERT INTO employee_roles(role_slug,role_name)
        VALUES ('cto','CTO')";
$sql = "INSERT INTO employee_roles(role_slug,role_name)
        VALUES ('ob','Office Boy')";
$sql = "INSERT INTO employee_users(user_role_id,user_firstname,user_lastname,user_email,user_phone, 
user_street_address,user_city_id,user_state_id,user_country_id) VALUES (1,'John','Doe',
'john@gmail.com',98876986,'chennai',62,78,45)";
$sql = "INSERT INTO employee_users(user_role_id,user_firstname,user_lastname,user_email,user_phone, 
user_street_address,user_city_id,user_state_id,user_country_id) VALUES (1,'Olive ','Yew',
'olive@gmail.com',98234867,'punjab',89,2332,452)";
$sql = "INSERT INTO employee_users(user_role_id,user_firstname,user_lastname,user_email,user_phone, 
user_street_address,user_city_id,user_state_id,user_country_id) VALUES (7,'Dee','End',
'dee@gmail.com',98438727,'punjab',48,2332,473)";
$sql = "INSERT INTO employee_users(user_role_id,user_firstname,user_lastname,user_email,user_phone, 
user_street_address,user_city_id,user_state_id,user_country_id) VALUES (2,'Ray','Sin',
'ray@gmail.com',25246565,'haryana',231,43,54)";
$sql = "INSERT INTO employee_users(user_role_id,user_firstname,user_lastname,user_email,user_phone, 
user_street_address,user_city_id,user_state_id,user_country_id) VALUES (4,'Anita','Letterback',
'anita@gmail.com',86754733,'tamilnadu',342,43,87)";
$sql = "INSERT INTO employee_users(user_role_id,user_firstname,user_lastname,user_email,user_phone, 
user_street_address,user_city_id,user_state_id,user_country_id) VALUES (3,'Bea','Mine',
'bea@gmail.com',63773543,'telangana',88,546,987)";
$sql = "INSERT INTO employee_users(user_role_id,user_firstname,user_lastname,user_email,user_phone, 
user_street_address,user_city_id,user_state_id,user_country_id) VALUES (6,'Barry','Cuda',
'barry@gmail.com',56453435,'patna',467,67,675)";
$sql = "INSERT INTO employee_users(user_role_id,user_firstname,user_lastname,user_email,user_phone, 
user_street_address,user_city_id,user_state_id,user_country_id) VALUES (7,'Ben','Dover',
'ben@gmail.com',46357763,'noida',142,32,12)";
$sql = "INSERT INTO employee_users(user_role_id,user_firstname,user_lastname,user_email,user_phone, 
user_street_address,user_city_id,user_state_id,user_country_id) VALUES (2,'Manny','Jah',
'manny@gmail.com',98554654,'chennai',354,534,78)";
$sql = "INSERT INTO employee_users(user_role_id,user_firstname,user_lastname,user_email,user_phone, 
user_street_address,user_city_id,user_state_id,user_country_id) VALUES (5,'Mark','Ateer',
'mark@gmail.com',78465435,'bangalore',34,564,965)";
$sql = "INSERT INTO employee_users(user_role_id,user_firstname,user_lastname,user_email,user_phone, 
user_street_address,user_city_id,user_state_id,user_country_id) VALUES (6,'Tex','Ryta',
'tex@gmail.com',78754367,'noida',3473,564,546)";
$sql ="ALTER TABLE employee_users ADD created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP on UPDATE CURRENT_TIMESTAMP";
$sql ="ALTER TABLE employee_users ADD updated_at TIMESTAMP DEFAULT null on UPDATE CURRENT_TIMESTAMP";
$sql ="ALTER TABLE employee_users ADD deleted_at TIMESTAMP DEFAULT null";
$sql ="ALTER TABLE employee_users ADD user_password VARCHAR(20) NOT NULL";
// $sql ="ALTER TABLE employee_users ADD CONSTRAINT myPass CHECK(LENGTHB(user_password)>7)";
$sql ="ALTER TABLE employee_users ADD Active_status ENUM('Active','InActive') NOT NULL";
$sql="ALTER TABLE countries MODIFY country_id INT PRIMARY KEY";
$sql="INSERT INTO countries(country_id,country_name,country_code)
VALUES(111,'INDIA',001)";
$sql="INSERT INTO countries(country_id,country_name,country_code)
VALUES(112,'USA',002)";
$sql = "ALTER TABLE states MODIFY state_id INT PRIMARY KEY";
// $sql = "ALTER TABLE states ADD country_id INT FOREIGN_KEY(country_id) REFERENCES countries(country_id)";
$sql = "ALTER TABLE states ADD country_id INT not null";
$sql = "ALTER TABLE states ADD FOREIGN_KEY(country_id) REFERENCES countries(country_id)";
$sql="INSERT INTO states(state_id,state_name,state_code,country_id)
VALUES(981,'Haryana',041,111)";
$sql="INSERT INTO states(state_id,state_name,state_code,country_id)
VALUES(982,'Punjab',042,111)";
$sql="INSERT INTO states(state_id,state_name,state_code,country_id)
VALUES(471,'Hawaii',831,112)";
$sql="INSERT INTO states(state_id,state_name,state_code,country_id)
VALUES(472,'Texas',832,112)";
$sql="ALTER TABLE cities ADD state_id INT NOT NULL";
$sql="ALTER TABLE cities ADD FOREIGN KEY(state_id) REFERENCES states(state_id)";
$sql="ALTER TABLE cities MODIFY city_id INT NOT NULL PRIMARY KEY";
// $sql ="ALTER TABLE employee_users MODIFY user_phone INT( 12 ) NOT NULL";
// $sql ="ALTER TABLE employee_users ADD active_status CONSTRAINT status CHECK (active_status = 'Active' OR active_status = 'InActive') DEFAULT 'Active'";
$sql="INSERT INTO cities(city_id,city_name,city_code,state_id) VALUES (491,'Kaithal',91,981)";
$sql="INSERT INTO cities(city_id,city_name,city_code,state_id) VALUES (492,'Pehowa',92,981)";
$sql="INSERT INTO cities(city_id,city_name,city_code,state_id) VALUES (493,'Ludhiana',93,481)";
$sql="INSERT INTO cities(city_id,city_name,city_code,state_id) VALUES (494,'Patiala',94,481)";
$sql="INSERT INTO cities(city_id,city_name,city_code,state_id) VALUES (495,'Hawi',95,471)";
$sql="INSERT INTO cities(city_id,city_name,city_code,state_id) VALUES (496,'Hilo',96,471)";
$sql="INSERT INTO cities(city_id,city_name,city_code,state_id) VALUES (497,'Austin',95,472)";
$sql="INSERT INTO cities(city_id,city_name,city_code,state_id) VALUES (498,'Dallas',98,472)";
$sql="ALTER TABLE employee_users ADD country VARCHAR(10) NOT NULL ";
if (mysqli_query($con, $sql)) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($con);
}
?>