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
        public function emptyOrder()
        {
            $_SESSION['order'] = [];
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

        // Set the quantity 1 or more than 1 exact id
        public function quantity($inventoryID,$quantity)
        {
            // using multi dimensional array it check if the id is in the session order
            if(isset($_SESSION['order'][$inventoryID])){

                // adding quantity more than 1 or input quantity
                return $_SESSION['order'][$inventoryID] = $_SESSION['order'][$inventoryID] + $quantity;
            }else{
    
                // adding quantity in the session order

                // if i add number 1 in the cart it also add 1 quantity
                return $_SESSION['order'][$inventoryID] = $quantity;
            }
        }

        // Update the stock of inventory when item been added in order
        public function updateStock($inventoryID,$quantity)
        {
            $updateDataQuery = "
                UPDATE inventory
                SET itemStock=itemStock - $quantity
                WHERE inventoryID='$inventoryID'
                LIMIT 1
            ";
            $result = $this->conn->query($updateDataQuery);

            if($result){
                return true;
            }else{
                return false;
            }
        }

        // Update the stock of inventory when item been remove in order
        public function updateStockDelete($id)
        {
            if(isset($_SESSION['order'][$id])){

                $quantity = $_SESSION['order'][$id]['quantity'];

                $updateDataQuery = "
                    UPDATE inventory
                    SET itemStock= itemStock + $quantity
                    WHERE inventoryID='$id'
                    LIMIT 1
                ";
                $result = $this->conn->query($updateDataQuery);

                if($result){
                    return true;
                }else{
                    return false;
                }
            }
        }

        public function updateStockDeleteAll(){
            foreach($_SESSION['order'] as $id => $data){
                
                $quantity = $data['quantity'];

                $updateDataQuery = "
                    UPDATE inventory
                    SET itemStock = itemStock + $quantity
                    WHERE inventoryID='$id'
                ";
                $result = $this->conn->query($updateDataQuery);

                if($result){

                    return true;
                }else{
                    return false;
                }
            }
        }
    }
?>