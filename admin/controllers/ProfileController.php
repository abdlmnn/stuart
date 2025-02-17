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
            if(isset($_SESSION['user']) && isset($_SESSION['user']['id'])){

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
        }

        // public function delete
        public function delete($deleteID)
        {
            $deleteDataQuery = "
                DELETE 
                FROM users
                WHERE userID='$deleteID'
                LIMIT 1
            ";
            $result = $this->conn->query($deleteDataQuery);
        
             if($result){
        
                return true;
            }else{
        
                return false;
            }
        }

        // Edit the information of user with exact ID
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
            $result = $this->conn->query($editDataQuery);

            if($result){
                return true;
            }else{
                return false;
            }
        }

        // Update the information of user because it is null or empty exact email
        public function updateInfo($userData)
        {
            $fullname = $userData['fullname'];
            $number = $userData['number'];
            $address = $userData['address'];
            $gender = $userData['gender'];

            $email = $_SESSION['user']['email'];

            $insertDataQuery  = "
                UPDATE users
                SET userFullname='$fullname',
                    userNumber='$number',
                    userAddress='$address',
                    userGender='$gender'
                WHERE userEmail='$email'
                LIMIT 1
            ";
            $result = $this->conn->query($insertDataQuery);

            if($result){
                return true;
            }else{
                return false;
            }
        }
    }
?>  