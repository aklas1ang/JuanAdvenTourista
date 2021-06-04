<?php
    require_once '../db_conn.php';

    if(isset($_POST['single'])){
        $result = $conn->getPendingSpots($_POST['single']);
        echo json_encode($result->fetch_assoc());
    }
    
    else if(isset($_POST['building'])){
        $array = array();
        $result = $conn->getBuildings();
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $array[] = $row;
            }
            echo json_encode($array);
        }
    }
    
    else if(isset($_POST['buildingId'])){
        $array = array();
        $result = $conn->getRoom($_POST['buildingId']);
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $array[] = $row['RoomNo'];
            }
            echo json_encode($array);
        }
    }
    
    else if(isset($_POST['spotId'])){
        $result = $conn->getSpots($_POST['spotId']);
        echo json_encode($result->fetch_assoc());
    }
    
    else if(isset($_POST['spotName'])){
        $array = array();
        $result = $conn->getSpots();
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $array[] = $row['Name'];
            }
            echo json_encode($array);
        }
    }

    else if(isset($_POST['username'])){
        $array = array();
        $result = $conn->getUser();
        if($result->num_rows> 0){
            while($row = $result->fetch_assoc()){
                $array[] = $row['username'];
            }
            echo json_encode($array);
        }
    }

    else if(isset($_POST['room'])){
        $array = array();
        $result = $conn->getNotOccupiedRoom($_POST['room']);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $array[] = $row;
            }
            echo json_encode($array);
        }else{
            echo "No data";
        }
    }

?>