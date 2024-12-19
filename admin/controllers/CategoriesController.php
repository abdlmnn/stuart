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
                'gender'=> $row['categoryGender']
            ];
        }

        // Getting all the categories values and display on table
        public function get() 
        {
            $getDataQuery = "
                SELECT *
                FROM categories
                ORDER BY categoryGender 
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

        // Getting all the categories values and display on table
        public function getMenCategory() 
        {
            $getDataQuery = "
                SELECT *
                FROM categories
                WHERE categoryGender='Men'
                ORDER BY categoryGender 
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

        // Getting all the categories values and display on table
        public function getWomenCategory() 
        {
            $getDataQuery = "
                SELECT *
                FROM categories
                WHERE categoryGender='Women'
                ORDER BY categoryGender 
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

        // To check gender must be required
        public function checkGender($inputData)
        {
            $gender = $inputData['gender'];

            if($gender == 'Select Gender')
            {
                redirect('Gender is required','admin/add-categories.php');
                return false;
            }

        }

        // Add input data to categories table values
        public function add($inputData)
        {
            // this checkGender came from my function checkGender
            $this->checkGender($inputData);

            // it will dislpay all the data of my inputData which is in array categoryData
            $allData = "'" . implode("', '", $inputData) . "'"; 

            $addDataQuery = "
                INSERT INTO
                categories (categoryName,categoryGender)
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

        // Update the values of categories rows 
        public function update($data)
        {   
            $id = $data['id'];
            $name = $data['name'];
            $gender = $data['gender'];

            $updateDataQuery = "
                UPDATE categories
                SET categoryName='$name', 
                    categoryGender='$gender'
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