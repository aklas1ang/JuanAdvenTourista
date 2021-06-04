<?php
    include '../inc/navbar/admin/sidebar.php';
    require_once '../db/db_conn.php';
?>

<main class="col col-md-8 col-sm-3 col-lg-8 col-xl-9 py-5">
    <h1 class="d-flex justify-content-center">Hotel and Resorts</h1>
    <div class="container-fluid mt-5">
        <button class="float-left btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">Create a New Hotel or Resort</button>
        <?php
            if (isset($_GET['Success'])) {
        ?>
                <div class="alert alert-success"><?php echo $_GET['Success']; ?></div>
        <?php
            }else if(isset($_GET['Removed'])){
        ?>
                <div class="alert alert-success">
                    <?php echo $_GET['Removed']; ?>
                </div>
        <?php
            }
        ?>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Hotel or Resort</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="../create/create.php" method="POST" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="col-md-6">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Hotel/Resort</label>
                                <select name="type" id="select" class="form-select">
                                    <option value="Hotel">Hotel</option>
                                    <option value="Resort">Resort</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" name="location">
                            </div>
                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" rows="10"></textarea>
                            </div>
                            <button type="submit" name="hotelAndResort" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
            $result = $conn->getBuildings();
            if($result->num_rows > 0){
        ?>   
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Action</th>
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
                                    <td><?=$row['Type']?></td>
                                    <td scope="2">
                                        <a href="remove.php?hotelandresort='hotelandresort'&id=<?=$row['ID']?>" class="btn btn-danger">Remove</a>
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
                    No Records of Hotels or Resorts Yet!
                </div>
        <?php
            }
        ?>
    </div>
</main>
</div>
</div>

<script>
   
</script>
</body>

</html>