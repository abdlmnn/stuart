<?php
    // include 'config/connect.php';

    class RegisterController
    {
        public function __construct()
        {
            $db = new DatabaseConnection;
            $this->conn = $db->conn;
        }

        public function registration($fname,$number,$address,$gender,$email,$password)
        {
            $registerQuery = "
                INSERT INTO users (userFullname,userNumber,userAddress,userGender,userEmail,userPassword)
                VALUES ('$fname','$number','$address','$gender','$email','$password')
            ";
            $result = $this->conn->query($registerQuery);

            return $result;
        }

        public function UserExists($email)
        {
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

        public function confirmPassword($password,$confirmPassword)
        {
            if($password == $confirmPassword){
                return true;
            }else{
                return false;
            }
        }
    }
?>