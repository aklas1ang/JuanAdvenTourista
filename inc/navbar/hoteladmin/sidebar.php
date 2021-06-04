<?php
    session_start();
    require_once '../db/db_conn.php';
    if (!$_SESSION['id']) {
        header('Location: adminLogin.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e2a19dca47.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Hotel Admin</title>
</head>

<body>
    <div class="container">
        <div class="profile text-center">
            <img src="src/img_avatar.png" class="rounded-circle" alt="profile" width="150" height="150">
            <h5 style="text-align: center;margin-top:20px;"><?php echo $_SESSION['fullname']; ?></h5>
            <small><?php echo $_SESSION['buildingName']; ?></small>
        </div>
        <hr>
        <div class="sidenav">
            <div class="dashboard">
                <a class="fa fa-dashboard" href="index.php" style="color:#dee5ec;font-size: 20px;">Dashboard</a>
                <!-- <i class="	fa fa-dashboard" style="font-size: 20px;"> Dashboard</i>
                <a class="nav-link" href="index.html"> -->

            </div>
            <div class="rooms">
                <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities"> -->
                <a class="fa fa-building" href="rooms.php" style="color:#dee5ec;font-size: 20px;">Rooms</a>


            </div>
            <!-- <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar"><br>
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Rooms Inventory:</h6>
                    <a class="collapse-item" href="hotelRooms.html">Hotel Rooms</a>
                    <a class="collapse-item" href="resortRooms.html">Resorts Rooms</a>
                    <a class="collapse-item" href="classtype.html">Class Type</a>
                    <a class="collapse-item" href="utilities-other.html">Other</a>
                </div>
            </div> -->
            <div class="spots">
                <a class="fas fa-mountain" href="spots.php" style="color:#dee5ec;font-size: 20px;">Spots</a>
            </div>
            <div class="spots">
                <a class="fas fa-mountain" href="bookings.php" style="color:#dee5ec;font-size: 20px;">Booking</a>
            </div>

            <div class="logout">
                <a class="fas fa-sign-out-alt" href="logout.php" style="color:#dee5ec;font-size: 20px;">Log out</a>
                <!-- <a class="nav-link" href="logout.html"> -->
            </div>
        </div>
    </div>

    