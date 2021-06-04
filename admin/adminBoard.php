<?php
 include '../inc/navbar/admin/sidebar.php';
?>

<main class="col col-md-8 col-sm-3 col-lg-8 col-xl-9 m-3 py-5">
    <h1 class="d-flex justify-content-center">Main Dashborad</h1>
    <div class="row mt-5">

        <?php
            $result = $conn->getUser();
        ?>
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    <h5 class="card-title text-center">Users</h5>
                </div>
                <div class="card-body text-center">
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text"><?php echo $result->num_rows;?></p>
                    <a href="user.php" class="btn btn-primary">View Table</a>
                </div>
            </div>
        </div>

        <?php
            $result = $conn->getHRAdmin();
        ?>
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    <h5 class="card-title text-center">Hotel & Resorts Admin</h5>
                </div>
                <div class="card-body text-center">
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text"><?php echo $result->num_rows;?></p>
                    <a href="admins.php" class="btn btn-primary">View Table</a>
                </div>
            </div>
        </div>

        <?php
            $result = $conn->getPendingSpots();
        ?>
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    <h5 class="card-title text-center">Pending Spots</h5>
                </div>
                <div class="card-body text-center">
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text"><?php echo $result->num_rows;?></p>
                    <a href="pendings.php" class="btn btn-primary">View Table</a>
                </div>
            </div>
        </div>
    </div>

</main>
</div>
</div>
</body>

</html>