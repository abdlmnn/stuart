<?php
    class CartController
    {
        private $conn;

        public function __construct()
        {   
                // calling my DatabaseConnection
            $db = new DatabaseConnection;

            // this variable conn is assign as the db of my conn
            $this->conn = $db->conn;  
        }

        // Empty session order array
        public function emptyCart()
        {
            return $_SESSION['cart']= [];
        }

        // Storing the data in array with key and assign the row as a value
        public function rows($row)
        {
            // it return data to function
            return $data = [
                'id' => $row['inventoryID'],
                'subID' => $row['subcategoryID'],
                'subName'=> $row['subcategoryName'],
                'image' => $row['itemImage'],
                'name' => $row['itemName'],
                'price'=> $row['itemPrice'],
                'totalStock'=> $row['itemTotalStock'],
                'status'=> $row['itemStatus']
            ];
        }

        // Getting all the values of categories with exact id to display there values on inputFields
        public function exact($id)
        {
            $checkDataQuery = "
                SELECT inventory.*, subcategories.subcategoryName
                FROM inventory
                INNER JOIN subcategories
                ON inventory.subcategoryID = subcategories.subcategoryID
                WHERE inventoryID='$id'
                LIMIT 1
            ";
            $result = $this->conn->query($checkDataQuery);

            if($result->num_rows == 1){
                $rows = $result->fetch_assoc();

                // it return the rows to the function
                return $rows;
            }else{

                // it return false of the result to the function
                return false;
            }
        }

        public function getStock($id)
        {
            $getDataQuery = "
                SELECT inventory.*, subcategories.subcategoryName
                FROM inventory
                INNER JOIN subcategories
                ON inventory.subcategoryID = subcategories.subcategoryID
                WHERE inventoryID='$id'
            ";
            $result = $this->conn->query($getDataQuery);

            if($result){
                $rows = $result->fetch_assoc();

                return $rows;
            }else{
                return false;
            }
            
        }
        
    }
?>