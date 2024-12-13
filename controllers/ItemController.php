<?php
    class ItemController
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

        // Get or Display all only the available item on inventory
        public function displayAll()
        {
            $getDataQuery = "
                SELECT inventory.*, categories.categoryName, categories.categoryGender
                FROM inventory
                INNER JOIN categories
                ON inventory.categoryID = categories.categoryID
            ";
            $result = $this->conn->query($getDataQuery);

            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }
        }

        // Get or Display the Men categories
        public function displayMen()
        {
            $getDataQuery = "
                SELECT inventory.*, categories.categoryName, categories.categoryGender
                FROM inventory
                INNER JOIN categories
                ON inventory.categoryID = categories.categoryID
                WHERE categories.categoryGender='Men'
            ";
            $result = $this->conn->query($getDataQuery);

            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }
        }

        // Get or Display the Women categories
        public function displayWomen()
        {
            $getDataQuery = "
                SELECT inventory.*, categories.categoryName, categories.categoryGender
                FROM inventory
                INNER JOIN categories
                ON inventory.categoryID = categories.categoryID
                WHERE categories.categoryGender='Women'
            ";
            $result = $this->conn->query($getDataQuery);

            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }
        }

        // Get or Display the Accessories categories
        public function displayAccessories()
        {
            $getDataQuery = "
                SELECT inventory.*, categories.categoryName, categories.categoryGender
                FROM inventory
                INNER JOIN categories
                ON inventory.categoryID = categories.categoryID
                WHERE categories.categoryName='Accessories'
            ";
            $result = $this->conn->query($getDataQuery);

            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }
        }
        
    }
?>