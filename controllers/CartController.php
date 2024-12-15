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
                'categoryName'=> $row['categoryName'],
                'gender'=> $row['categoryGender'],
                'image' => $row['itemImage'],
                'name' => $row['itemName'],
                'size'=> $row['itemSize'],
                'stock'=> $row['itemStock'],
                'price'=> $row['itemPrice']
            ];
        }

        // Getting all the values of categories with exact id to display there values on inputFields
        public function exact($id)
        {
            $checkDataQuery = "
                SELECT inventory.*, categories.categoryName, categories.categoryGender
                FROM inventory
                INNER JOIN categories
                ON inventory.categoryID = categories.categoryID
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
    }
?>