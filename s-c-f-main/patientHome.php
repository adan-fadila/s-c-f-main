<?php
include './components/patientHeader/patientHeader.php';
include './db/patientHomeInfo.php';


?>
<!DOCTYPE html>
<html>

<head>
    <title>home</title>
    <?php patientHeaderLinks(); ?>
    <link rel="styleSheet" href="./css/patientStyle.css">
</head>

<body>
    <header>
        <?php patientHeader(); ?>
    </header>
    <main>
        <div class="container-fluid">
            <section>
                <div class="upper">

                    <h5 class="text-uppercase">recently informaition</h5>


                    <a role="button" href="./request_treatment.php" class="btn btn-primary btn-sm">request treatment</a>

                </div>
                <div class="row">
                    <div class="col-xl-6 col-md-12 mb-4">
                        <a href="treatmintList.php" class="card">
                            <div class="card-body home-card">
                                <div class="d-flex justify-content-between p-md-1">
                                    <div class="d-flex flex-row">
                                        <h4>solved request</h4>
                                    </div>
                                    <div class="align-self-center">
                                        <h2 class="h1 mb-0"><?php echo $solvedRequestsCount; ?></h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-6 col-md-12 mb-4">
                        <a href="./patientUnsolvedRequest.php" class="card home-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between p-md-1">
                                    <div class="d-flex flex-row">
                                        <div class="align-self-center">
                                            <i class="far fa-comment-alt text-warning fa-3x me-4"></i>
                                        </div>
                                        <div>
                                            <h4>unsolved requests</h4>
                                        </div>
                                    </div>
                                    <div class="align-self-center">
                                        <h2 class="h1 mb-0"><?php echo $unsolvedRequestsCount; ?></h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>

</html>