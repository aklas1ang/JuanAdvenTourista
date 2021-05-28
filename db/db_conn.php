<?php

    Class Connect{
        public $conn;

        function __construct()
        {
            $this->conn = new mysqli('localhost', 'root', '', 'juanadventourista');
        }

        function getFullname($username, $password){
            $sql = "SELECT accounts.ID, accounts.fullname FROM accounts 
                    INNER JOIN admin ON accounts.ID = admin.account_ID 
                    WHERE accounts.username = '$username' AND accounts.password = '$password'";
            return $this->conn->query($sql); 
        }


    }

    $conn = new Connect();
