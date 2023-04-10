<?php include '../config/database.php';
if (!isset($_SESSION)) {
  session_start();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Bros In A Bun</title>
  <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon"/>
</head>
<body>
  <nav class="navbar navbar-expand-sm navbar-light bg-light mb-4">
    <div class="container">
      <a class="navbar-brand" href="../home/home.php">Bros In A Bun</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <?php 
            if(isset($_SESSION['Role'])){
              if($_SESSION['Role']=='M'){
                ?><a class="nav-link" href="../home/man_home.php">Home</a> <?php
              } else {
                ?> <a class="nav-link" href="../home/home.php">Home</a> <?php
              }
            }
            ?>
            
          </li>
          <li class="nav-item">
            <?php
            if(isset($_SESSION['Role'])){
                if($_SESSION['Role'] == 'C'){
                  ?>
                  <a class="nav-link" href="../customer/Create-order.php">Create order</a>
                  <?php
                } else if($_SESSION['Role'] == 'M'){?>
                  <a class="nav-link" href="../manager/View-inventory.php">View Inventory</a>
                  <?php
                }
            }
            ?>
          </li>
          <li class="nav-item">
            <?php 
            if(isset($_SESSION['Role'])){
              if($_SESSION['Role'] == 'C') {?>
                <a class="nav-link" href="../customer/edit-c.php">Edit Account Info</a>
                <?php 
              } else if($_SESSION['Role'] == "M"){?>
                <a class="nav-link" href="../manager/edit-m.php">Edit Account Info</a>
                <?php 
              }
            } ?>
            
          </li>
          <li class="nav-item">
            <?php if(isset($_SESSION['Role'])){ ?>
              <a class="nav-link" href="../credentials/sign-out.php">Sign out</a>
            <?php } else { ?>
              <a class="nav-link" href="../credentials/sign-in.php">Sign in</a>
            <?php } ?>
          </li>
        </ul>
      </div>
  </div>
</nav>

<main>
  <div class="container d-flex flex-column align-items-center">
  <link rel="stylesheet" href="../mystyle.css">