<?php
session_start();
include './components/doctorHeader/doctorHeader.php';
include 'db/getDoctorPatientList.php';
?>
<!DOCTYPE html>
<html>

<head>
    <?php addDoctorHeaderHeadLinks() ?>
    <link rel="styleSheet" href="./css/doctorStyle.css">
</head>

<body>
    <header><?php addHeader() ?></header>
    <main>
        <h3>patient List</h3>

        <table class="table">
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
                while ($patientListRow = mysqli_fetch_assoc($patientListRes)) {
                    $birth = $patientListRow["Birthday"];
                    $age =  (date('Y') - date('Y', strtotime($birth)));
                    $count++;
                    echo '<tr>
                    <th scope="row">' . $count . '</th>
                    <td>' . $patientListRow["fullName"] . '</td>
                    <td>' . $age . '</td>
                </tr>';
                }

                ?>

            </tbody>
        </table>
    </main>
</body>

</html>