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

        // Check the current and new password if already exists
        public function checkCurrentandNewPassword($userData)
        {
            $id = $userData['id'];
            $currentPassword = $userData['currentPassword'];
            $newPassword = $userData['newPassword'];

            $getDataQuery = "
                SELECT *
                FROM users
                WHERE userID='$id'
                LIMIT 1
            ";
            $result = $this->conn->query($getDataQuery);

            if($result->num_rows > 0){
                $userRows = $result->fetch_assoc();

                if($currentPassword == $userRows['userPassword'] && $newPassword == $userRows['userPassword']){

                    redirect('Your Current password and New Password are already exist','admin/view-profile.php?action=change-password');
                    return false;
                }else{
                    
                    return true;
                }

            }else{

                return false;
            }
        }

        // Updating the old password to new password
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

        // Check the current password on my user password table
        public function checkCurrentPassword($userData)
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