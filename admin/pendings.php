<?php 
    include '../inc/navbar/admin/sidebar.php'; 
    require_once '../db/db_conn.php';
?>

<main class="col col-md-8 col-sm-3 col-lg-8 col-xl-9 py-5">
    <h1 class="d-flex justify-content-center">Pending Spots</h1>
    <div class="container-fluid">
        <?php
            if(isset($_GET['Accepted'])){
        ?>
                <div class="alert alert-success">
                    <?php echo $_GET['Accepted']; ?>
                </div>
        <?php
            }else if(isset($_GET['Declined'])){
        ?>
                <div class="alert alert-success">
                    <?php echo $_GET['Declined'];?>
                </div>
        <?php
            }
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
                            $i = 1;
                            while($row = $result->fetch_assoc()){
                        ?>
                                <tr>
                                    <td><?=$i++;?></td>
                                    <td><?=$row['Name']?></td>
                                    <td><?=$row['Location']?></td>
                                    <td>
                                        <button data-bs-toggle="modal" data-bs-target="#spots" onclick="getDetails(<?=$row['ID']?>)" class="btn btn-info">Details</button>
                                        <a href="remove.php?pending='pending'&id=<?=$row['ID']?>" class="btn btn-danger">Decline</a>
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
                    <h5 class="modal-title" id="spotsLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="clearfix">
                        <div class="col-md-5 float-md-end mb-3 ms-md-3 border border-dark" style="height:200px">
                            <img id="image" height="100%" width="100%" alt="">
                        </div>
                        <p id="description"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <a id="link" class="btn btn-primary">Accept</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
</div>

<script>
    function getDetails(id){
    $.post('../db/fetch/adminFetch.php', {
        single: id
    }, function(details){
        let data = JSON.parse(details);
        $('#link').attr('href',`accept.php?id=${id}`)
        $('#spotsLabel').text(`${data.Name}`);
        $('#description').text(`${data.Description}`);
        $('#image').attr('src',`../imgs/spots/${data.Image}`);
    });
}
</script>
</body>

</html>