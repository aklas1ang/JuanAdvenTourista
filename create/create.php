<?php
    session_start();
    require_once '../db/db_conn.php';

    
    if(isset($_POST['admin'])){
        $fullname = $_POST['fullname'];
        $building = $_POST['building'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = $conn->createAdmin($building, $fullname, $username, $password);

        if($result){
            header('Location: ../admin/admins.php?Success=Admin created successfully!');
        }
    }
    
    else if(isset($_POST['hotelAndResort'])){
        $name = $_POST['name'];
        $type = $_POST['type'];
        $image = $_FILES['image']['name'];
        $target = "../imgs/hotelsAndResorts/".basename($image);
        $location = $_POST['location'];
        $description = $_POST['description'];

        $result = $conn->createBuilding($name, $type, $location, $description, $image);

        if($result){
            if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
                header('Location: ../admin/hotelAndResorts.php?Success=Building added Successfully!');
            }
        }
    }
    
    else if(isset($_POST['room'])){
        $roomNo = $_POST['roomNo'];
        $type = $_POST['type'];
        $buildingId = $_POST['buildingId'];

        $result = $conn->createRoom($roomNo, $type, $buildingId);

        if($result){
            header('Location: ../hoteladmin/rooms.php?Success=Room added successfully');
        }
    }
    
    else if(isset($_POST['spot'])){
        $image = $_FILES['image']['name'];
        $target = "../imgs/spots/".basename($image);
        $postedBy = $_POST['adminId'];
        $name = $_POST['spotName'];
        $location = $_POST['location'];
        $description = $_POST['description'];

        $result = $conn->createSpot($name, $image, $location, $description, $postedBy);
        
        if($result){
            if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
                header('Location: ../hoteladmin/spots.php?Success=Spot added successfully');
            }
        }
    }

    else if(isset($_POST['user'])){
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = $conn->createUser($fullname, $username, $password);
        
        if($result != NULL && $result != 0){
            $_SESSION['fullname'] = $fullname;
            $_SESSION['id'] = $result;
            header('Location: ../user/home.php');
        }
    }

    else if(isset($_POST['booking'])){
        $userId = $_POST['userId'];
        $roomId = $_POST['roomId'];
        $timeIn = $_POST['timeIn'];
        $timeOut = $_POST['timeOut'];

        $result = $conn->createBooking($userId,$roomId,$timeIn,$timeOut);

        if($result){
            header('Location: ../user/hotelAndResort.php?Success=Successfully Booked');
        }
    }

    else if(isset($_POST['comment'])){

        $userId = $_POST['userId'];
        $review = $_POST['review'];

        $result = $conn->createReview($userId, $review);

        echo $result;

        if($result){
            header('Location: ../user/reviews.php?Success=Successfully Added Review');
        }
    }
?>