<?php
    class AuthenticateController
    {
        private $conn;
        
        public function __construct()
        {   
                // calling my DatabaseConnection
            $db = new DatabaseConnection;

            // this variable conn is assign as the db of my conn
            $this->conn = $db->conn;

            // i called from my function checkIsLoggedIn
            // $this->checkIsLoggedIn();    
        }

        public function rows($row)
        {
            return $data = [
                'name'=>$row['userFullname'],
                'number'=>$row['userNumber'],
                'address'=>$row['userAddress'],
                'gender'=>$row['userGender'],
                'email'=>$row['userEmail']
            ];
        }

        

        // Display the orders of exact users
        public function exactOrders()
        {
            $userID = $_SESSION['user']['id'];

            $getDataQuery = "
                SELECT * 
                FROM orders
                WHERE userID='$userID'
            ";
            $result = $this->conn->query($getDataQuery);
            
            if($result){

                return $result;
            }else{

                return false;
            }
        }

        public function userTable()
        {
            $email = $_SESSION['user']['email'];
            
            $getDataQuery = "
                SELECT * 
                FROM users
                WHERE userEmail='$email'
            ";
            $result = $this->conn->query($getDataQuery);

            if($result->num_rows > 0){

                $rows = $result->fetch_assoc();

                return $rows;
            }
        }

        // adminOnly can access the admin pages, when customer attempting to access the admin pages
        public function adminOnly()
        {
            if(isset($_SESSION['user']['id']))
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

                // if the usertype is admin which is true
                if($result->num_rows == 1){
                    return true;
                }else{

                    // if the usertype is customer, it direct customer page when attempting to access admin page
                    redirect('You are not authorized as admin','view-customer.php');
                }
            }
        }

        // customerOnly can access the customer pages, when admin attempting to access the customer pages
        public function customerOnly()
        {
            if(isset($_SESSION['user']['id']))
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

                // if the usertype is customer which is true
                if($result->num_rows == 1){
                    return true;
                }else{

                    // if the usertype is admin , it direct customer page when attempting to access customer page
                    redirect('You are not register as a customer','admin/view-dashboard.php');
                }
            }
        }

        // CheckIsLoggedIn if not, it required to login
        public function checkIsLoggedIn()
        {
            // if the session authenticated is set false
            if(!isset($_SESSION['authenticated'])){

                // it direct to login page
                redirect('Please login to access the page','view-login.php');
                return false;
            }else{
                return true;
            }
        }

        // Get userDetails Data from users Table
        public function userDetails()
        {
                       // i called from my function checkIsLoggedIn
            $checkUser = $this->checkIsLoggedIn();

            // if the checkUser is true 
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
                    
                    // fetching all values on users table Rows
                    return $data;
                }else{
                    return false;
                }
            }
        }

    }
?>