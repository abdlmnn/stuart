<?php
    class ForgotPasswordController
    {
        private $conn;

        public function __construct()
        {   
                // calling my DatabaseConnection
            $db = new DatabaseConnection;

            // this variable conn is assign as the db of my conn
            $this->conn = $db->conn;
        }

        // Check if the code and userCode are same or not
        public function checkCode($code)
        {
            $checkDataQuery = "
                SELECT *
                FROM users
                WHERE userCode='$code'
                LIMIT 1
            ";
            $result = $this->conn->query($checkDataQuery);

            // if the result of code does not the same of userCode it is invalid
            if($result->num_rows == 0){

                return false;
            }else{

                return true;
            }
        }

        // Update or Add the code into the userCode row
        public function updateCode($data)
        {
            $email = $data['email'];
            $code = $data['code'];

            $updateDataQuery = "
                UPDATE users
                SET userCode='$code'
                WHERE userEmail='$email'
                LIMIT 1
            ";
            $result = $this->conn->query($updateDataQuery);

            if($result){

                $selectDataQuery = "
                    SELECT *
                    FROM users
                    WHERE userEmail='$email'
                    LIMIT 1
                ";
                $resultSelect = $this->conn->query($selectDataQuery);

                $row = $resultSelect->fetch_assoc();

                $_SESSION['code'] = $row['userCode'];

                return true;
            }else{
                return false;
            }
        }

        // Delete or Set Null the userCode 
        public function setNull($data)
        {
            $code = $data['code'];

            $updateDataQuery = "
                UPDATE users
                SET userCode=NULL
                WHERE userCode='$code'
                LIMIT 1
            ";
            $result = $this->conn->query($updateDataQuery);

            return $result;
        }
    }
?>