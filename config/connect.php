<?php
    session_start();

    define('HOSTNAME','localhost');
    define('USERNAME','root');
    define('PASSWORD','');
    define('DATABASE','stuart');
    define('SITE_URL','http://localhost/stuart/');
    
    include_once 'DatabaseConnection.php';
    $db = new DatabaseConnection;
    
    function base_url($slug)
    {
        echo SITE_URL.$slug;
    }
    function direct($page)
    {
        header("location: " . SITE_URL .$page);
    }
    function redirect($message,$page)
    {
        $_SESSION['message'] = $message;
        header("location: " . SITE_URL . $page);
        exit(0);
    }
    function showMessage($message)
    {
        $_SESSION['message'] = $message;
    }

?>