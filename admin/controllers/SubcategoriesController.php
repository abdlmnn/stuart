<?php
    class SubcategoriesController
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
                'id' => $row['subcategoryID'],
                'name' => $row['subcategoryName'],
                'categoryID' => $row['categoryID'],
                'categoryName' => $row['categoryName']
            ];
        }

        // Getting all the categories values and display on table with exact ID 
        public function getCategory($subcategoryID) 
        {
            $getDataQuery = "
                SELECT subcategories.*, categories.categoryName
                FROM subcategories
                INNER JOIN categories
                ON subcategories.categoryID = categories.categoryID
                WHERE subcategoryID = '$subcategoryID'
            ";
            $result = $this->conn->query($getDataQuery);

            if($result->num_rows > 0){

                return $result;
            }else{

                return false;
            }
        }

        // Getting all the subcategories values and display on table
        public function get() 
        {
            $getDataQuery = "
                SELECT subcategories.*, categories.categoryName
                FROM subcategories
                INNER JOIN categories
                ON subcategories.categoryID = categories.categoryID
            ";
            $result = $this->conn->query($getDataQuery);

            if($result->num_rows > 0){

                return $result;
            }else{

                return false;
            }
        }

        // Getting all the subcategories values and display on table
        // public function getMenCategory() 
        // {
        //     $getDataQuery = "
        //         SELECT *
        //         FROM subcategories
        //         WHERE categoryGender='Men'
        //         ORDER BY categoryGender 
        //     ";
        //     $result = $this->conn->query($getDataQuery);

        //     if($result->num_rows > 0){

        //         return $result;
        //     }else{

        //         return false;
        //     }
        // }

        // Getting all the subcategories values and display on table
        // public function getWomenCategory() 
        // {
        //     $getDataQuery = "
        //         SELECT *
        //         FROM subcategories
        //         WHERE categoryGender='Women'
        //         ORDER BY categoryGender 
        //     ";
        //     $result = $this->conn->query($getDataQuery);

        //     if($result->num_rows > 0){

        //         return $result;
        //     }else{

        //         return false;
        //     }
        // }

        // Getting all the values of subcategories with exact id to display there values
        public function exact($updateID)
        {
            $checkDataQuery = "
                SELECT subcategories.*, categories.categoryName
                FROM subcategories
                INNER JOIN categories
                ON subcategories.categoryID = categories.categoryID
                WHERE subcategoryID='$updateID'
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
        
        // Get only the exact ID of subcategories values when editing
        public function getExact($id)
        {
            $getDataQuery = "
                SELECT subcategories.*, categories.categoryName
                FROM subcategories
                INNER JOIN categories
                ON subcategories.categoryID = categories.categoryID
                WHERE subcategoryID='$id'
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

        // Check the name if it is exists
        public function checkDuplicate($data)
        {
            $name = $data['name'];
            $categoryID = $data['category'];

            $checkDataQuery = "
                SELECT COUNT(*)
                FROM subcategories
                WHERE subcategoryName='$name' 
                AND categoryID='$categoryID'
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

        // Add input data to subcategories table values
        public function add($inputData)
        {
                                  // checkDuplicate came from my Function checkDuplicate
            $resultCheckDuplicate = $this->checkDuplicate($inputData);

            if($resultCheckDuplicate){

                redirect('The item already exists', 'admin/add-subcategories.php');
                return false;
            }else{
                    
                // it will dislpay all the data of my inputData which is in array subcategoryData
                $allData = "'" . implode("', '", $inputData) . "'"; 

                $addDataQuery = "
                    INSERT INTO
                    subcategories (subcategoryName,categoryID)
                    VALUES ($allData)
                ";
                $result = $this->conn->query($addDataQuery);
                
                // if the result of addQuery is true or false 
                if($result){
                    
                    // if it true this will run on my subcategories-codes which is the subcategories ADD
                    return true;
                }else{

                    // if it false this will run on my subcategories-codes which is the subcategories ADD
                    return false;
                }
            
            }

        }

        // Update the values of subcategories rows 
        public function update($data)
        {   
            $id = $data['id'];
            $name = $data['name'];
            $category = $data['category'];

            $updateDataQuery = "
                UPDATE subcategories
                SET subcategoryName='$name', 
                    categoryID='$category'
                WHERE subcategoryID='$id'
                LIMIT 1
            ";
            $result = $this->conn->query($updateDataQuery);

            if($result){
                return true;
            }else{
                return false;
            }
        }

        // Delete the value of subcategories row with exact ID
        public function delete($deleteID)
        {
            $deleteDataQuery = "
                DELETE
                FROM subcategories
                WHERE subcategoryID='$deleteID'
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