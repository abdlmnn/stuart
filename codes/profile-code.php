<?php
    include_once 'controllers/ProfileController.php';
    
    $profile = new ProfileController;

    // ADD or UPDATE USER PROFILE NULL ROWS
    if(isset($_POST['add-button']))
    {
        $userData = [
            'fullname' => $_POST['inputFullname'],
            'number' => $_POST['inputNumber'],
            'address' => $_POST['inputAddress'],
            'gender' => $_POST['inputGender']
        ];

                          // updateInfo came from my Class ProfileController
        $resultUpdateinfo = $profile->updateInfo($userData);

        if($resultUpdateinfo){

            direct('view-customer.php');
        }else{

            redirect('Something went wrong','add-info.php');
        }
    }
    // ADD or UPDATE USER PROFILE NULL ROWS
    // DELETE USER PROFILE
    if(isset($_POST['delete-button']))
    {
        $id = $_POST['delete-button'];

                      // delete came from my Class ProfileController 
        $resultDelete = $profile->delete($id);

        if($resultDelete){

            // userLogout came from my Class LoginController
            $login->userLogout();
            
            // redirect('Your Profile Deleted Successfully','add-register.php');
            direct('add-register.php');
        }else{

            redirect('Something went wrong','view-profile.php?action=delete-profile');
        }
    }
    // DELETE USER PROFILE
    // EDIT USER PROFILE
    if(isset($_POST['edit-button']))
    {
        $userData = [
            'id' => $_POST['edit-button'],
            'fullname' => $_POST['inputFullname'],
            'number' => $_POST['inputNumber'],
            'address' => $_POST['inputAddress'],
            'gender' => $_POST['inputGender'],
            'email' => $_POST['inputEmail']
        ];  
        
                    // update came from my Class ProfileController 
        $resultEdit = $profile->update($userData);

        if($resultEdit){

            // redirect('Your Profile Updated Successfully','view-profile.php');
            direct('view-profile.php');
        }else{

            redirect('Something went wrong','view-profile.php?action=edit');
        }
    }
    // EDIT USER PROFILE
?>