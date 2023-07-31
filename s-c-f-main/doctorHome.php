<?php

session_start();
include './components/doctorHeader/doctorHeader.php';
include 'db/get-doctor-home-info.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>doctor</title>
    <?php addDoctorHeaderHeadLinks() ?>
    <link rel="styleSheet" href="./css/doctorStyle.css">
</head>

<body>
    <header>
        <?php addHeader() ?>
    </header>
    <main>
        <div class="container-fluid">
            <section>
                <div class="row">
                    <div class="col-12 mt-3 mb-1">
                        <h5 class="text-uppercase">recently informaition</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-md-12 mb-4">
                        <a href="solvedRequestList.php" class="card">
                            <div class="card-body home-card">
                                <div class="d-flex justify-content-between p-md-1">
                                    <div class="d-flex flex-row">

                                        <div>
                                            <h4>solved request</h4>

                                        </div>
                                    </div>
                                    <div class="align-self-center">
                                        <h2 class="h1 mb-0"><?php echo $solvedRequestCount; ?></h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col-xl-6 col-md-12 mb-4">
                        <a href="./unsovedRequestList.php" class="card home-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between p-md-1">
                                    <div class="d-flex flex-row">

                                        <div>
                                            <h4>unsolved requests</h4>

                                        </div>
                                    </div>
                                    <div class="align-self-center">
                                        <h2 class="h1 mb-0"><?php echo $unsolvedRequestCount; ?></h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>

                <div class="row">
                    <div class="col-xl-6 col-md-12 mb-4">
                        <a href="./editReports.php" class="card home-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between p-md-1">
                                    <div class="d-flex flex-row">

                                        <div>
                                            <h4>edit reports</h4>

                                        </div>
                                    </div>
                                    <div class="align-self-center">
                                        <h2 class="h1 mb-0"><?php echo $editRequestCount; ?></h2>
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