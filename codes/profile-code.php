<?php
    include_once 'controllers/ProfileController.php';

    $profile = new ProfileController;
    
    // EDIT USER PROFILE
    if(isset($_POST['edit-button']))
    {
        $userData = [
            'id' => $_POST['inputID'],
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