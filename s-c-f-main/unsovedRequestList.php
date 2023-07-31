<?php
session_start();


include './components/doctorHeader/doctorHeader.php';
include './db/getUnsolvedRequests.php';


?>
<!DOCTYPE html>
<html>

<head>
    <?php addDoctorHeaderHeadLinks() ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="styleSheet" href="./css/doctorStyle.css">
    <script src="./js/requestList.js"></script>


</head>

<body>
    <header><?php addHeader() ?></header>
    <main>
        <h3>unsolved requests List</h3>

        <table id="solvedRequestTable" class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">patient name</th>
                    <th scope="col">age</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 0;
                while ($unsolvedRequestRow = mysqli_fetch_assoc($unsolvedRequestRes)) {

                    $requestId = $unsolvedRequestRow["id"];
                    $patientId = $unsolvedRequestRow["patient_id"];
                    $name = $unsolvedRequestRow["fullName"];
                    $birth = $unsolvedRequestRow["Birthday"];
                    $age =  (date('Y') - date('Y', strtotime($birth)));
                    $count++;
                    echo '<tr onclick="handleRowClick(' . $requestId . ','.$patientId.');">
                    
                    <th scope="row">' . $count . '</th>
                    <td>' . $name . '</td>
                    <td>' . $age . '</td>
                </tr>';
                }

                ?>

            </tbody>
        </table>
    </main>
</body>

</html>