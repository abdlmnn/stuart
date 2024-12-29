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

        // Upload image file from path
        public function imagePath($image)
        {
            $path = "../gcash/" . $image;

            return $path;
        }

        // Add new data through the orderline table
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

        public function getExactOrder($id)
        {
            $getDataQuery = "
                SELECT orders.*, users.*
                FROM orders
                INNER JOIN users
                ON orders.userID = users.userID
                WHERE orders.orderID='$id'
            ";
            $result = $this->conn->query($getDataQuery);

            if($result){

                return $result;
            }else{

                return false;
            }
        }

        public function updatePaymentStatus1($orderID)
        {
            $updateDataQuery = "
                UPDATE orders
                SET paymentStatus='paid'
                WHERE orderID='$orderID'
            ";
            $result = $this->conn->query($updateDataQuery);

            return $result;
        }

        // public function updatePaymentStatus2($orderID)
        // {
        //     $updateDataQuery = "
        //         UPDATE payment
        //         SET paymentStatus='paid'
        //         WHERE orderID='$orderID'
        //     ";
        //     $result = $this->conn->query($updateDataQuery);

        //     return $result;
        // }

        // Add all the data to the payment
        public function addPayment($orderID,$amount,$proof)
        {
            $insertDataQuery = "
                INSERT INTO 
                payment (orderID,paymentAmount,paymentProof)
                VALUES ('$orderID','$amount','$proof')
            ";
            $result = $this->conn->query($insertDataQuery);

            if($result){

                $this->updatePaymentStatus1($orderID);

                // $this->updatePaymentStatus2($orderID);

                return true;
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

            if($result){

                // get the last inserted orderID in orders table
                $orderID = $this->conn->insert_id;

                return $orderID;
            }else{

                return false;
            }
        }
    }
?>