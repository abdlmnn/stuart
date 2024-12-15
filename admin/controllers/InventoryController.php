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

          // Get or Display the Men Shoes categories
        public function displayMenShoes()
        {
            $getDataQuery = "
                SELECT inventory.*, categories.categoryName, categories.categoryGender
                FROM inventory
                INNER JOIN categories
                ON inventory.categoryID = categories.categoryID
                WHERE categories.categoryName='Shoes'
                && categories.categoryGender='Men'
            ";
            $result = $this->conn->query($getDataQuery);
  
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }
        }
  
          // Get or Display the Women Shoes categories
        public function displayWomenShoes()
        {
            $getDataQuery = "
                SELECT inventory.*, categories.categoryName, categories.categoryGender
                FROM inventory
                INNER JOIN categories
                ON inventory.categoryID = categories.categoryID
                WHERE categories.categoryName='Shoes'
                && categories.categoryGender='Women'
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
                'categoryName'=> $row['categoryName'],
                'gender'=> $row['categoryGender'],
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
                SELECT inventory.*, categories.categoryName, categories.categoryGender
                FROM inventory
                INNER JOIN categories
                ON inventory.categoryID = categories.categoryID
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

        // Getting all the inventory values and display on table
        public function get()
        {
            // Joining the category table to inventory table using the categoryID on inventory
            $getDataQuery = "
                SELECT inventory.*, categories.categoryName, categories.categoryGender
                FROM inventory 
                INNER JOIN categories 
                ON inventory.categoryID = categories.categoryID
                ORDER BY categories.categoryGender
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

        // Get only the exact ID of inventory values when editing
        public function getExact($id)
        {
            $getDataQuery = "
                SELECT inventory.*, categories.categoryName, categories.categoryGender
                FROM inventory
                INNER JOIN categories
                ON inventory.categoryID = categories.categoryID
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

        // Check categoryID of selected 
        public function checkCategory($id)
        {
            $checkCategoryQuery = "
                SELECT categoryID
                FROM categories
                WHERE categoryID='$id'
                LIMIT 1
            ";
            $result = $this->conn->query($checkCategoryQuery);

            if($result->num_rows == 0){

                redirect('Category is required','admin/add-inventory.php');
                return false;
            }else{
                return true;
            }
        }

        // Add input data to inventory table values
        public function add($inputData)
        {
            $categoryID = $inputData['category'];
            // checkCategory came from my function CheckCategory
            $this->checkCategory($categoryID);

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

        // Update the values of inventory rows 
        public function update($data)
        {
            $categoryID = $data['category'];
            // checkCategory came from my function CheckCategory
            $this->checkCategory($categoryID);

            $id = $data['id'];
            $category = $data['category'];
            $image = $data['image'];
            $name = $data['name'];
            $size = $data['size'];
            $stock = $data['stock'];
            $price = $data['price'];

            $updateDataQuery = "
                UPDATE inventory
                SET categoryID='$category',
                    itemImage='$image',
                    itemName='$name',
                    itemSize='$size',
                    itemStock='$stock',
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

        // Delete the value of inventory row with exact ID
        public function delete($deleteID)
        {
            $deleteDataQuery = "
                DELETE
                FROM inventory
                WHERE inventoryID='$deleteID'
                LIMIT 1
            ";
            $result = $this->conn->query($deleteDataQuery);

            if($result){
                
                // it return true to the function
                return true;
            }else{

                // it return false to the function
                return false;
            }
        }

    }
?>