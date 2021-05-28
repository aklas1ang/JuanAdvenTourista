<?php

    session_start();
    require_once '../db/db_conn.php';

    if(isset($_POST['login'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = $conn->getFullname($username,$password);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $_SESSION['id'] = $row['ID'];
            $_SESSION['fullname'] = $row['fullname'];
            header('Location: ../admin/adminBoard.php');
        }else{
            header('Location: ../admin/adminlogin.php?Error=Wrong Credentials');
        }
    }


?>