<?php 
    include '../inc/navbar/sidebar.php'; 
    require_once '../db/db_conn.php';
?>

<main class="col col-md-8 col-sm-3 col-lg-8 col-xl-9 py-5">
    <h1 class="d-flex justify-content-center">Pending Spots</h1>
    <div class="container-fluid">
        <?php
            $result = $conn->getPendingSpots();
            if($result->num_rows > 0){
        ?>
                <table class="table mt-5">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Spot Name</th>
                            <th scope="col">Location</th>
                            <th width="300px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($row = $result->fetch_assoc()){
                        ?>
                                <tr>
                                    <td><?=$row['ID']?></td>
                                    <td><?=$row['Name']?></td>
                                    <td><?=$row['Location']?></td>
                                    <td>
                                        <!-- butanganan ug onclick function -->
                                        <button class="btn btn-info">Details</button>
                                        <a href="" class="btn btn-primary">Approve</a>
                                        <a href="" class="btn btn-danger">Decline</a>
                                    </td>
                                </tr>
                        <?php                        
                            }
                        ?>
                    </tbody>
                </table>
        <?php
            }else{
        ?>
                <div class="alert alert-warning">
                    No Records of Pendings Yet!
                </div>
        <?php
            }
        ?>
    </div>

    <!-- modal button -->
    <button class="btn btn-info" hidden data-bs-toggle="modal" data-bs-target="#exampleModal">Details</button>
    <!-- Modal -->
    <div class="modal fade" id="spots" tabindex="-1" aria-labelledby="spotsLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="spotsLabel">Panagsama Beach</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="clearfix">
                        <div class="col-md-6 float-mb-end mb-3 border border-primary">
                            <img height="100%" width="100%" alt="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
</div>
</body>

</html>