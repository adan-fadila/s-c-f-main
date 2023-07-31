<?php
include "db.php";
session_start();
$doctor_id = $_SESSION["id"];
$patient_id = $_POST["patient_id"];
$diagnosis = $_POST["diagnosis"];
$request_id = $_POST["request_id"];
$meals = $_POST["treatment"];
$dueDate = date("Y-m-d", strtotime("+1 Months"));
$query = "INSERT INTO tbl_225_treatments (doctor_id, treatment, diagnosis, patient_id) 
   VALUES ('$doctor_id', '$meals', '$diagnosis', '$patient_id')";
$addTreatment = mysqli_query($con, $query);
if ($addTreatment === true) {
    echo "Success add treatment";
}
$updateProc = "UPDATE tbl_225_request
SET proccessed = 1 where
id =".$request_id;
$res =  mysqli_query($con,$updateProc);
mysqli_close($con)
?>