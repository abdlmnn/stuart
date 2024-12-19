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
                'name' => $row['sizeName'],
                'type' => $row['sizeType']
            ];
        }

        // Getting all the sizes values and display on table
        public function get() 
        {
            $getDataQuery = "
                SELECT *
                FROM sizes
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

        // Getting all the sizes values and display on table
        public function getName($name) 
        {
            $getDataQuery = "
                SELECT *
                FROM sizes
                WHERE sizeName='$name'
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

        // Getting all the sizes values and display on table
        public function getClothSize() 
        {
            $getDataQuery = "
                SELECT *
                FROM sizes
                WHERE sizetype='Clothing'
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

        // Getting all the sizes values and display on table
        public function getShoeSize() 
        {
            $getDataQuery = "
                SELECT *
                FROM sizes
                WHERE sizetype='Shoes'
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

        // Getting all the values of sizes with exact id to display there values
        public function exact($updateID)
        {
            $checkDataQuery = "
                SELECT *
                FROM sizes
                WHERE sizeID='$updateID'
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
                FROM sizes
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

        // To check sizes must be required
        public function checkSizes($inputData)
        {

            if($inputData == 'Select Size')
            {
                redirect('Sizes is required','admin/add-size.php');
                return false;
            }

        }

        // Add input data to size table values
        public function add($sizeName,$sizeType)
        {
            // this checkSizes came from my function checkSizes
            // $this->checkSizes($sizeName);

            $addDataQuery = "
                INSERT INTO
                sizes (sizeName,sizeType)
                VALUES ('$sizeName','$sizeType')
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

        // Update the values of sizes rows 
        public function update($data)
        {   
            $id = $data['id'];
            $name = $data['name'];
            $type = $data['type'];

            $updateDataQuery = "
                UPDATE sizes
                SET sizeName='$name',
                    sizeType='$type'
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