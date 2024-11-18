<?php
    class DatabaseConnection
    {
        public function __construct()
        {
            $conn = new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE);

            if($conn->connect_error)
            {
                die ("Connection Failed: ");
            }

            // echo 'Connection Database is successful';

            return $this->conn = $conn;
        }
    }
?>