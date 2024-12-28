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

            // if the session cart is empty no items, after the filled up info it direct to view customer
            if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])){

                redirect('Your profile information is complete','view-customer.php');
            }else{

                // if the session cart is not empty and it has items, and the info is filled up already after login, it direct to add payment
                redirect('Your information has been successfully completed','add-payment.php');
            }

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
            
            redirect('Your Account Deleted Successfully','add-register.php');
        }else{

            redirect('Something went wrong','view-profile.php');
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

            redirect('Your Profile Updated Successfully','view-profile.php');
        }else{

            redirect('Something went wrong','view-profile.php');
        }
    }
    // EDIT USER PROFILE
?>