<?php
    include_once 'controllers/ChangePasswordController.php';

    $changePassword = new ChangePasswordController;
    
    // EDIT CHANGE PASSWORD USER
    if(isset($_POST['change-password-button']))
    {
        $userData = [
            'id' => $_POST['inputID'],
            'currentPassword' => $_POST['inputCurrent'],
            'newPassword' => $_POST['inputNew']
        ];  
        $retypePassword = $_POST['inputRetype'];

                             // checkPassword came from my Class ChangePasswordController 
        $resultCheckPassword = $changePassword->checkPassword($userData);

        // if resultCheckPassword is return true or false
        if($resultCheckPassword){

            // Proceed to retype password
                                                    // retypePassword came from my Class ChangePasswordController 
            $resultRetypePassword = $changePassword->retypePassword($userData,$retypePassword);

            if($resultRetypePassword){

                // proceed to new password
                                   // newPassword came from my Class ChangePasswordController 
                $resultNewPassword = $changePassword->newPassword($userData);

                if($resultNewPassword){

                    redirect('Your Current password has been Successfully Changed','view-profile.php');
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