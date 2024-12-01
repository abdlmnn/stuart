<?php
    class ChangePasswordController
    {
        private $conn;

        public function __construct()
        {   
                // calling my DatabaseConnection
            $db = new DatabaseConnection;

            // this variable conn is assign as the db of my conn
            $this->conn = $db->conn;
        }

        public function newPassword($userData)
        {
            $id = $userData['id'];
            $newPassword = $userData['newPassword'];

            $EditDataQuery = "
                UPDATE users
                SET userPassword='$newPassword'
                WHERE userID='$id'
                LIMIT 1
            ";
            $result = $this->conn->query($EditDataQuery);

            return $result;
        }

        // Comparing new and retype password 
        public function retypePassword($userData,$retypePassword)
        {
            $newPassword = $userData['newPassword'];

            if($newPassword == $retypePassword){
                return true;
            }else{
                return false;
            }
        }

        // Check the current password if it correct
        public function checkPassword($userData)
        {
            $id = $userData['id'];
            $currentPassword = $userData['currentPassword'];

            $checkDataQuery = "
                SELECT *
                FROM users
                WHERE userPassword='$currentPassword'
                AND userID='$id'
                LIMIT 1
            ";
            $result = $this->conn->query($checkDataQuery);

            if($result->num_rows > 0){
                
                return true;
            }else{
                return false;
            }
        }
    }
?>