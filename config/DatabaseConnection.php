<?php
    class DatabaseConnection
    {
        public function __construct()
        {
            $conn = new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE);

            if($conn->connect_error)
            {
                die ("Connection Failed: " . $conn->connect_error);
            }

            // echo 'Connection Database is successful';

            // this variable conn is assign as the db of my conn
            return $this->conn = $conn;
        }
    }
?>