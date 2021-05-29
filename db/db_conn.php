<?php

    Class Connect{
        public $conn;

        function __construct()
        {
            $this->conn = new mysqli('localhost', 'root', '', 'juanadventourista');
        }

        function getAdminFullname($username, $password){
            $sql = "SELECT accounts.ID, accounts.fullname FROM accounts 
                    INNER JOIN admin ON accounts.ID = admin.account_ID 
                    WHERE accounts.username = '$username' AND accounts.password = '$password'";
            return $this->conn->query($sql); 
        }

        function createAccount($fullname, $username, $password){
            $sql = "INSERT INTO accounts(fullname, username, password) VALUES('$fullname', '$username', '$password')";

            if($this->conn->query($sql)){
                $sql = "SELECT ID FROM accounts WHERE ID=(SELECT MAX(ID) FROM accounts)";
                return $this->conn->query($sql);
            }
        }

        function createAdmin($type, $fullname, $username, $password){
            $result = $this->createAccount($fullname, $username, $password);
            $row = $result->fetch_assoc();
            $rowid = $row['ID'];
            $sql = "INSERT INTO hotelresortadmin(account_ID, Type) VALUES($rowid, '$type')";
            if($this->conn->query($sql)){
                return TRUE;
            }
        }

        function getHRAdmin($id = NULL){
            if($id === NULL){
                $sql = "SELECT accounts.ID, accounts.Fullname, hotelresortadmin.Type FROM accounts 
                        INNER JOIN hotelresortadmin ON accounts.ID = hotelresortadmin.account_ID";
                return $this->conn->query($sql);
            }

            $sql = "SELECT accounts.ID, accounts.Fullname, hotelresortadmin.Type FROM accounts 
                    INNER JOIN hotelresortadmin ON accounts.ID = hotelresortadmin.account_ID WHERE accounts.ID = $id";
            return $this->conn->query($sql);
        }

        function getUser($id = NULL){
            if($id === NULL){
                $sql = "SELECT accounts.ID, accounts.Fullname FROM accounts
                        INNER JOIN users ON accounts.ID = users.account_ID";
                return $this->conn->query($sql);
            }
            $sql = "SELECT accounts.ID, accounts.Fullname FROM accounts
                    INNER JOIN users ON accounts.ID = users.ccount_ID WHERE ";
            return $this->conn->query($sql);
        }

        function getPendingSpots(){
            $sql = "SELECT * FROM pendings";
            return $this->conn->query($sql);
        }


    }

    $conn = new Connect();
