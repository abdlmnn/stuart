<?php
    include '../../config/connect.php';
    
    include_once '../controllers/UsersController.php';

    $users = new UsersController;

    // USERS ADD
    if(isset($_POST['add-button']))
    {
        // storing input size data in a array
        $userData = [
            'email'=> $_POST['inputEmail'],
            'password'=> $_POST['inputPassword'],
            'type'=> $_POST['inputType']
        ];

                   // add came from my Class UsersController
        $resultAdd = $users->add($userData); 

        // if the result of my add function return true or false
        if($resultAdd){

            // if the result of my add function return true, it direct to the add-users page
            redirect('User Added Successfully','admin/add-users.php');
        }else{

            // if the result of my add function return false, it direct to add users if something went wrong
            redirect('Something went wrong','admin/add-users.php');
        }
    }
    // USERS ADD
?>