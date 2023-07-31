<?php

include 'db/db.php';
include './components/patientHeader/patientHeader.php';

?>
<!DOCTYPE html>
<html>

<head>
    <?php patientHeaderLinks() ?>
    <link rel="stylesheet" href="css/treatmentList.css">
    <script src='./js/treatmintList.js'></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</head>

<body>
    <header>

        <?php patientHeader(); ?>
    </header>
    <main>

        <table class="table table-striped ">

            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">diagnosis</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col">more</th>
                </tr>
            </thead>
            <tbody class=".table-hover data_table">
                <?php

                $query = "select * from tbl_225_treatments; ";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $more = ' <a href="./mainObject.php?treatmentId=' . $row["id"] . '.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                            </svg>
                                </a>';

                    echo '<tr>
                                <td>' . $row["id"] . '</td>
                                <td >' . $row["diagnosis"] . '</td>';
                    if ($row["edit"] == 0) {
                        echo '<td><button type="button"  data-toggle="modal" data-target="#exampleModal"  class="btn btn-secondary editButton" data-id = ' . $row["id"] . '>edit</button>';
                    } else {
                        echo '<td><button type="button"  data-toggle="modal" data-target="#exampleModal"  class="btn btn-secondary" disabled>sent</button>';
                    }

                    echo ' <td> <button type="button"  class="btn btn-danger deleteButton" data-id = ' . $row["id"] . '>Delete</button></td>
                                <td >' . $more . '</td>
                                
                                </td>
                                </tr>';
                }
                mysqli_free_result($result);
                mysqli_close($con);
                ?>
            </tbody>
        </table>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="editForm">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Message:</label>
                                <textarea class="form-control" name="message-text" id="message-text"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" id="sendMessageButton" class="btn btn-primary">Send message</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </main>
</body>

</html>