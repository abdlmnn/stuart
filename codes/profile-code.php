<?php
    include '../config/connect.php';

    include_once '../controllers/ProfileController.php';

    $profile = new ProfileController;

    if(isset($_POST['edit-button']))
    {
        $userData = [
            'fullname'=> $_POST['inputFullname'],
            'number'=> $_POST['inputNumber'],
            'address'=> $_POST['inputAddress'],
            'gender'=> $_POST['inputGender'],
            'email'=> $_POST['inputEmail']
        ];

        $resultEdit = $profile->edit($userData);

        if($resultEdit){

            redirect('Your Profile Updated Successfully','view-profile.php');
        }else{

            redirect('Something went wrong','edit-profile.php');
        }
    }
?>