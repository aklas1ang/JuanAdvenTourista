<?php
    include '../inc/navbar/hoteladmin/sidebar.php';
?>

<div id="content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <ol class="breadcrumb page-breadcrumb pull-left" style="margin-left:280px;margin-top:20px;">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.php">Home</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
    <br><br><br>
<hr>
    <div class="mainContent">
            
            <?php $result = $conn->getRoom($_SESSION['buildingId']);?>
            <div class="row my-3">
                <div class="col-md-4">
                    <div class="card text-center h-100">
                        <div class="card-block"><br>
                            <h4 class="card-title"><a href="rooms.php">Number of Rooms</a></h4>
                            <!-- <img src="../src/icon-booking.png" alt=""> -->
                            <h2><i class="fa fa-home fa-3x" style="font-size:170px;"></i></h2>
                        </div>
                        <div class="row px-2 no-gutters">
                            <div class="text-center">
                                <h3 class="card card-block border-top-0 border-left-0 border-bottom-0"><?php echo $result->num_rows; ?></h3>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <?php $result = $conn->getSpots(NULL,$_SESSION['id']);?>
                <div class="col-md-4">
                    <div class="card text-center h-100">
                        <div class="card-block"><br>
                            <h4 class="card-title"><a href="spots.php">Spots you Created</a></h4>
                            <img src="src/place.png" alt=""  style="height: 170px;">
                        </div>
                        <div class="row px-2 no-gutters">
                            <div class="text-center">
                                <h3 class="card card-block border-top-0 border-left-0 border-bottom-0"><?php echo $result->num_rows; ?></h3>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <?php $result = $conn->getBookings($_SESSION['buildingId'])?>
                <div class="col-md-4">
                    <div class="card text-center h-100 card-info">
                        <div class="card-block"><br>
                            <h4 class="card-title"><a href="bookings.php">Total nos. of Bookings</a></h4>
                            <img src="src/icon-booking.png" alt="" style="height: 170px;">
                        </div>
                        <div class="row px-2 no-gutters">
                            <div class="text-center">
                                <h3 class="card card-block border-top-0 border-left-0 border-bottom-0"><?php echo $result->num_rows; ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      
    </div>



    <br><br><br><br>
    <?php
    include '../inc/footer/hoteladmin/footer.php';
?>