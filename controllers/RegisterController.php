<?php
    class RegisterController
    {   
        private $conn;

        public function __construct()
        {   
                // calling my DatabaseConnection
            $db = new DatabaseConnection;

            // this variable conn is assign as the db of my conn
            $this->conn = $db->conn;
        }

        // Registration inserting input values which is users table
        public function registration($registerData)
        {
            // it will dislpay all the data of my inputData which is in array registerData
            $data = "'". implode("', '",$registerData) ."'";

            $registerQuery = "
                INSERT INTO users (userFullname,userNumber,userAddress,userGender,userEmail,userPassword)
                VALUES ($data)
            ";
            $result = $this->conn->query($registerQuery);

            return $result;
        }

        // It check the user or email exists on users table 
        public function UserExists($registerData)
        {
            $email = $registerData['email'];

            $checkUserQuery = "
                SELECT *
                FROM users
                WHERE userEmail='$email'
                LIMIT 1
            ";
            $result = $this->conn->query($checkUserQuery);

            if($result->num_rows > 0){
                return true;
            }else{
                return false;
            }
        }

        // Comparing the input password to the input confirm password
        public function confirmPassword($registerData, $confirmPassword)
        {
            $password = $registerData['password'];

            if($password == $confirmPassword){
                return true;
            }else{
                return false;
            }
        }
    }
?>