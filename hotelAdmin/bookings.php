<?php
    include '../inc/navbar/hoteladmin/sidebar.php';
?>

<div id="content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <ol class="breadcrumb page-breadcrumb pull-left" style="margin-left:300px;margin-top:20px;">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.php">Home</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Bookings</li>
                </ol>
            </div>
        </div>
    </div><br><br><br>
    <hr>

    <div class="container-fluid" style="margin-left:350px;width:900px;margin-top:50px;">

        <!-- Page Heading -->
        <center>
            <h1 class="h3 mb-2 text-gray-800">All Bookings</h1>
        </center><br>

        <?php
            if(isset($_GET['Removed'])){
        ?>
                <div class="alert alert-success">
                    <?php echo $_GET['Removed']; ?>
                </div>
        <?php
            }
        ?>

        <!-- DataTales Example -->
        <div class="card shadow mb-4 " style="width: 1000px;margin-left:-60px;">
            <div class="card-header py-3 d-flex justify-content-between">
                <h4 class="m-0 font-weight-bold text-primary">List</h4>
            </div>
            <?php
                $result = $conn->getBookings($_SESSION['buildingId']);
                if($result->num_rows > 0){
            ?>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                            aria-label="Room #: activate to sort column descending" style="width: 60px;"
                                            aria-sort="ascending">No.</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                            aria-label="Room #: activate to sort column descending" style="width: 60px;"
                                            aria-sort="ascending">Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                            aria-label="Type: activate to sort column ascending" style="width: 36px;">Check In
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                            aria-label="Class Type: activate to sort column ascending" style="width: 69px;">
                                            Check Out</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                            aria-label="Status: activate to sort column ascending" style="width: 49px;">
                                            Room Type</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                            aria-label="Actions: activate to sort column ascending" style="width: 100px;text-align: center;">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        while($row = $result->fetch_assoc()){
                                    ?>
                                            <tr>
                                                <td><?=$i++?></td>
                                                <td><?=$row['Fullname']?></td>
                                                <td><?=$row['TimeIn']?></td>
                                                <td><?=$row['TimeOut']?></td>
                                                <td><?=$row['Type']?></td>
                                                <td>
                                                    <a href="remove.php?booking='booking'&id=<?=$row['ID']?>" class="btn btn-danger">Remove</a>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
            <?php
                }else{
            ?>
                    <div class="alert alert-warning">
                        No records of Booking Yet!
                    </div>
            <?php
                }
            ?>
        </div>
    </div>



    </div>
    </div>
    <br><br><br><br>

<?php
    include '../inc/footer/hoteladmin/footer.php';
?>