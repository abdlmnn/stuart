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

        public function update($profileData)
        {
            $userID = $_SESSION['user']['id'];
            
            $fullname = $profileData['fullname'];
            $number = $profileData['number'];
            $address = $profileData['address'];
            $gender = $profileData['gender'];
            $email = $profileData['email'];

            $editDataQuery = "
                UPDATE users
                SET userFullname='$fullname',
                    userNumber='$number',
                    userAddress='$address',
                    userGender='$gender',
                    userEmail='$email'
                WHERE userID='$userID'
                LIMIT 1
            ";
            $resultEdit = $this->conn->query($editDataQuery);

            if($resultEdit->num_rows > 0){

                return $resultEdit;
            }else{

                return false;
            }
        }
    }
?>