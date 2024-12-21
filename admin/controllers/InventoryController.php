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

        // Total of Items, it display to dashboard
        public function totalItems()
        {
            $getDataQuery = "
                SELECT *
                FROM inventory
            ";
            $getData = $this->conn->query($getDataQuery);

            return $getData->num_rows;
        }
        
        // Total of Categories, it display to dashboard
        public function totalCategories()
        {
            $getDataQuery = "
                SELECT * 
                FROM categories
            ";
            $getData = $this->conn->query($getDataQuery);

            return $getData->num_rows;
        }

        // Storing the data in array with key and assign the row as a value
        public function rows($row)
        {
            // it return data to function
            return $data = [
                'id' => $row['inventoryID'],
                'subcategoryID' => $row['subcategoryID'],
                'subcategoryName' => $row['subcategoryName'],
                'image' => $row['itemImage'],
                'name' => $row['itemName'],
                'price'=> $row['itemPrice'],
                'totalStock'=> $row['itemTotalStock'],
                'status'=> $row['itemStatus']
            ];
        }

        // Upload image file from path
        public function imagePath($inventoryData)
        {
            $image = $inventoryData['image'];
            $path = "../images/" . $image;

            return $path;
        }

        // Check the image if it is empty input
        public function checkEmptyImage($inventoryData)
        {
            $image = $inventoryData['image'];
            
            if(empty($image)){

                // if the image is empty, it return false to the function
                return false;
            }else{

                // if the image is not empty, it return true to the function
                return true;
            }
        }

        // Getting all the values of categories with exact id to display there values on inputFields
        public function exact($updateID)
        {
            $checkDataQuery = "
                SELECT inventory.*, subcategories.subcategoryName
                FROM inventory
                INNER JOIN subcategories
                ON inventory.subcategoryID = subcategories.subcategoryID
                WHERE inventoryID='$updateID'
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

        // Update and sum up the total of the size Stock so the totatStock will be display the sum size Stock
        public function totalStock()
        {
            $updateDataQuery = "
                UPDATE inventory
                SET itemTotalStock = (
                    SELECT SUM(sizeStock)
                    FROM sizes
                    WHERE sizes.inventoryID = inventory.inventoryID
                )
            ";
            $result = $this->conn->query($updateDataQuery);

            return $result;
        }

        // Getting all the inventory values and display on table
        public function get()
        {
            // Joining the category,size table to inventory table using the categoryID, sizeID on inventory
            $getDataQuery = "
                SELECT inventory.*, subcategories.subcategoryName
                FROM inventory
                INNER JOIN subcategories
                ON inventory.subcategoryID = subcategories.subcategoryID
            ";
            $result = $this->conn->query($getDataQuery);

            if($result->num_rows > 0){
                
                $this->totalStock();

                return $result;
            }else{

                // it return false of the result to the function
                return false;
            }
        }

        // Get only the exact ID of inventory values when editing
        public function getExact($id)
        {
            $getDataQuery = "
                SELECT inventory.*, subcategories.subcategoryName
                FROM inventory
                INNER JOIN subcategories
                ON inventory.subcategoryID = subcategories.subcategoryID
                WHERE inventoryID='$id'
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

        // Check the name, image are the same 
        public function checkDuplicate($image,$name)
        {   
            $checkDataQuery = "
                SELECT COUNT(*) 
                FROM inventory
                WHERE itemName='$name'
                AND itemImage='$image' 
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

        // Add input data to inventory table values
        public function add($inputData)
        {
            $image = $inputData['image'];
            $name = $inputData['name'];

            // checkDuplicate came from my function checkDuplicate

                                  // checkDuplicate came from my Function checkDuplicate
            $resultCheckDuplicate = $this->checkDuplicate($image,$name); 

            if($resultCheckDuplicate){
                      
                    redirect('The item already exists', 'admin/add-inventory.php');
                    return false;
            }else{

                // it will dislpay all the data of my inputData which is in array inventoryData
                $allData = implode("', '", $inputData); 

                $addDataQuery = "
                    INSERT INTO
                    inventory (subcategoryID,itemImage,itemName,itemPrice)
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

        // Update status when stock is 0 then the status went unavail
        public function updateStatusUnavail($status,$id)
        {
            $updateDataQuery = "
                UPDATE inventory
                SET itemStatus='$status'
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

        // Update status when stock is 0 then the status went unavail
        public function updateStatusAvail($status,$id)
        {
            $updateDataQuery = "
                UPDATE inventory
                SET itemStatus='$status'
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

        // Update the values of inventory rows 
        public function update($data)
        {
            $id = $data['id'];
            $subcategory = $data['subcategory'];
            $image = $data['image'];
            $name = $data['name'];
            $price = $data['price'];

            $updateDataQuery = "
                UPDATE inventory
                SET subcategoryID='$subcategory',
                    itemImage='$image',
                    itemName='$name',
                    itemPrice='$price'
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

        // Delete the exact ID sizes after deleting the item in inventory Table
        public function deleteSize($deleteID)
        {
            $deleteDataQuery = "
                DELETE 
                FROM sizes
                WHERE inventoryID='$deleteID'
            ";
            $result = $this->conn->query($deleteDataQuery);

            if($result){
                
                return true;
            }else{

                return false;
            }
        }

        // Delete the value of inventory row with exact ID
        public function delete($deleteID)
        {   
                              // deleteSize came from my Function deleteSize 
            $resultDeleteSize = $this->deleteSize($deleteID);
            
            if($resultDeleteSize){

                $deleteDataQuery = "
                    DELETE
                    FROM inventory
                    WHERE inventoryID='$deleteID'
                    LIMIT 1
                ";
                $result = $this->conn->query($deleteDataQuery);

                if($result){
                    
                    return true;
                }else{

                    return false;
                }

            }else{

                redirect('Something went wrong','admin/add-size.php');
            }
            
        }

    }
?>