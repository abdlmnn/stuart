<?php
    class PaymentController
    {
        private $conn;

        public function __construct()
        {   
                // calling my DatabaseConnection
            $db = new DatabaseConnection;

            // this variable conn is assign as the db of my conn
            $this->conn = $db->conn;  
        }

        // 
        public function addOrderLine($orderlineData)
        {
            // it will dislpay all the data of my inputData which is in array registerData
            $data = "'". implode("', '",$orderlineData) ."'";

            $insertDataQuery = "
                INSERT INTO
                orderline (orderID,inventoryID,sizeID,orderlineQuantity,orderlineTotal)
                VALUES ($data)
            ";
            $result = $this->conn->query($insertDataQuery);

            return $result;
        }

        public function getOrderId()
        {
            $id = $_SESSION['user']['id'];

            $getDataQuery = "
                SELECT orderID
                FROM orders
                WHERE userID='$id'
                LIMIT 1
            ";
            $result = $this->conn->query($getDataQuery);

            if($result){

                $row = $result->fetch_assoc();

                $orderID = $row['orderID'];

                return $orderID;
            }else{

                return false;
            }
        }

        // Adding orders after successfull place order
        public function addOrders($orderData)
        {
            // it will dislpay all the data of my inputData which is in array registerData
            $data = "'". implode("', '",$orderData) ."'";
            
            // userFullname,userNumber,userAddress,userGender,
            $insertDataQuery = "
                INSERT INTO 
                orders (userID,orderAmount,paymentMethod)
                VALUES ($data)
            ";
            $result = $this->conn->query($insertDataQuery);

            return $result;
        }
    }
?>