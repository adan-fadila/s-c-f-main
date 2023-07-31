<?php
include "db/db.php";
if (!empty($_POST["loginMail"])) {
    $query = "select * from tbl_225_users as p where p.email ='" . $_POST["loginMail"] . "' and p.password='" . $_POST["loginPass"] . "'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    if (is_array($row)) {
        session_start();
        $_SESSION["user-type"] = $row["user_type"];
        $_SESSION["id"] = $row["pid"];
        $_SESSION["name"] = $row["fullName"];
        if ($row["user_type"] == "doctor") {
            header('Location: ' . 'doctorHome.php');
        }
        if ($row["user_type"] == "patient") {
            header('Location: ' . 'patientHome.php');
        }
    } else {
        echo "faild";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Self Care First</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/login.js"></script>
</head>

<body>
    <div class="registration-form">
        <form action="#" method="post">
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <input type="text" name="loginMail" class="form-control item" id="email" placeholder="Email">
            </div>

            <div class="form-group">
                <input type="password" name="loginPass" class="form-control item" id="password" placeholder="Password">
            </div>


            <div class="form-group">
                <button type="submit" id="signIn" class="btn btn-block create-account">sign in</button>
            </div>
            <div class="form-group">
                <a href="signUp.php" id="signUp" class="btn btn-block create-account">sign up</a>
            </div>
            <div class="error-message"><?php if (isset($message)) {
                                            echo $message;
                                        } ?></div>
        </form>

    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>