<?php
include "db.php";
$userName = $_POST["userName"];
$pass = $_POST["password"];
$mail = $_POST["email"];
$birthday = $_POST["birthday"];
$userType = 'patient';
$query = "INSERT INTO tbl_225_users (fullName,Birthday,Email,password,user_type) VALUES ('$userName', '$birthday', '$mail', '$pass', '$userName')";
$result = mysqli_query($con, $query);

header('Location: ' . '../index.php');
