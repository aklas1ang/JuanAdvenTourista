<?php
    require_once '../db/db_conn.php';

    
    if(isset($_POST['create'])){
        $fullname = $_POST['fullname'];
        $type = $_POST['type'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = $conn->createAdmin($type, $fullname, $username, $password);

        if($result){
            header('Location: ../admin/admins.php?Success=Admin Created Successfully!');
        }
    }
?>