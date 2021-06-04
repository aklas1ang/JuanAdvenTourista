<?php

    require_once '../db/db_conn.php';
    
    $id = $_GET['id'];
    if($conn->acceptSpot($id)){
        header('Location: pendings.php?Accepted=Spot Successfully Accepted');
    }

?>