<?php

    require_once '../db/db_conn.php';

    $id = $_GET['id'];
    if(isset($_GET['hotelandresort'])){
        if($conn->removeBuilding($id)){
            header('Location: hotelAndResorts.php?Removed=Building Removed Successfully');
        }
    }

    else if(isset($_GET['admins'])){
        if($conn->removeAdmin($id)){
            header('Location: admins.php?Removed=Admin Removed Successfully');
        }
    }

    else if(isset($_GET['user'])){
        if($conn->removeUser($id)){
            header('Location: user.php?Removed=User Removed Successfully');
        }
    }

    else if(isset($_GET['pending'])){
        if($conn->declinePendingSpot($id)){
            header('Location: pendings.php?Declined=Spot Denied Successfully');
        }
    }
?>