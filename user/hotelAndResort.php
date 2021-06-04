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
                                        <button onclick="getBuilding(<?=$row['ID']?>)" data-bs-toggle="modal" data-bs-target="#bookNow" class="btn btn-primary">Book Now</button>
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
        
        <!-- Modal -->
        <div class="modal fade" id="bookNow" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookNowLabel"></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form">
                    <form action="../create/create.php" method="POST">
                        <input type="hidden" class="form-control" name="userId" value="<?php echo $_SESSION['id'];?>">
                        <input type="hidden" class="form-control" name="roomId">
                        <div class="mb-3">
                            <label for="roomNo">Room No.</label>
                            <select name="roomNo" class="form-control">
                                
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="type">Type:</label>
                            <span id="type"></span>
                        </div>
                        <div data class="mb-3">
                            <label for="timeIn">Time In</label>
                            <input type="date" class="form-control" name="timeIn">
                        </div>
                        <div class="mb-3">
                            <label for="timeOut">Time Out</label>
                            <input type="date" class="form-control" name="timeOut">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="booking" class="btn btn-primary">Book</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
        
    </div>

    <script>
        function getBuilding(id){
            $('select[name="roomNo"]').empty();
            $('select[name="roomNo"]').html('<option id="remove">--Select Room--</option>');
            $.post('../db/fetch/adminFetch.php',{
                room : id
            },function(data){
                if(data !== "No data"){
                    $('div .form').show();
                    let rooms = JSON.parse(data);
                    rooms.forEach(function(room){
                        if(!room.Occupied){
                            $('select[name="roomNo"]').append(`<option data-roomtype="${room.Type}" value="${room.ID}">${room.RoomNo}</option>`);
                        }
                    })
                }else{
                    alert('No Available Rooms as of Now');
                    $('div .form').hide();    
                }
            });
        }

        $(document).ready(function(){

            <?php 
                if(isset($_GET['Success'])){
            ?>
                    alert('<?php echo $_GET['Success'];?>');
            <?php
                }
            ?>

            $('select[name="roomNo"]').on('change',function(event){
                $('#remove').remove();
                $('#type').text($(this).find(':selected').data('roomtype'));
                $('input[name="roomId"]').val(event.target.value);
            });
        });

    </script>
<?php
    include '../inc/footer/user/footer.php';
?>