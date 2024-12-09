<?php
    class DatabaseConnection
    {   
        public $conn;
        public function __construct()
        {
            $this->conn = new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE);

            if($this->conn->connect_error)
            {
                die ("Connection Failed: " . $this->conn->connect_error);
            }

            // echo 'Connection Database is successful';
        }
    }
?>