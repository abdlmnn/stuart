<?php
    class ProfileController
    {
        private $conn;

        public function __construct()
        {   
                // calling my DatabaseConnection
            $db = new DatabaseConnection;

            // this variable conn is assign as the db of my conn
            $this->conn = $db->conn;
        }

        public function adminDetails()
        {
            $adminID = $_SESSION['user']['id'];

            $getUserQuery = "
                    SELECT *
                    FROM users
                    WHERE userID='$adminID'
                    LIMIT 1
                ";
            $result = $this->conn->query($getUserQuery);

            if($result->num_rows > 0){
                $data = $result->fetch_assoc();
                
                // fetching all values on users table Rows
                return $data;
            }else{
                return false;
            }
        }

        // public function delete
    }
?>  