<?php
    include '../inc/navbar/hoteladmin/sidebar.php';
?>

<div id="content">
<div class="page-bar">
            <div class="page-title-breadcrumb">
                <ol class="breadcrumb page-breadcrumb pull-left" style="margin-left:270px;margin-top:20px;">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.php">Home</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Rooms</li>
                </ol>
            </div>
        </div><br>
        <div class="main content" style="margin-left:270px;margin-top:100px">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="spots.php">Spots</a>
                </li>
            </ul>  
            </div><br><br>
            <div class="container-fluid" style="margin-left:350px;width:900px;">

                <!-- Page Heading -->
                <center><h1 class="h3 mb-2 text-gray-800">Spots you Created</h1></center><br>
    
                <!-- Modal For Create -->
            <div class="modal fade" id="addSpot" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addSpotLabel">Create Spot</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="../create/create.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="adminId" value="<?php echo $_SESSION['id'];?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="spotName" class="form-label">Spot Name</label>
                                    <input type="text" class="form-control" name="spotName">
                                    <p class="text-danger" id="message"></p>
                                </div>
                                <div class="col-md-6">
                                    <label for="image" class="form-label">Spot Image</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="location">Location</label>
                                <input type="text" name="location" class="form-control">
                            </div>
                            <div class="mb-3">
                                <textarea name="description" class="form-control" rows="10" placeholder="Describe this Spot..."></textarea>
                            </div>
                            <button type="submit" name="spot" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                    </div>
                </div>
            
            </div>
                <?php
                    if(isset($_GET['Success'])){
                ?>
                    <div class="alert alert-success">
                        <?php echo $_GET['Success']; ?>
                    </div>
                <?php
                    }else if(isset($_GET['Removed'])){
                ?>
                        <div class="alert alert-success">
                            <?php echo $_GET['Removed']; ?>
                        </div>
                <?php
                    }
                ?>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between">
                        <h4 class="m-0 font-weight-bold text-primary">List</h4>
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addSpot">Add Spot<i class="fa fa-plus"></i> </button>
                    </div>
                    <?php
                        $result = $conn->getSpots(NULL,$_SESSION['id']);
                        if($result->num_rows > 0){
                    ?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                    role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" style="width: 44px;" aria-sort="ascending">No.</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" style="width: 44px;" aria-sort="ascending">Spot Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">
                                            Location</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">
                                            Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="2">
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
                                                    <td><?=$row['Name']?></td>
                                                    <td><?=$row['Location']?></td>
                                                    <td><?=$row['Status']?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#viewSpotModal" onclick="viewSpot(<?=$row['ID']?>)">
                                                            Details
                                                        </button>
                                                        <a href="remove.php?spot='spot'&id=<?=$row['ID']?>&img=<?=$row['Image']?>" class="btn btn-danger">Remove</a>
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
                                No Record of Spots Yet!
                            </div>
                    <?php
                        }
                    ?>

                    <!-- Button trigger modal -->
                    
                    <!-- Modal -->
                    <div class="modal fade" id="viewSpotModal" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewSpotLabel"></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="clearfix">
                                    <div class="col-md-5 float-md-end mb-3 ms-md-3 border border-dark" style="height:250px">
                                        <img id="image" height="100%" width="100%">
                                    </div>
                                    <div>
                                        <h5>Location: <span id="location"></span></h5>
                                        <p id="description"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
<br><br><br>
<script>
    function viewSpot(id){
        $.post('../db/fetch/adminFetch.php',{
            spotId : id
        },function(data){
            let spot = JSON.parse(data);
            $('#viewSpotLabel').text(`${spot.Name}`);
            $('#location').text(`${spot.Location}`)
            $('#description').text(`${spot.Description}`);
            $('#image').attr('src', `../imgs/spots/${spot.Image}`);
        });

    }

    function getName(){
            let text = $(this).val();
            $.post('../db/fetch/adminFetch.php',{
                spotName : text
            },function(data){
                let result = false;
                let names = JSON.parse(data);
                names.forEach(function(name){
                    if(name === text){
                        result = true;
                    }
                });
                if(result){
                    $('#message').text('Spot Already Existed');
                    $('button[name="spot"]').attr('disabled','disabled');
                }else{
                    $('#message').text('');
                    $('button[name="spot"]').removeAttr('disabled');
                }
            });
    }

        $(document).ready(function(){
            $('input[name="spotName"]').on('keyup',getName);
        });
</script>

<?php
    include '../inc/footer/hoteladmin/footer.php';
?>