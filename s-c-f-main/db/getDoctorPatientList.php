<?php
    include 'db/db.php';
    $patientListQuery = 'SELECT * from tbl_225_users join tbl_225_request on tbl_225_users.pid = tbl_225_request.patient_id join  tbl_225_doctor_method on tbl_225_request.method_id = tbl_225_doctor_method.method_id join tbl_225_doctor on tbl_225_doctor.id = tbl_225_doctor_method.doctor_id where tbl_225_doctor.user_id ='.$_SESSION["id"].';'; 
    $patientListRes = mysqli_query($con,$patientListQuery);
    
   