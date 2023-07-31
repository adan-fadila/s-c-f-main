<?php
session_start();
$requestId = $_GET['requestId'];
include './db/editRequestInfo.php';
include './components/doctorHeader/doctorHeader.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>edit request</title>
    <link rel="styleSheet" href="./css//add_treatment.css">
    <?php addDoctorHeaderHeadLinks(); ?>
    <script src="./js/editRequest.js"></script>
    
    <link rel="styleSheet" href="./css/doctorStyle.css">

</head>

<body>
    <header>
        <?php addHeader(); ?>
    </header>
    <main>
        <div class="main-body">
            <div class="card request-details">
                <div class="card-body">
                    <h5 class="card-title">patient details</h5>
                    <div class="row g-0">
                        <div class="col-md-8">
                            <p class="card-text">full name: <?php echo $editRequestRow["fullName"]; ?></p>
                            <p class="card-text">email: <?php echo $editRequestRow["Email"]; ?></p>
                        </div>

                        <div class="col-md-4">
                            <p class="card-text">diagnosis: <?php echo $editRequestRow["diagnosis"]; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" id="openModalBtn" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                edit treatment
            </button>

        </div>

        <h3>edit request </h3>

       <div class="card" style="width:fit-content; padding: 3%;">
        <?php echo $editRequestRow["edit_request"]?>
       </div>



        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">edit treatment</h5>
                    </div>
                    <div class="modal-body">
                        <div class="t">
                            <a href="#" class="add">&plus;</a>
                        </div>
                        <form id="plan-form" method="post">
                            <div id="plan" class="plan">
                            </div>
                            <?php
                            include "db/get-patient-by-request-id.php";
                            $data = mysqli_fetch_assoc($patientData);
                            $patient_id = $data["patient_id"];
                            $diagnosis = $data["diagnosis"];
                            echo '<input hidden name="patient_id" value="' . $patient_id . '">
                                <input hidden name="diagnosis" value="' . $diagnosis . '">
                                <input hidden name="request_id" value="' . $requestId . '">';
                                
                            mysqli_free_result($patientData);
                            ?>



                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">send treatment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>