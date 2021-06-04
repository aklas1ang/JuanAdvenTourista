<?php
    include '../inc/navbar/user/navbar.php';
?>
    
<style>

@import url('https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap');

.card-circle{
text-align:center;
margin-top:50px;
background:#a0caf7;    
border:10px solid transparent;
color:#fff;
Font-family: Montserrat;
padding:50px;
}
.card-circle .card-title{
font-weight:600;
font-size:26px;
}
.card-circle .card-text{
font-weight:400;
}
.card-circle .card-icon i{
font-size:60px;
display:block;
}
.card-circle:nth-child(2){
background:#4d79d3;
}
.card-circle .btn{
background:transparent;
border:1px solid #fff;
text-transform:uppercase;
padding:5px 30px;    
border-radius:0px;
Font-weight:600;
}
.card-circle .btn,.card-circle .card-icon i,.card-circle{
transition: all ease-in-out 0.2s;
}
.card-circle:hover .btn{
background:#00A8CC;
color:#fff;
border: 1px solid transparent;
}
.card-circle .btn:hover{
transform: scale(1.1);
}
.card-circle:hover{
color:10px solid #00A8CC;
}
.card-circle:hover i {
text-shadow: 0px -1px 10px #00A8CC;
transform:scale(1.2)rotate(20deg);
}
@media only screen and (min-width: 1200px) {
.card-circle:nth-child(3){
 margin-left:-40px;
 z-index:0;
}
.card-circle{
 width:400px;
 height:400px;
}
.card-circle:nth-child(2){
 margin-left:-20px;
 box-shadow: 1px 2px 20px 8px rgba(241, 235, 235, 0.12);
 transform: scale(1.2);
 z-index:1;
}
.card-circle .card-icon i{
margin-top: 20px;
}
}
@media only screen and (min-width: 991px) and (max-width: 1200px) {
.card-circle{
 width:740px;
 height:740px;
}
.card-circle .card-icon i{
font-size:50px;
}
.card-circle .card-icon i{
margin-top: -25px;
}
.card-circle:nth-child(3){
 margin-left:-50px;
 z-index:0;
}
.card-circle:nth-child(2){
 margin-left:-20px;
 z-index:1;
}
}

a.text-white {
    text-decoration: none;
}
#container{
    margin-top: 20%;
}
</style>
<body>



<br><br><br><br><br><br><br>
<div class="container">
    <div>
        <button data-bs-toggle = "modal" data-bs-target = "#addReviewModal" class="btn btn-primary">Add Review</button>
    </div>

    <div class="modal fade" id="addReviewModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addReviewModalLabel">Modal title</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../create/create.php" method="POST">
                        <input type="hidden" name="userId" value="<?php echo $_SESSION['id']?>">
                        <div class="form-group mb-3">
                            <label for="review">Comment Here</label>
                            <textarea class="form-control" name="review" rows="10"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" name="comment" class="btn btn-primary">Comment</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
        </div>
</div>

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="card card-circle w-100">
                    <div class="card-icon">
                        <i class="fas fa-apple-alt"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Mr. Chu Chu</h5>
                        <p class="card-text">Some quick example text to build on the card title and card content.</p>
                    </div>
                </div>  
            </div>
            <?php
                    $result = $conn->getReview();
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                ?>
                        <div class="carousel-item">
                            <div class="card card-circle w-100">
                                <div class="card-icon">
                                    <i class="fas fa-apple-alt"></i>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?=$row['Fullname']?></h5>
                                    <p class="card-text"><?=$row['Comment']?></p>
                                </div>
                            </div>
                        </div>
                <?php
                        }
                    }
                ?>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <script>
         $(document).ready(function(){

            <?php 
                if(isset($_GET['Success'])){
            ?>
                    alert('<?php echo $_GET['Success'];?>');
            <?php
                }
            ?>
        });
    </script>
 </div>
<?php
    include '../inc/footer/user/footer.php';
?>