<?php
    class InventoryController
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
                'image' => $row['itemImage'],
                'name' => $row['itemName'],
                'size'=> $row['itemSize'],
                'stock'=> $row['itemStock'],
                'price'=> $row['itemPrice']
            ];
        }

        // Upload image file from path
        public function imagePath($inventoryData)
        {
            $image = $inventoryData['image'];
            $path = "../images/" . $image;

            return $path;
        }

        // Getting all the inventory values and display on table
        public function get()
        {
            // Joining the category table to inventory table using the categoryID on inventory
            $getDataQuery = "
                SELECT inventory.*, categories.categoryName
                FROM inventory 
                INNER JOIN categories 
                ON inventory.categoryID = categories.categoryID
            ";
            $result = $this->conn->query($getDataQuery);

            if($result->num_rows > 0){

                // it return the result to the function
                return $result;
            }else{

                // it return false of the result to the function
                return false;
            }
        }

        // Add input data to inventory table values
        public function add($inputData)
        {
            // it will dislpay all the data of my inputData which is in array inventoryData
            $allData = implode("', '", $inputData); 

            $addDataQuery = "
                INSERT INTO
                inventory (categoryID,itemImage,itemName,itemSize,itemStock,itemPrice)
                VALUES ('$allData')
            ";
            $result = $this->conn->query($addDataQuery);

            // if the result of addQuery is true or false 
            if($result){
                
                // if it true this will run on my inventory-codes which is the INVENTORY ADD
                return true;
            }else{

                // if it false this will run on my inventory-codes which is the INVENTORY ADD
                return false;
            }
        }
    }
?>