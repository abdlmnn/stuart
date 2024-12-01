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

        // Edit all the information of user with exact ID
        public function update($userData)
        {
            $id = $userData['id'];
            $fullname = $userData['fullname'];
            $number = $userData['number'];
            $address = $userData['address'];
            $gender = $userData['gender'];
            $email = $userData['email'];

            $editDataQuery = "
                UPDATE users
                SET userFullname='$fullname',
                    userNumber='$number',
                    userAddress='$address',
                    userGender='$gender',
                    userEmail='$email'
                WHERE userID='$id'
                LIMIT 1
            ";
            $resultEdit = $this->conn->query($editDataQuery);

            if($resultEdit){
                return true;
            }else{
                return false;
            }
        }
    }
?>