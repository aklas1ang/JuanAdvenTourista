<?php 
    include '../inc/navbar/sidebar.php'; 
    require_once '../db/db_conn.php';
?>

<main class="col col-md-8 col-sm-3 col-lg-8 col-xl-9 m-3 py-5">
    <h1 class="d-flex justify-content-center">User Accounts</h1>
    <div class="container-fluid">
        <?php
            $result = $conn->getUser();
            if($result->num_rows > 0){
        ?>
                <table class="table mt-5">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Fullname</th>
                            <th scope="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row = $result->fetch_assoc()){
                        ?>
                                <tr>
                                    <td><?=$row['ID']?></td>
                                    <td><?=$row['Fullname']?></td>
                                    <td>
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
                    No Records of User yet!
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