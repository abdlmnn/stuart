<?php
    class OrderController
    {
        private $conn;

        public function __construct()
        {   
                // calling my DatabaseConnection
            $db = new DatabaseConnection;

            // this variable conn is assign as the db of my conn
            $this->conn = $db->conn;
        }

        public function totalSales()
        {
            $getDataQuery = "
                SELECT SUM(orderAmount) AS total
                FROM orders
                WHERE orderStatus='approved'
            ";
            $getData = $this->conn->query($getDataQuery);

            $row = $getData->fetch_assoc();

            $total = $row['total'];

            return $total;
        }

        // Total of Orders, it display to dashboard
        public function totalOrders()
        {
            $getDataQuery = "
                SELECT *
                FROM orders
                WHERE orderStatus='pending'
            ";
            $getData = $this->conn->query($getDataQuery);

            return $getData->num_rows;
        }

        public function getDataOrderline($orderID)
        {
            $getDataQuery = "
                SELECT orderline.*, orders.*, inventory.*, sizes.*
                FROM orderline
                INNER JOIN orders ON orderline.orderID = orders.orderID
                INNER JOIN inventory ON orderline.inventoryID = inventory.inventoryID
                INNER JOIN sizes ON orderline.sizeID = sizes.sizeID
                WHERE orderline.orderID='$orderID'
            ";
            $result = $this->conn->query($getDataQuery);
    
            if($result->num_rows > 0){

                return $result;
            }else{

                return false;
            }
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

        public function getDataOrderPending()
        {
            $getDataQuery = "
                SELECT orders.*, users.*
                FROM orders
                INNER JOIN users
                ON orders.userID = users.userID
                WHERE orderStatus='pending'
                ORDER BY orderDate DESC
            ";
            $result = $this->conn->query($getDataQuery);

            return $result;
        }

        public function getDataOrderApproved()
        {
            $getDataQuery = "
                SELECT orders.*, users.*
                FROM orders
                INNER JOIN users
                ON orders.userID = users.userID
                WHERE orderStatus='approved'
                ORDER BY orderDate DESC
            ";
            $result = $this->conn->query($getDataQuery);

            return $result;
        }

        public function getDataOrder()
        {
            $getDataQuery = "
                SELECT orders.*, users.*
                FROM orders
                INNER JOIN users
                ON orders.userID = users.userID
                ORDER BY orderDate DESC
            ";
            $result = $this->conn->query($getDataQuery);

            return $result;
        }

        public function deleteOrder($orderID)
        {
            $deleteDataQuery = "
                DELETE
                FROM orders
                WHERE orderID='$orderID'
                LIMIT 1
            ";
            $result = $this->conn->query($deleteDataQuery);
        
             return $result;
        }
    }
?>