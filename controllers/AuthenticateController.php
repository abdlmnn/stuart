<?php
    class AuthenticateController
    {
        public function __construct()
        {
            $db = new DatabaseConnection;
            $this->conn = $db->conn;

            $this->checkIsLoggedIn();
        }

        public function adminOnly()
        {
            $id = $_SESSION['user']['id'];

            $checkAdminQuery = "
                SELECT * 
                FROM users
                WHERE userID='$id'
                AND userType='1'
                LIMIT 1
            ";
            $result = $this->conn->query($checkAdminQuery);

            if($result->num_rows == '1'){
                return true;
            }else{
                redirect('You are not authorized as admin','customer.php');
            }
        }

        public function customerOnly()
        {
            $id = $_SESSION['user']['id'];

            $checkCustomerQuery = "
                SELECT * 
                FROM users
                WHERE userID='$id'
                AND userType='0'
                LIMIT 1
            ";
            $result = $this->conn->query($checkCustomerQuery);

            if($result->num_rows == '0'){
                return true;
            }else{
                return false;
            }
        }

        private function checkIsLoggedIn()
        {
            if(!isset($_SESSION['authenticated'])){
                redirect('Login or Register to access the page','login.php');

                return false;
            }else{
                return true;
            }
        }

        public function userDetails()
        {
            $checkUser = $this->checkIsLoggedIn();

            if($checkUser){
                $userID = $_SESSION['user']['id'];

                $getUserQuery = "
                    SELECT *
                    FROM users
                    WHERE userID='$userID'
                    LIMIT 1
                ";
                $result = $this->conn->query($getUserQuery);

                if($result->num_rows > 0){
                    $data = $result->fetch_assoc();
                    
                    return $data;
                }else{
                    die("Error: " . $this->conn->error);
                }
            }
        }

    }
?>