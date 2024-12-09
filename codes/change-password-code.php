<?php
    include_once 'controllers/ChangePasswordController.php';

    $changePassword = new ChangePasswordController;
    
    // EDIT CHANGE PASSWORD USER
    if(isset($_POST['change-password-button']))
    {
        $userData = [
            'id' => $_POST['change-password-button'],
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

                        redirect('Your Current password has been successfully changed','view-profile.php');
                    }else{
                        
                        redirect('Something went wrong','view-profile.php?action=change-password');
                    }

                }else{

                    redirect('Something went wrong','view-profile.php?action=change-password');
                }

            }else{

                redirect('Your New password and Retype password does not match','view-profile.php?action=change-password');
            }
            
        }else{

            redirect('Your Current password is invalid','view-profile.php?action=change-password');
        }
    }
    // EDIT CHANGE PASSWORD USER
?>