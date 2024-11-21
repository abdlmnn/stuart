<?php
    include_once '../controllers/LoginController.php';

    $login = new LoginController;

    if(isset($_POST['logout-button']))
    {
        $checkLoggedOut = $login->userLogout();

        if($checkLoggedOut){
            redirect('You have logout successfully','login.php');
        }
    }
?>
