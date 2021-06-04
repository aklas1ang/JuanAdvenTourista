<?php
    include '../inc/navbar/user/navbar.php';
?>
    <br><br><br><br><br><br>
    <div class="container">
        <?php
            $result = $conn->getSpots();
            if($result->num_rows > 0){
        ?>
                <div class="row d-flex justify-content-center">
                    <?php
                        while($row = $result->fetch_assoc()){
                    ?>
                        <div class="col-md-4">
                            <figure class="snip1519" style="margin-left: 3%; margin-top: 15%;">
                                <figcaption>
                                    <h5>Location: <span><?=$row['Location']?></span></h5>
                                    <img src="../imgs/spots/<?=$row['Image']?>" alt="<?=$row['Name']?>" style="height: 150px;">
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
    </div>
<?php
    include '../inc/footer/user/footer.php';
?>