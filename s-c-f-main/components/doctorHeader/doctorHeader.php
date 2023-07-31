<?php
function addHeader()
{
    $name = $_SESSION["name"];
    $currentPage = basename($_SERVER['PHP_SELF']);
    echo '
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" id="logo" href="#"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                             <a class="nav-link ' . ($currentPage === 'doctorHome.php' ? 'active' : '') . '" href="doctorHome.php">dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ' . ($currentPage === 'unsovedRequestList.php' ? 'active' : '') . '" href="unsovedRequestList.php">unsolved request</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ' . ($currentPage === 'editReports.php' ? 'active' : '') . '" href="editReports.php">edit reports</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ' . ($currentPage === 'solvedRequestList.php' ? 'active' : '') . '" href="solvedRequestList.php">solved requests</a>
                        </li>
                        
                    </ul>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ' . $name . '
                        </a>
                        <ul class="dropdown-menu">
                            
                            <li><a class="dropdown-item" href="signOut.php">sign out</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </nav>
    ';
}

function addDoctorHeaderHeadLinks()
{
    echo '
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="styleSheet" href="components\doctorHeader\doctorHeader.css">';
}
