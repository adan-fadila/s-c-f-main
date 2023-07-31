<?php
include 'db.php';
$solvedRequestsQuery = 'SELECT count(tbl_225_treatments.id) as solvedRequestCount FROM tbl_225_treatments where patient_id ='.$_SESSION["id"];
$solvedRequestsRes = mysqli_query($con,$solvedRequestsQuery);
$solvedRequestsRow = mysqli_fetch_assoc($solvedRequestsRes);
$solvedRequestsCount = $solvedRequestsRow["solvedRequestCount"];
mysqli_free_result($solvedRequestsRes);

$unsolvedRequestsQuery = 'SELECT count(tbl_225_request.id) as unsolvedRequestCount FROM tbl_225_request where patient_id ='.$_SESSION["id"].' and proccessed  = 0';
$unsolvedRequestsRes = mysqli_query($con,$unsolvedRequestsQuery);
$unsolvedRequestsRow = mysqli_fetch_assoc($unsolvedRequestsRes);
$unsolvedRequestsCount = $unsolvedRequestsRow["unsolvedRequestCount"];
mysqli_free_result($unsolvedRequestsRes);
mysqli_close($con);