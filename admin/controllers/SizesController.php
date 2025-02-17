<?php
    class SizesController
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
                'id' => $row['sizeID'],
                'inventoryID' => $row['inventoryID'],
                'itemImage' => $row['itemImage'],
                'status' => $row['itemStatus'],
                'itemName' => $row['itemName'],
                'name' => $row['sizeName'],
                'stock' => $row['sizeStock']
            ];
        }

        // Getting all the sizes values and display on table
        public function get() 
        {
            $getDataQuery = "
                SELECT sizes.*, inventory.*
                FROM sizes
                INNER JOIN inventory
                ON sizes.inventoryID = inventory.inventoryID
                ORDER BY inventory.itemName
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

        // Get the exact Size using sizeID
        public function getSizeName($sizeID) 
        {
            $getDataQuery = "
                SELECT sizes.*, inventory.*
                FROM sizes
                INNER JOIN inventory
                ON sizes.inventoryID = inventory.inventoryID
                WHERE sizes.sizeID='$sizeID'
                LIMIT 1
            ";
            $result = $this->conn->query($getDataQuery);

            if($result->num_rows > 0){

                $row = $result->fetch_assoc();
                // it return the result to the function
                return $row;
            }else{

                // it return false of the result to the function
                return false;
            }
        }

        // Getting all the sizes values and display on table
        public function getSizeOnly($inventoryID) 
        {
            $getDataQuery = "
                SELECT sizes.*, inventory.*
                FROM sizes
                INNER JOIN inventory
                ON sizes.inventoryID = inventory.inventoryID
                WHERE inventory.inventoryID='$inventoryID'
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

        // Getting all the sizes values and display on table Order By
        public function getOrderBy() 
        {
            $getDataQuery = "
                SELECT sizes.*, inventory.*
                FROM sizes
                INNER JOIN inventory
                ON sizes.inventoryID = inventory.inventoryID
                ORDER BY inventory.itemName ASC
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

        // Get the exact inventoryID of stock
        public function getExactStock($inventoryID,$size)
        {
            $getDataQuery = "
                SELECT sizeStock, sizeName, inventory.*
                FROM sizes
                INNER JOIN inventory
                ON sizes.inventoryID = inventory.inventoryID
                WHERE inventory.inventoryID='$inventoryID'
                AND sizes.sizeID='$size'
                LIMIT 1
            ";
            $result = $this->conn->query($getDataQuery);

            if($result->num_rows > 0){
                $row = $result->fetch_assoc();

                return $row;
            }else{
                return false;
            }
        }

        // Get the exact inventoryID  to display the sizeName
        public function getExactInventoryID($inventoryID)
        {
            $getDataQuery = "
                SELECT *
                FROM sizes
                WHERE inventoryID='$inventoryID'
            ";
            $result = $this->conn->query($getDataQuery);

            if($result->num_rows > 0){

                return $result;
            }else{
                return false;
            }
        }

        // Getting all the values of sizes with exact id to display there values
        public function exact($updateID)
        {
            $checkDataQuery = "
                SELECT sizes.*, inventory.*
                FROM sizes
                INNER JOIN inventory
                ON sizes.inventoryID = inventory.inventoryID
                WHERE sizes.sizeID='$updateID'
                LIMIT 1
            ";
            $result = $this->conn->query($checkDataQuery);  
            
            if($result->num_rows == 1){

                // it return the result to the function
                return $result;
            }else{

                // it return false of the result to the function
                return false;
            }
        }

        // Get only the exact ID of categories values when editing
        public function getExact($id)
        {
            $getDataQuery = "
                SELECT sizes.*, inventory.*
                FROM sizes
                INNER JOIN inventory
                ON sizes.inventoryID = inventory.inventoryID
                WHERE sizeID='$id'
                LIMIT 1
            ";
            $result = $this->conn->query($getDataQuery);

            if($result->num_rows == 1){

                // it return the result to the function
                return $result;
            }else{
                
                // it return false of the result to the function
                return false;
            }
        }

        // Check the inventory, size, name are the same 
        public function checkDuplicate($inventoryID, $sizeName)
        {
            $checkDataQuery = "
                SELECT COUNT(*) 
                FROM sizes
                WHERE inventoryID = '$inventoryID' 
                AND sizeName = '$sizeName' 
                LIMIT 1
            ";
            $result = $this->conn->query($checkDataQuery);
            
            if($result){
                $rowCheck = $result->fetch_row();

                return $rowCheck[0] > 0; 
            }else{
                return false; 
            }

        }

        // Add input data to size table values
        public function add($item,$sizeName,$sizeStock)
        {
                                  // checkDuplicate came from my Function checkDuplicate
            $resultCheckDuplicate = $this->checkDuplicate($item, $sizeName); 

            if($resultCheckDuplicate){

                redirect('The item already exists', 'admin/add-size.php');
                return false;
            }else{

                $addDataQuery = "
                    INSERT INTO
                    sizes (inventoryID,sizeName,sizeStock)
                    VALUES ('$item','$sizeName','$sizeStock')
                ";
                $result = $this->conn->query($addDataQuery);
                
                // if the result of addQuery is true or false 
                if($result){
                    
                    // if it true this will run on my size-codes which is the size ADD
                    return true;
                }else{

                    // if it false this will run on my size-codes which is the size ADD
                    return false;
                }

            }
            
        }

        // Update the values of sizes rows 
        public function update($data)
        {   
            $id = $data['id'];
            // $inventoryID = $data['inventoryID'];
            $name = $data['name'];
            $stock = $data['stock'];

            $updateDataQuery = "
                UPDATE sizes
                SET sizeName='$name',
                    sizeStock='$stock'
                WHERE sizeID='$id'
                LIMIT 1
            ";
            $result = $this->conn->query($updateDataQuery);

            if($result){
                return true;
            }else{
                return false;
            }
            
        }

        // Update the stock of sizes exact ID
        public function updateStock($sizeID,$inventoryID,$quantity)
        {
            $updateDataQuery = "
                UPDATE sizes
                SET sizeStock = sizeStock - $quantity
                WHERE sizeID='$sizeID' 
                AND inventoryID='$inventoryID'
                LIMIT 1
            ";
            $result = $this->conn->query($updateDataQuery);
            
            return $result;
        }

        // Update the stock of sizes exact ID after deleting the item
        public function updateStockDelete($size,$inventoryID,$quantity)
        {
            $updateDataQuery = "
                UPDATE sizes
                SET sizeStock = sizeStock + $quantity
                WHERE sizeID='$size' 
                AND inventoryID='$inventoryID'
                LIMIT 1
            ";
            $result = $this->conn->query($updateDataQuery);
                
            return $result;
        }

        // Delete the value of sizes row with exact ID
        public function delete($deleteID)
        {
            $deleteDataQuery = "
                DELETE
                FROM sizes
                WHERE sizeID='$deleteID'
                LIMIT 1
            ";
            $result = $this->conn->query($deleteDataQuery);

            if($result){
                return true;
            }else{
                return false;
            }
        }
    }
?>