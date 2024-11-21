<?php
    class LoginController
    {
        public function __construct()
        {
            $db = new DatabaseConnection;
            $this->conn = $db->conn;
        }

        public function userLogin($email,$password)
        {
            $checkLoginQuery = "
                SELECT *
                FROM users
                WHERE userEmail='$email'
                AND userPassword='$password'
                LIMIT 1
            ";
            $result = $this->conn->query($checkLoginQuery);
            
            if($result->num_rows > 0){
                $userData = $result->fetch_assoc();
                
                $this->userAuthentication($userData);

                return true;
            }else{
                return false;
            }
        }

        private function userAuthentication($data)
        {
            $_SESSION['authenticated'] = true;
            $_SESSION['user'] = [
                'id' => $data['userID'],
                'fullname' => $data['userFullname'],
                'email' => $data['userEmail'],
                'type' => $data['userType']
            ];
        }

        public function UserLoggedIn()
        {
            if(isset($_SESSION['authenticated']) === TRUE){
                redirect('You are already Logged In','customer.php');
            }else{
                return false;
            }
        }

        public function userLogout()
        {
            if(isset($_SESSION['authenticated']) === TRUE){

                unset($_SESSION['authenticated']);
                unset($_SESSION['user']);
                
                return true;
            }else{
                return false;
            }
        }
    }
?>