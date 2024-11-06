<?php
    include 'connection.php';
    
    // Execute the result queryName in a short way using function
    function execute($query) {
        
        global $mysql;

        $result = $mysql->query($query);
        
        if (!$result) {
            die("Error: ". mysqli_error($mysql));
        };

        return $result;
    }
?>