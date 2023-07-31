<?php
include "db.php";
session_start();
$request_id = $_POST["request_id"];
$meals = $_POST["treatment"];
$dueDate = date("Y-m-d", strtotime("+1 Months"));
$query = "UPDATE tbl_225_treatments
SET treatment = '$meals', edit = 0
WHERE id = '$request_id';";
$addTreatment = mysqli_query($con, $query);
if ($addTreatment === true) {
    echo "Success edit treatment";
}
$res =  mysqli_query($con,$updateProc);
mysqli_close($con)
?>