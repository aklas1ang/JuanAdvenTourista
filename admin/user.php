<?php 
    include '../inc/navbar/admin/sidebar.php';
?>

<main class="col col-md-8 col-sm-3 col-lg-8 col-xl-9 m-3 py-5">
    <h1 class="d-flex justify-content-center">User Accounts</h1>
    <?php
        if(isset($_GET['Removed'])){
    ?>
            <div class="alert alert-success">
                <?php echo $_GET['Removed']; ?>
            </div>
    <?php
        }
    ?>
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
                            $i = 1;
                            while($row = $result->fetch_assoc()){
                        ?>
                                <tr>
                                    <td><?= $i++;?></td>
                                    <td><?=$row['Fullname']?></td>
                                    <td>
                                        <a href="remove.php?user='user'&id=<?=$row['ID']?>" class="btn btn-danger">Remove</a>
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