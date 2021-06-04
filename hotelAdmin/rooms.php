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
        </div><br><br><br><br>
        <div class="main content" style="margin-left:270px;">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="rooms.php">Rooms</a>
                </li>      
            </ul>

        </div><br>
        <div class="container-fluid" style="margin-left:350px;width:900px;">

            <!-- Page Heading -->
            <center><h1 class="h3 mb-2 text-gray-800">Rooms</h1></center><br>

            <!-- Modal -->
            <div class="modal fade" id="addRoom" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addRoomlLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="../create/create.php" method="POST">
                            <input type="hidden" name="buildingId" value="<?php echo $_SESSION['buildingId'];?>">
                            <div class="mb-3">
                                <label for="roomNo" class="form-label">Room No.</label>
                                <input type="text" class="form-control" name="roomNo">
                                <p class="text-danger" id="message"></p>
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Hotel/Resort</label>
                                <select name="type" id="select" class="form-select">
                                    <option value="Single">Single</option>
                                    <option value="Double">Double</option>
                                    <option value="Triple">Triple</option>
                                </select>
                            </div>
                            <button type="submit" name="room" class="btn btn-primary">Create</button>
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
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addRoom"> Add Room <i class="fa fa-plus"></i> </button>
                </div>
                <?php
                    $result = $conn->getRoom($_SESSION['buildingId']);
                    if($result->num_rows > 0){
                ?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                    role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Room #: activate to sort column descending"
                                                style="width: 44px;" aria-sort="ascending">No.</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                                aria-label="Type: activate to sort column ascending" style="width: 36px;">Room No.
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                                aria-label="Class Type: activate to sort column ascending" style="width: 69px;">
                                                Type</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                                aria-label="Status: activate to sort column ascending" style="width: 49px;">
                                                Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                                aria-label="Actions: activate to sort column ascending" style="width:10px;text-align: center;">
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
                                                    <td><?=$row['RoomNo']?></td>
                                                    <td><?=$row['Type']?></td>
                                                    <td>
                                                        <?php
                                                            echo ($row['occupied']) ? "Occupied" : "Not Occupied";
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="remove.php?room='room'&id=<?=$row['ID']?>" class="btn btn-danger">Remove</a>
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
                        No Record of Rooms Yet!
                    </div>
                <?php
                    }
                ?>
            </div>
        </div><br><br><br>

    <script>
        function getName(){
            let text =  $(this).val();
            let buildingID = $('input[name="buildingId"]').val();
            $.post('../db/fetch/adminFetch.php',{
                buildingId : buildingID
            },function(data){
                let result = false;
                let names = JSON.parse(data);
                names.forEach(function(name){
                    if(name === text){
                        result = true; 
                    }
                });
                if(result){
                    $('#message').text('Room no. already Existed!');
                    $('button[name="room"]').attr('disabled','disabled');
                }else{
                    $('button[name="room"]').removeAttr('disabled');
                    $('#message').text('');
                }
            });

        }

        $(document).ready(function(){
            $('input[name="roomNo"]').on('keyup', getName);
        });
    </script>
<?php
    include '../inc/footer/hoteladmin/footer.php';
?>