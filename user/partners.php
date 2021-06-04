<?php
    include '../inc/navbar/user/navbar.php';
?>
    <br><br><br><br><br>
    <div class="container">
        <?php
            $result = $conn->getBuildings();
            if($result->num_rows > 0){
        ?>
                <div class="row d-flex justify-content-center">
                    <?php
                        while($row = $result->fetch_assoc()){
                    ?>
                            <div class="col-md-4">
                                <figure class="snip1519" style="margin-left: 3%; margin-top: 15%;">
                                    <h3><?=$row['Type']?></h3>
                                    <figcaption>
                                        <img src="../imgs/hotelsAndResorts/<?=$row['Image']?>" alt="<?=$row['Name']?>" style="height: 150px;">
                                        <h3 class="mt-4 mt-2"><b><?=$row['Name']?></b></h3>
                                        <p><?=$row['Description']?></p>
                                    </figcaption>
                                </figure>
                            </div>
                    <?php
                        }
                    ?>
                </div>
        <?php
            }
        ?>
<?php
    include '../inc/footer/user/footer.php';
?>