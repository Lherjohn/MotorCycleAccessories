<?php
ob_start();
session_start();
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accessories</title>
    <!-- css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>

</head>

<body>

    <div class="container-fluid vh-100 px-md-5">
        <nav class="navbar navbar-expand bg-body" style="background-color: #e3f2fd;">

            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-lg-0 text-center">
                        <a class="nav-link active mx-1" aria-current="page" href="home.php">Home</a>
                        <a class="nav-link active mx-1" aria-current="page" href="index.php">Items</a>
                        <a class="nav-link active mx-1" aria-current="page" href="new.php">Create</a>
                        <a class="nav-link active mx-1" aria-current="page" href="about.php">About Us</a>
                    </ul>
                    <?php
                    if (isset($_SESSION['logged_in'])) { ?>
                        <a class="text-success text-decoration-none px-2" href="backend.php?logout">Logout</a>
                    <?php } else { ?>
                        <span class="px-lg-3">
                            <a type="button" class="btn btn-outline-success text px-3" aria-current="page" href="login.php">Login</a>
                        </span>
                    <?php } ?>
                </div>
            </div>
        </nav>