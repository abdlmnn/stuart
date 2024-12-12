<?php
    include_once '../controllers/LoginController.php';
    include_once 'controllers/ProfileController.php';
    include_once 'controllers/ChangePasswordController.php';

    $login = new LoginController;
    $profile = new ProfileController;
    $changePassword = new ChangePasswordController;
    
    // EDIT CHANGE PASSWORD USER
    if(isset($_POST['save-change-password-button']))
    {
        $userData = [
            'id' => $_POST['save-change-password-button'],
            'currentPassword' => $_POST['inputCurrent'],
            'newPassword' => $_POST['inputNew']
        ];  
        $retypePassword = $_POST['inputRetype'];

                                    // checkCurrentPassword came from my Class ChangePasswordController 
        $resultCheckCurrentPassword = $changePassword->checkCurrentPassword($userData);

        // if resultCheckPassword is return true or false
        if($resultCheckCurrentPassword){

            // Proceed to retype password
                                  // retypePassword came from my Class ChangePasswordController 
            $resultRetypePassword = $changePassword->retypePassword($userData,$retypePassword);

            // if resultRetypePassword is return true or false
            if($resultRetypePassword){

                // Proceed to check current and new password
                                                  //  checkCurrentandNewPassword came from my Class ChangePasswordController
                $resultCheckCurrentandNewPassword = $changePassword->checkCurrentandNewPassword($userData);

                // if resultCheckCurrentandNewPassword is return true or false
                if($resultCheckCurrentandNewPassword){

                    // Proceed to new password
                    
                                      // newPassword came from my Class ChangePasswordController 
                    $resultNewPassword = $changePassword->newPassword($userData);

                    if($resultNewPassword){

                        redirect('Your Current password has been successfully changed','admin/view-profile.php');
                    }else{
                        
                        redirect('Something went wrong','admin/view-profile.php?action=change-password');
                    }

                }else{

                    redirect('Something went wrong','admin/view-profile.php?action=change-password');
                }

            }else{

                redirect('Your New password and Retype password does not match','admin/view-profile.php?action=change-password');
            }
            
        }else{

            redirect('Your Current password is invalid','admin/view-profile.php?action=change-password');
        }
    }
    // EDIT CHANGE PASSWORD USER
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

            redirect('Something went wrong','admin/view-profile.php?action=delete-profile');
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

            redirect('Your Profile Updated Successfully','admin/view-profile.php');
        }else{

            redirect('Something went wrong','admin/view-profile.php?action=edit');
        }
    }
    // EDIT USER PROFILE
?>