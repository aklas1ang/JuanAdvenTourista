<?php
include '../inc/navbar/sidebar.php';
require_once '../db/db_conn.php';
?>

<main class="col col-md-8 col-sm-3 col-lg-8 col-xl-9 py-5">
    <h1 class="d-flex justify-content-center">Hotel and Resort Admins</h1>
    <div class="container-fluid mt-5">
        <button class="float-left btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">Create a New Admin</button>
        <?php
if (isset($_GET['Success'])) {
    ?>
                <div class="alert alert-success"><?php echo $_GET['Success']; ?></div>
        <?php
}
?>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create New Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="../create/createHotelResortAdmin.php" method="POST">
                            <div class="mb-3">
                                <label for="fullname" class="form-label">Fullname</label>
                                <input type="text" class="form-control" name="fullname">
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Type</label>
                                <select name="type" class="form-select" aria-label="Default select example">
                                    <option selected value="Hotel">Hotel</option>
                                    <option value="Resort">Resort</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <button type="submit" name="create" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
            $result = $conn->getHRAdmin();
            if($result->num_rows > 0){
        ?>   
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Fullname</th>
                            <th scope="col">Type</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($row = $result->fetch_assoc()){
                        ?>
                                <tr>
                                    <td><?=$row['ID']?></td>
                                    <td><?=$row['Fullname']?></td>
                                    <td><?=$row['Type']?></td>
                                    <td scope="2">
                                        <a href="" class="btn btn-success">Edit</a>
                                        <a href="" class="btn btn-danger">Remove</a>
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
                    No Records of Admins Yet!
                </div>
        <?php
            }
        ?>
    </div>
</main>
</div>
</div>

</body>

</html>