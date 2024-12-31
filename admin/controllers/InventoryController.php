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

            $this->totalStock();
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

        // Total of Items, it display to dashboard
        public function totalStockItem()
        {
            $getDataQuery = "
                SELECT SUM(itemTotalStock) AS totalStock
                FROM inventory
            ";
            $getData = $this->conn->query($getDataQuery);

            $row = $getData->fetch_assoc();

            return $row['totalStock'];
        }
        
        // Storing the data in array with key and assign the row as a value
        public function rows($row)
        {
            // it return data to function
            return $data = [
                'id' => $row['inventoryID'],
                'subcategoryID' => $row['subcategoryID'],
                'subcategoryName' => $row['subcategoryName'],
                'categoryName' => $row['categoryName'],
                'image' => $row['itemImage'],
                'name' => $row['itemName'],
                'price'=> $row['itemPrice'],
                'totalStock'=> $row['itemTotalStock'],
                'status'=> $row['itemStatus']
            ];
        }

        // Display all item
        public function displayAll()
        {
            $getDataQuery = "
                SELECT inventory.*, subcategories.subcategoryName, categories.categoryName
                FROM inventory
                INNER JOIN subcategories
                ON inventory.subcategoryID = subcategories.subcategoryID
                INNER JOIN categories 
                ON subcategories.categoryID = categories.categoryID
                WHERE inventory.itemStatus='Available'
                ORDER BY inventory.itemName
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

        // Display only Men subcategories
        public function displayMen()
        {
            $getDataQuery = "
                SELECT inventory.*, subcategories.subcategoryName, categories.categoryName
                FROM inventory
                INNER JOIN subcategories
                ON inventory.subcategoryID = subcategories.subcategoryID
                INNER JOIN categories 
                ON subcategories.categoryID = categories.categoryID
                WHERE subcategories.subcategoryName='Men Clothing'
                AND inventory.itemStatus='Available'
                ORDER BY inventory.itemName
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

        // Display only Women subcategories
        public function displayWomen()
        {
            $getDataQuery = "
                SELECT inventory.*, subcategories.subcategoryName, categories.categoryName
                FROM inventory
                INNER JOIN subcategories
                ON inventory.subcategoryID = subcategories.subcategoryID
                INNER JOIN categories 
                ON subcategories.categoryID = categories.categoryID
                WHERE subcategories.subcategoryName='Women Clothing'
                AND inventory.itemStatus='Available'
                ORDER BY inventory.itemName
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

        // Display only Men Footwear subcategories
        public function displayMenFootwear()
        {
            $getDataQuery = "
                SELECT inventory.*, subcategories.subcategoryName, categories.categoryName
                FROM inventory
                INNER JOIN subcategories
                ON inventory.subcategoryID = subcategories.subcategoryID
                INNER JOIN categories 
                ON subcategories.categoryID = categories.categoryID
                WHERE subcategories.subcategoryName='Men Footwear'
                AND inventory.itemStatus='Available'
                ORDER BY inventory.itemName
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

        // Display only Women Footwear subcategories
        public function displayWomenFootwear()
        {
            $getDataQuery = "
                SELECT inventory.*, subcategories.subcategoryName, categories.categoryName
                FROM inventory
                INNER JOIN subcategories
                ON inventory.subcategoryID = subcategories.subcategoryID
                INNER JOIN categories 
                ON subcategories.categoryID = categories.categoryID
                WHERE subcategories.subcategoryName='Women Footwear'
                AND inventory.itemStatus='Available'
                ORDER BY inventory.itemName
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

        // Display only Accessories joining the categories, subcategories in inventory
        public function displayAccessories()
        {
            $getDataQuery = "
                SELECT inventory.*, subcategories.subcategoryName, categories.categoryName
                FROM inventory
                INNER JOIN subcategories 
                ON inventory.subcategoryID = subcategories.subcategoryID
                INNER JOIN categories 
                ON subcategories.categoryID = categories.categoryID
                WHERE categories.categoryName='Accessories'
                AND inventory.itemStatus='Available'
                ORDER BY inventory.itemName
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
                SELECT inventory.*, subcategories.subcategoryName, categories.categoryName
                FROM inventory
                INNER JOIN subcategories
                ON inventory.subcategoryID = subcategories.subcategoryID
                INNER JOIN categories 
                ON subcategories.categoryID = categories.categoryID
                WHERE inventoryID='$updateID'
                LIMIT 1
            ";
            $result = $this->conn->query($checkDataQuery);

            if($result->num_rows == 1){

                // $this->exactTotalStock($updateID);
                $this->totalStock();

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

        public function exactTotalStock($inventoryID)
        {
            $updateDataQuery = "
                UPDATE inventory
                SET itemTotalStock = (
                    SELECT SUM(sizeStock)
                    FROM sizes
                    WHERE sizes.inventoryID='$inventoryID'
                )
            ";
            $result = $this->conn->query($updateDataQuery);

            return $result;
        }

        // Getting all the inventory values and display on table only available item
        public function getAvail()
        {
            // Joining the category,size table to inventory table using the categoryID, sizeID on inventory
            $getDataQuery = "
                SELECT inventory.*, subcategories.subcategoryName, categories.categoryName
                FROM inventory
                INNER JOIN subcategories
                ON inventory.subcategoryID = subcategories.subcategoryID
                INNER JOIN categories 
                ON subcategories.categoryID = categories.categoryID
                WHERE itemStatus='Available'
                ORDER BY itemName
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

        // Getting all the inventory values and display on table
        public function get()
        {
            // Joining the category,size table to inventory table using the categoryID, sizeID on inventory
            $getDataQuery = "
                SELECT inventory.*, subcategories.subcategoryName, categories.categoryName
                FROM inventory
                INNER JOIN subcategories
                ON inventory.subcategoryID = subcategories.subcategoryID
                INNER JOIN categories 
                ON subcategories.categoryID = categories.categoryID
                ORDER BY itemName
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
                SELECT inventory.*, subcategories.subcategoryName, categories.categoryName
                FROM inventory
                INNER JOIN subcategories
                ON inventory.subcategoryID = subcategories.subcategoryID
                INNER JOIN categories 
                ON subcategories.categoryID = categories.categoryID
                WHERE inventoryID='$id'
                LIMIT 1
            ";
            $result = $this->conn->query($getDataQuery);

            if($result->num_rows == 1){

                $this->totalStock();
                
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
            $subID = $inputData['subcategory'];

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