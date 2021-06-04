<?php
    require_once '../db_conn.php';


    session_start();
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(isset($_POST['admin'])){

        $result = $conn->getAdminFullname($username,$password);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $_SESSION['id'] = $row['ID'];
            $_SESSION['fullname'] = $row['fullname'];
            header('Location: ../../admin/adminBoard.php');
        }else{
            header('Location: ../../admin/index.php?Error=Wrong Credentials');
        }
    }
    
    else if(isset($_POST['hotelResort'])){

        $result = $conn->getHotelResortAdmin($username,$password);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $buildingName = $conn->getBuildings($row['buildingID']);
            $_SESSION['id'] = $row['ID'];
            $_SESSION['buildingId'] = $row['buildingID'];
            $_SESSION['buildingName'] = $buildingName['Name'];
            $_SESSION['fullname'] = $row['Fullname'];
            header('Location: ../../hotelAdmin/index.php');
        }else{
            header('Location: ../../hotelAdmin/adminLogin.php?Error=Wrong Credentials');
        }
    }

    else if(isset($_POST['user'])){
        $result = $conn->verifyUser($username,$password);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $_SESSION['id'] = $row['ID'];
            $_SESSION['fullname'] = $row['Fullname'];
            header('Location: ../../user/home.php');
        }else{
            header('Location: ../../user/index.php?Error=Wrong Credentials');
        }
    }


?>