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
                'name' => $row['categoryName'],
                'description' => $row['categoryDescription'],
            ];
        }

        // Getting all the categories values
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

        // Add input data to categories table values
        public function add($inputData)
        {
            // it will dislpay all the data of my inputData which is in array categoryData
            $allData = "'" . implode("', '", $inputData) . "'"; 

            $addDataQuery = "
                INSERT INTO
                categories (categoryName,categoryDescription)
                VALUES ($allData)
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

        // Getting all the values of categories with exact id
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
        
        // Update the values of categories rows 
        public function update($inputData)
        {
            $id = $inputData['id'];
            $name = $inputData['name'];
            $description = $inputData['description'];

            $updateDataQuery = "
                UPDATE categories
                SET categoryName='$name', 
                    categoryDescription='$description'
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

                // it return true to the function
                return true;
            }else{

                // it return false to the function 
                return false;
            }
        }
    }
?>