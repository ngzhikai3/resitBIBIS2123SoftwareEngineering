<!DOCTYPE html>

<head>
  <title>SEP2022 Group 5</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../styles/w3.css">
  <link rel="stylesheet" type="text/css" href="../styles/style.css">
  <link rel="stylesheet" type="text/css" href="../styles/w3-theme--grey.css">
  <link rel="icon" type="image/x-icon" href="images/logo.png">
  <script src="https://kit.fontawesome.com/f63186d728.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <style>
    html,
    body,
    h1,
    h2,
    h3,
    h4,
    h5 {
      font-family: "Open Sans", sans-serif
    }
  </style>


</head>
<?php
include 'session.php';
include('dbcon.php');
?>

<body class="w3-theme-l5" onload="">
  <!-- Navbar -->
  <div class="w3-top">
    <div class="w3-bar bg-primary w3-left-align w3-large w3-padding">
      <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-opennav w3-right w3-padding-small w3-hover-white w3-large " href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
      <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4 text-white"><i class="fa-solid fa-house-user"></i></a>

      <!-- RIGHT SIDE -->
      <a href="../logout.php" title="Logout"><button class="w3-bar-item w3-btn w3-small w3-hide-small w3-right w3-hover-white">Logout</button></a>
      <span onclick="loadUser()" class="w3-bar-item w3-button w3-hide-small w3-right w3-margin-right bg-light px-2 rounded-circle text-dark" title="My Account"><i class="fa-regular fa-user"></i></span>
    </div>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-navblock bg-primary w3-large w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:51px">
    <ul class="w3-ul">
      <li onclick="loadUser()" class="" title="My Account">My Account</li>
      <li class="w3-hover-white"><a class="text-white" href="../logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></li>
    </ul>
  </div>