<?php
session_start();

function patientHeader()
{$name =  $_SESSION["name"];
  $currentPage = basename($_SERVER['PHP_SELF']);

  echo '	<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <a id="logo" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class=" collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto ">
          <li class="nav-item">
          <a class="nav-link mx-2 ' . ($currentPage === 'patientHome.php' ? 'active' : '') . '" id="home" href="patientHome.php">Home</a>
          </li>
          <li class="nav-item">
          <a class="nav-link mx-2 ' . ($currentPage === 'treatmintList.php' ? 'active' : '') . '" id="treatmentList" href="treatmintList.php">treatments list</a>
          </li>
          <li class="nav-item">
          <a class="nav-link mx-2 ' . ($currentPage === 'patientUnsolvedRequest.php' ? 'active' : '') . '" href="patientUnsolvedRequest.php">unsolved requests</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link mx-2 dropdown-toggle" href="patientHome.php" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              '.$name.'
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="signOut.php">sign out</a></li>
           
            </ul>
          </li>
        </ul>
      </div>
    </div>
    </nav>';
}

function patientHeaderLinks()
{
  echo ' <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<link rel="styleSheet" href="components\patientHeader\patientHeader.css">
';
}
