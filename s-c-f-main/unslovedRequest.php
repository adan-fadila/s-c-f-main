<?php
session_start();
$requestId = $_GET['requestId'];
$patientId = $_GET['patientId'];
$_SESSION["request_id"] = $requestId;
include './db/unsolvedRequestInfo.php';
include './components/doctorHeader/doctorHeader.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>request</title>
    <link rel="styleSheet" href="./css/add_treatment.css">
    <?php addDoctorHeaderHeadLinks(); ?>
    <script src="./js/unsolvedRequest.js"></script>
    <script src="./js/add_treatment.js"></script>
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
                    <h5 class="card-title">request details</h5>
                    <div class="row g-0">
                        <div class="col-md-8">
                            <p class="card-text">full name: <?php echo $unsolvedRequestRow["fullName"]; ?></p>
                            <p class="card-text">email: <?php echo $unsolvedRequestRow["Email"]; ?></p>
                            <p class="card-text">weight: <?php echo $unsolvedRequestRow["weight"]; ?></p>
                            <p class="card-text">height: <?php echo $unsolvedRequestRow["height"]; ?></p>
                        </div>

                        <div class="col-md-4">
                            <p class="card-text">diagnosis: <?php echo $unsolvedRequestRow["diagnosis"]; ?></p>
                            <p class="card-text">allergy: <?php echo $unsolvedRequestRow["allergies"]; ?></p>
                            <p class="card-text"><?php if ($unsolvedRequestRow["vegeterian"] == 1) {
                                                        echo 'vegeterian';
                                                    }; ?></p>

                        </div>
                    </div>
                </div>
            </div>
            <button type="button" id="openModalBtn" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                add treatment
            </button>

        </div>

        <h3>patient request history</h3>

        <table id="patientRequestHistory" class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">diagnosis</th>
                    <th scope="col">status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 0;
                $requestId;
                while ($PatientHistoryRequestsRow = mysqli_fetch_assoc($PatientHistoryRequestsRes)) {

                    $requestId = $PatientHistoryRequestsRow["id"];
                    $diagnosis = $unsolvedRequestRow["diagnosis"];
                    $status = $unsolvedRequestRow["proccessed"];
                    $count++;
                    echo '<tr>
                        <th scope="row">' . $count . '</th>
                        <td>' . $diagnosis . '</td>';
                    if ($status == 0) {
                        echo '<td> unsolved </td>';
                    } else {
                        echo '<td> solved </td>';
                    }

                    echo '</tr>';
                }

                ?>

            </tbody>
        </table>



        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">add treatment</h5>
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