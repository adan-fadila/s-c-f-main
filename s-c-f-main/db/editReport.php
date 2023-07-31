<?php include "db.php";
$editRequestQuery = "SELECT tbl_225_treatments.id,tbl_225_users.fullName,tbl_225_users.Birthday,tbl_225_users.pid  FROM tbl_225_treatments join tbl_225_users on tbl_225_users.pid = tbl_225_treatments.patient_id join
tbl_225_doctor on tbl_225_treatments.doctor_id = tbl_225_doctor.user_id where tbl_225_treatments.doctor_id = ".$_SESSION["id"]." and edit =1;";

$editRequestRes = mysqli_query($con, $editRequestQuery);
