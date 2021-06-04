<?php
include '../inc/navbar/admin/sidebar.php';
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
                        <h5 class="modal-title" id="exampleModalLabel">Create New Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="../create/create.php" method="POST">
                            <div class="mb-3">
                                <label for="fullname" class="form-label">Fullname</label>
                                <input type="text" class="form-control" name="fullname">
                            </div>
                            
                            <div class="mb-3">
                                <label for="building" class="form-label">Hotel/Resort</label>
                                <select name="building" id="select" class="form-select"></select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <button type="submit" name="admin" class="btn btn-primary">Create</button>
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
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
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
                                    <td><?=$row['Type']?></td>
                                    <td><?=$row['Name']?></td>
                                    <td>
                                        <a href="remove.php?admins='admins'&id=<?=$row['ID']?>" class="btn btn-danger">Remove</a>
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

<script>
    function getBuilding(){
        $.post('../db/fetch/adminFetch.php',{
            building : 'building'
        },
        function(buildings){
            let obj = JSON.parse(buildings);
            obj.forEach(function(data){
                $('#select').append(
                `
                    <option value="${data.ID}">${data.Name}</option>
                `
                );
            });
            
        });
    }

    $(document).ready(function(){
        getBuilding();
    });
</script>
</body>

</html>