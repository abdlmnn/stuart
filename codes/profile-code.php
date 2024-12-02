<?php
    include_once 'controllers/ProfileController.php';
    include_once 'controllers/LoginController.php';
    
    $profile = new ProfileController;
    $login = new LoginController;

    // DELETE USER PROFILE
    if(isset($_POST['delete-button']))
    {
        $id = $_POST['delete-button'];

                      // delete came from my Class ProfileController 
        $resultDelete = $profile->delete($id);

        if($resultDelete){

            // userLogout came from my Class LoginController
            $login->userLogout();
            
            redirect('Your Profile Deleted Successfully','add-register.php');
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

        // if the resultEdit return the resultedit on function
        if($resultEdit){

            redirect('Your Profile Updated Successfully','view-profile.php');
        }else{

            redirect('Something went wrong','view-profile.php?action=edit');
        }
    }
    // EDIT USER PROFILE
?>