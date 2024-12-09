<?php
    class ResetPasswordController
    {
        private $conn;

        public function __construct()
        {   
                // calling my DatabaseConnection
            $db = new DatabaseConnection;

            // this variable conn is assign as the db of my conn
            $this->conn = $db->conn;
        }

        // Updating my userPassword into new Password using the Reset Password
        public function newPassword($data)
        {
            $code = $data['code'];
            $newPassword = $data['newPassword'];

            $updatePasswordQuery = "
                UPDATE users
                SET userPassword='$newPassword'
                WHERE userCode='$code'
                LIMIT 1
            ";
            $result = $this->conn->query($updatePasswordQuery);

            return $result;
        }
    }
?>






























<!-- 

  class ResetPasswordController
    {
        public function __construct()
        {
            $db = new DatabaseConnection;
            $this->conn = $db->conn;
        }

        public function checkEmail($email,$token)
        {
            $checkEmailQuery = "
                SELECT userEmail
                FROM users
                WHERE userEmail='$email'
                LIMIT 1
            ";
            $result = $this->conn->query($checkEmailQuery);

            if($result->num_rows > 0){
                $userData = $result->fetch_assoc();

                $getFullname = $userData['userFullname'];
                $getEmail = $userData['userEmail'];

                $updateTokenQuery = "
                    UPDATE users
                    SET userToken='$token'
                    WHERE userEmail='$getEmail'
                    LIMIT 1
                ";
                $result = $this->conn->query($updateTokenQuery); 

                if($result){
                    // sendPasswordReset($getEmail,$getFullname,$token);
                    redirect('We e-mailed you a password reset link','reset-password.php');
                }else{
                    redirect('Something went wrong','reset-password.php');
                }

                return true;
            }else{
                redirect('No Email Found','reset-password.php');
            }
        }

        // https://github.com/PHPMailer/PHPMailer
        public function sendPasswordReset($getEmail,$getFullname,$token)
        {
            
        }


    }

-->