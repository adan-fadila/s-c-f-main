<?php
session_start();

include './db/editReport.php';
include './components/doctorHeader/doctorHeader.php';

?>
<!DOCTYPE html>
<html>

<head>
    <?php addDoctorHeaderHeadLinks() ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="styleSheet" href="./css/doctorStyle.css">
    <script src="./js/editrequestList.js"></script>


</head>

<body>
    <header><?php addHeader() ?></header>
    <main>
        <h3>edit requests List</h3>

        <table id="editRequestTable" class="table">
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
                while ($editRequestRow = mysqli_fetch_assoc($editRequestRes)) {

                    $requestId = $editRequestRow["id"];
                    $name = $editRequestRow["fullName"];
                    $birth = $editRequestRow["Birthday"];
                    $age =  (date('Y') - date('Y', strtotime($birth)));
                    $count++;
                    echo '<tr onclick="handleRowClick(' . $requestId .');"> 
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