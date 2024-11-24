<?php
    include_once '../controllers/LoginController.php';

    $login = new LoginController;

    // LOGOUT
    if(isset($_POST['logout-button']))
    {
        // userLogout came from my Class LoginController
        $login->userLogout();

        // userLogout is true, it direct to login page
        redirect('You have logout successfully','login.php');
    }
    // LOGOUT
?>
