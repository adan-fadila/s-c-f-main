<?php include 'db.php';
$editRequestQuery = 'SELECT * From tbl_225_treatments  join tbl_225_users  on tbl_225_users.pid = tbl_225_treatments.patient_id  where tbl_225_treatments.id = ' . $requestId ;

$editRequestRes = mysqli_query($con, $editRequestQuery);
$editRequestRow = mysqli_fetch_assoc($editRequestRes);


mysqli_close($con);
