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

        // Storing the data in array with key and assign the row as a value
        public function rows($row)
        {
            // it return data to function
            return $data = [
                'id' => $row['inventoryID'],
                // 'categoryName'=> $row['categoryID'],
                'categoryName'=> $row['categoryName'],
                'gender'=> $row['categoryGender'],
                'image' => $row['itemImage'],
                'name' => $row['itemName'],
                'size'=> $row['itemSize'],
                'stock'=> $row['itemStock'],
                'price'=> $row['itemPrice']
            ];
        }

        // Get or Select the exact ID for the itemStock
        public function getStock($id)
        {
            $getDataQuery = "
                SELECT inventory.*, categories.categoryName, categories.categoryGender
                FROM inventory
                INNER JOIN categories
                ON inventory.categoryID = categories.categoryID
                WHERE inventory.inventoryID='$id'
            ";
            $result = $this->conn->query($getDataQuery);

            if($result->num_rows > 0){
                $rows = $result->fetch_assoc();

                return $rows;
            }else{

                return false;
            }
        }
    }
?>