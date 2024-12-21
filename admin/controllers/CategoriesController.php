<?php
    class CategoriesController
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
                'id' => $row['categoryID'],
                'name' => $row['categoryName']
            ];
        }

        // Getting all the categories values and display on table
        public function get() 
        {
            $getDataQuery = "
                SELECT *
                FROM categories
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

        // Getting all the values of categories with exact id to display there values
        public function exact($updateID)
        {
            $checkDataQuery = "
                SELECT *
                FROM categories
                WHERE categoryID='$updateID'
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
                SELECT *
                FROM categories
                WHERE categoryID='$id'
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
        public function checkDuplicate($name)
        {
            $checkDataQuery = "
                SELECT COUNT(*)
                FROM categories
                WHERE categoryName='$name'
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

        // Add input data to categories table values
        public function add($inputData)
        {   
                                  // checkDuplicate came from my Function checkDuplicate
            $resultCheckDuplicate = $this->checkDuplicate($inputData);

            if($resultCheckDuplicate){

                redirect('The item already exists','admin/add-categories.php');
                return false;
            }else{

                $addDataQuery = "
                    INSERT INTO
                    categories (categoryName)
                    VALUES ('$inputData')
                ";
                $result = $this->conn->query($addDataQuery);
                
                // if the result of addQuery is true or false 
                if($result){
                    
                    // if it true this will run on my categories-codes which is the CATEGORIES ADD
                    return true;
                }else{

                    // if it false this will run on my categories-codes which is the CATEGORIES ADD
                    return false;
                }

            }

        }

        // Update the values of categories rows 
        public function update($data)
        {   
            $id = $data['id'];
            $name = $data['name'];

            $updateDataQuery = "
                UPDATE categories
                SET categoryName='$name'
                WHERE categoryID='$id'
                LIMIT 1
            ";
            $result = $this->conn->query($updateDataQuery);

            if($result){
                return true;
            }else{
                return false;
            }
        }

        // Delete the value of categories row with exact ID
        public function delete($deleteID)
        {
            $deleteDataQuery = "
                DELETE
                FROM categories
                WHERE categoryID='$deleteID'
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