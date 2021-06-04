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

        function createAdmin($building, $fullname, $username, $password){
            $result = $this->createAccount($fullname, $username, $password);
            $row = $result->fetch_assoc();
            $rowid = $row['ID'];
            $sql = "INSERT INTO hotelresortadmin(account_ID, buildingID) VALUES($rowid, $building)";
            return $this->conn->query($sql);
        }

        function getHRAdmin($id = NULL){
            if($id === NULL){
                $sql = "SELECT accounts.ID, accounts.Fullname, buildingname.Name, buildingname.Type FROM accounts 
                        INNER JOIN hotelresortadmin ON accounts.ID = hotelresortadmin.account_ID
                        INNER JOIN buildingname ON hotelresortadmin.buildingID = buildingname.ID";
                return $this->conn->query($sql);
            }

            $sql = "SELECT accounts.ID, accounts.Fullname, hotelresortadmin.Type FROM accounts 
                    INNER JOIN hotelresortadmin ON accounts.ID = hotelresortadmin.account_ID WHERE accounts.ID = $id";
            return $this->conn->query($sql);
        }

        function removeAdmin($id){
            $sql = "DELETE FROM accounts WHERE ID = $id";
            return $this->conn->query($sql);
        }

        function getUser($id = NULL){
            if($id === NULL){
                $sql = "SELECT accounts.ID, accounts.username, accounts.Fullname FROM accounts
                        INNER JOIN users ON accounts.ID = users.account_ID";
                return $this->conn->query($sql);
            }
            $sql = "SELECT accounts.ID, accounts.Fullname FROM accounts
                    INNER JOIN users ON accounts.ID = users.ccount_ID WHERE accounts.ID = $id";
            return $this->conn->query($sql);
        }

        function verifyUser($username,$password){
            $sql = "SELECT accounts.ID, accounts.Fullname FROM accounts
                    INNER JOIN users ON accounts.ID = users.Account_ID WHERE accounts.username = '$username' AND accounts.password = '$password'";
            return $this->conn->query($sql);
        }

        function createUser($fullname, $username, $password){
            $result = $this->createAccount($fullname, $username, $password);
            $row = $result->fetch_assoc();
            $rowid = $row['ID'];
            $sql = "INSERT INTO users(account_ID) VALUES($rowid)";
            if($this->conn->query($sql)){
                return $rowid;
            }
        }

        function removeUser($id){
            $sql = "DELETE FROM accounts WHERE ID = $id";
            return $this->conn->query($sql);
        }

        function getPendingSpots($id = NULL){
            if($id === NULL){
                $sql = "SELECT * FROM spots WHERE Status = 'Pending'";
                return $this->conn->query($sql);
            }
            $sql = "SELECT * FROM spots WHERE ID = $id";
            return $this->conn->query($sql);
        }

        function declinePendingSpot($id){
            $sql = "UPDATE spots SET Status = 'Declined' WHERE ID = $id";
            return $this->conn->query($sql);
        }

        function getBuildings($id= NULL){
            if($id === NULL){
                $sql = "SELECT * FROM buildingname";
                return $this->conn->query($sql);
            }
            $sql = "SELECT * FROM buildingname WHERE ID =$id";
            $result = $this->conn->query($sql);
            return $result->fetch_assoc();
        }

        function createBuilding($name,$type,$location,$description,$image){
            $sql = "INSERT INTO buildingname(Name, Type,Image,Location,Description) VALUES('$name','$type','$image','$location','$description')";
            return $this->conn->query($sql);
        }

        function removeBuilding($id){
            $sql = "DELETE FROM buildingname WHERE ID = $id";
            return $this->conn->query($sql);
        }

        function getHotelResortAdmin($username,$password){
            $sql = "SELECT accounts.Fullname, accounts.ID, hotelresortadmin.buildingID FROM accounts
                    INNER JOIN hotelresortadmin ON accounts.ID = hotelresortadmin.account_ID
                    WHERE accounts.username = '$username' AND accounts.password = '$password'";
            return $this->conn->query($sql);
        }

        function createRoom($roomNo, $type, $buildingId){
            $sql = "INSERT INTO rooms(RoomNo, Type, occupied, buildingID) VALUES('$roomNo','$type',0,$buildingId)";
            return $this->conn->query($sql);
        }

        function getRoom($buildingId = NULL){
            if($buildingId === NULL){
                $sql = "SELECT * FROM rooms";
                return $this->conn->query($sql);
            }
            $sql = "SELECT * FROM rooms WHERE buildingID = $buildingId";
            return $this->conn->query($sql);
        }

        function getNotOccupiedRoom($buildingId){
            $sql = "SELECT * FROM rooms WHERE buildingID = $buildingId AND Occupied = 0";
            return $this->conn->query($sql);
        }

        function getSpots($id = NULL, $postedBy = NULL){
            if($id != NULL){
                $sql = "SELECT * FROM spots WHERE ID = $id";
                return $this->conn->query($sql);
            }else if($postedBy != NULL){
                $sql = "SELECT * FROM spots WHERE postedBy = $postedBy";
                return $this->conn->query($sql);
            }
            $sql = "SELECT * FROM spots WHERE Status = 'Accepted'";
            return $this->conn->query($sql);
            
        }

        function createSpot($name, $image, $location, $description, $postedBy){
            $sql = "INSERT INTO spots(Name,Location,Description,Status,Image,postedBy) VALUES('$name','$location','$description','Pending','$image',$postedBy)";
            return $this->conn->query($sql);
        }

        function acceptSpot($id){
            $sql = "UPDATE spots SET Status = 'Accepted' WHERE ID = $id";
            return $this->conn->query($sql);
        }

        function removeSpot($id){
            $sql = "DELETE FROM spots WHERE ID = $id";
            return $this->conn->query($sql);
        }

        function removeRoom($id){
            $sql = "DELETE FROM rooms WHERE ID = $id";
            return $this->conn->query($sql);
        }

        function createBooking($userId,$roomId,$timeIn,$timeOut){
            $sql = "INSERT INTO bookings(UserId, RoomId, TimeIn, TimeOut) VALUES($userId,$roomId,'$timeIn','$timeOut')";
            if($this->conn->query($sql)){
                $sql = "UPDATE rooms SET Occupied = 1 WHERE ID = $roomId";
                return $this->conn->query($sql);
            }
        }

        function getBookings($id){
            $sql = "SELECT bookings.ID, bookings.TimeIn, bookings.TimeOut, rooms.Type, accounts.Fullname FROM bookings 
                    INNER JOIN rooms ON bookings.RoomId = rooms.ID
                    INNER JOIN accounts ON bookings.UserId = accounts.ID
                    WHERE rooms.buildingID = $id";
            return $this->conn->query($sql);
        }

        function removeBooking($id){
            $sql = "UPDATE rooms SET occupied = 0 WHERE ID =(SELECT RoomId FROM bookings WHERE ID = $id)";
            if($this->conn->query($sql)){
                $sql = "DELETE FROM bookings WHERE ID = $id";
                return $this->conn->query($sql);
            }
        }

        function createReview($userId, $review){
            $sql = "INSERT INTO reviews(CommentedBy, Comment) VALUES($userId, '$review')";
            return $this->conn->query($sql);
        }

        function getReview(){
            $sql = "SELECT reviews.Comment, accounts.Fullname FROM reviews
                    INNER JOIN accounts ON reviews.CommentedBy = accounts.ID";
            return $this->conn->query($sql);
        }
    }

    $conn = new Connect();
