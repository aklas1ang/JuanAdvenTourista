<?php
    require_once '../db/db_conn.php';
        $id = $_GET['id'];
    if(isset($_GET['spot'])){
        $img = $_GET['img'];
        if($conn->removeSpot($id)){
            unlink('../imgs/'.$img);
            header('Location: spots.php?Removed=Spot removed successfully');
        }
    }
    
    else if(isset($_GET['room'])){
        if($conn->removeRoom($id)){
            header('Location: rooms.php?Removed=Room removed successfully');
        }
    }

    else if(isset($_GET['booking'])){
        if($conn->removeBooking($id)){
            header('Location: bookings.php?Removed=Booking Removed Successfully');
        }
    }
    
?>