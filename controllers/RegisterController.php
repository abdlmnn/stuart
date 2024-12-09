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
            
            // userFullname,userNumber,userAddress,userGender,
            $registerQuery = "
                INSERT INTO 
                users (userEmail,userPassword)
                VALUES ($data)
            ";
            $result = $this->conn->query($registerQuery);

            return $result;
        }

        // It check the user or email exists on users table 
        public function userExists($registerData)
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
            // my password came from my register POST 
            $password = $registerData['password']; 
            
                                                        // Both the same variable an array but different set POST

            // my new password came from my reset or change password POST
            $newPassword = $registerData['newPassword']; 
            

            // if password same as confirm password is true but the new password is false
            // the password is in the register form
            // OR
            // if new password same as confirm password is true but the password is false
            // the new password is in the reset password
            if($password == $confirmPassword || $newPassword == $confirmPassword){
                return true;
            }else{
                return false;
            }
        }
    }
?>