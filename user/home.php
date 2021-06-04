<?php
    require_once '../inc/navbar/user/navbar.php';  
?>

<style>
    body {
        font-family: 'Times New Roman', Times, serif;
    }

    .carousel-content {
        width: 100%;
        font-family: 'Times New Roman', Times, serif;
        position: absolute;
        top: 150px;
        bottom: 500px;
        text-align: center;
        z-index: 20;
        color: rgb(8, 8, 8);
        text-shadow: 0 2px 5px rgba(24, 53, 218, 0.787);
    }

    .booknow {
        font-family: 'Times New Roman', Times, serif;
        position: absolute;
        bottom: 400px;
        top: 400px;
        width: 100%;
        text-align: center;
        z-index: 20;
    }


    /*assign full width inputs*/
    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    /*set a style for the buttons*/
    button {

        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;

    }

    /* set a hover effect for the button*/
    button:hover {
        opacity: 0.8;
    }




    /*set padding to the container*/
    .container {
        padding: 16px;

    }

    /*set the forgot password text*/
    span.psw {
        float: right;
        padding-top: 16px;
    }

    /*set the Modal background*/
    .modal {
        display: none;
        position: fixed;
        left: 0;
        top: 20px;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        padding-top: 60px;
    }

    /*style the model content box*/
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto;
        border: 1px solid #888;
        width: 30%;
    }
    .modal-contents {
        background-color: #fefefe;
        margin: 5% auto 15% auto;
        border: 1px solid #888;
        width: 50%;
    }

    /*style the close button*/
    .close {
        position: absolute;
        right: 25px;
        top: 0;
        color: #000;
        font-size: 35px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: rgb(0, 140, 255);
        cursor: pointer;
    }

    /* add zoom animation*/
    .animate {
        -webkit-animation: animatezoom 0.6s;
        animation: animatezoom 0.6s
    }

    @-webkit-keyframes animatezoom {
        from {
            -webkit-transform: scale(0)
        }

        to {
            -webkit-transform: scale(1)
        }
    }

    @keyframes animatezoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }

        .cancelbtn {
            width: 100%;
        }
    }
</style>



<body>
    <br><br><br><br><br><br><br>
    <!-- Main Content -->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="src/img/hotel.png" alt="Juan Adventourista" height="700px">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="src/img/padgetteplsce.png" alt="Second slide" height="700px">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="src/img/beach-chair.png" alt="Third slide" height="700px">
                
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="src/img/Waterfront Hotel _ Casino Cebu City.png" alt="Third slide" height="700px">
            </div>
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
<?php include '../inc/footer/user/footer.php';?>