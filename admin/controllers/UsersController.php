<?php
    class UsersController
    {
        private $conn;

        public function __construct()
        {   
                // calling my DatabaseConnection
            $db = new DatabaseConnection;

            // this variable conn is assign as the db of my conn
            $this->conn = $db->conn;
        }

        // Storing the data in array with key and assign the row as a value
        public function rows($row)
        {
            // storing the users info using session array
            return $data = [
                'id' => $row['userID'],
                'fullname' => $row['userFullname'],
                'number' => $row['userNumber'],
                'address' => $row['userAddress'],
                'gender' => $row['userGender'],
                'email' => $row['userEmail'],
                'type' => $row['userType']
            ];
        }

        // Getting all the users values and display on table
        public function get() 
        {
            $getDataQuery = "
                SELECT *
                FROM users
                ORDER BY userType=0
            ";
            $result = $this->conn->query($getDataQuery);

            if($result->num_rows > 0){

                return $result;
            }else{

                return false;
            }
        }

        // Check the email if it is exists
        public function checkDuplicate($data)
        {
            $email = $data['email'];

            $checkDataQuery = "
                SELECT COUNT(*)
                FROM users
                WHERE userEmail='$email'
                LIMIT 1
            ";
            $result = $this->conn->query($checkDataQuery);
            
            if($result){
                $rowCheck = $result->fetch_row();

                return $rowCheck[0] > 0; 
            }else{
                return false; 
            }
        }

        public function add($inputData)
        {
            // checkDuplicate
            $resultCheckDuplicate = $this->checkDuplicate($inputData);

            if($resultCheckDuplicate){

                redirect('The user already exists','admin/add-users.php');
            }else{
                    
                // it will dislpay all the data of my inputData which is in array registerData
                $data = "'". implode("', '",$inputData) ."'";
                
                // userFullname,userNumber,userAddress,userGender,
                $registerQuery = "
                    INSERT INTO 
                    users (userEmail,userPassword,userType)
                    VALUES ($data)
                ";
                $result = $this->conn->query($registerQuery);

                return $result;
            }
        }

    }
?>