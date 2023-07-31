<?php include 'db.php';
$unsolvedRequestQuery = 'SELECT * From tbl_225_request join tbl_225_users  on tbl_225_users.pid = tbl_225_request.patient_id  where tbl_225_request.id = ' . $requestId ;

$unsolvedRequestRes = mysqli_query($con, $unsolvedRequestQuery);
$unsolvedRequestRow = mysqli_fetch_assoc($unsolvedRequestRes);

$PatientHistoryRequestsQuery = "SELECT * FROM tbl_225_request where patient_id = " . $patientId;
$PatientHistoryRequestsRes = mysqli_query($con, $PatientHistoryRequestsQuery);

mysqli_close($con);
