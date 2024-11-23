<?php
    class LoginController
    {
        private $conn;

        public function __construct()
        {   
                // calling my DatabaseConnection
            $db = new DatabaseConnection;

            // this variable conn is assign as the db of my conn
            $this->conn = $db->conn;
        }

        // It check the email and password in order the user can login
        public function userLogin($email,$password)
        {
            $checkLoginQuery = "
                SELECT *
                FROM users
                WHERE userEmail='$email'
                LIMIT 1
            ";
            $result = $this->conn->query($checkLoginQuery);
            
            if($result->num_rows > 0){
                $userData = $result->fetch_assoc();

                // I compared the inputPassword to userPassword which is for my user Table
                if($password == $userData['userPassword']){ 

                    // if the inputPassword is same as userPassword table it will run or execute the function userAuthentication
                    $this->userAuthentication($userData);
                    return true;
                }else{

                    // if the inputPassword is not the same as userPassword table it will redirect to login.php
                    redirect('Your Password is invalid, Please try again','login.php');
                    return false;
                }

            }else{

                // This will return false through my if statement $checkLogin 
                return false;
            }
        }

        // Saving the user info in the session array and indicating the user authenticated 
        private function userAuthentication($data)
        {
            // to check if the user is logged in which is true
            $_SESSION['authenticated'] = true;

            // storing the users info using session array
            $_SESSION['user'] = [
                'id' => $data['userID'],
                'fullname' => $data['userFullname'],
                'email' => $data['userEmail'],
                'type' => $data['userType']
            ];
        }

        // The user is already logged in and trying to search the file path of going back
        public function UserLoggedIn()
        {
            if(isset($_SESSION['authenticated']) === true){

                // getting the user type from my session which is on my function userAuthentication
                $usertype = $_SESSION['user']['type'];

                // if the usertype is 0 which is true 
                if($usertype == '0'){

                    // it direct to customer page
                    redirect('You are already Logged In as a customer','customer.php');
                }else if($usertype == '1'){

                    // if the usertype is 1, it direct to admin page 
                    redirect('You are already Logged In as a admin','admin/dashboard.php');
                }

            }else{

                // the user not logged in still can access the login or register page
                return false;
            }
        }

        // Logout destroying session and unset 
        public function userLogout()
        {
            if(isset($_SESSION['authenticated']) === true){

                unset($_SESSION['authenticated']);
                unset($_SESSION['user']);

                // session_destroy();

                return true;
            }else{

                // if the user not logged in 
                return false;
            }
        }
    }
?>