<?php
    $mysql = new mysqli(
        'localhost',
        'root',
        '',
        'stuart'
    );

    if ($mysql->connect_error) {
        die('Connection Failed: '. $mysql->connect_error);
    };
?>