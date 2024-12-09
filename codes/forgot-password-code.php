<?php
    include_once 'controllers/ForgotPasswordController.php';

    $forgotPassword = new ForgotPasswordController;

    if(isset($_POST['send-email-button']))
    {
        $userData = [
            'email' => $_POST['inputEmail'],
            'code' => mt_rand(100000, 999999)
        ];

        $_SESSION['email'] = $userData['email'];

                          // validEmail came from my Class ForgotPasswordController 
        $resultValidEmail = $forgotPassword->validEmail($userData); 

        if($resultValidEmail){

            // header('send-email-code.php');
        
            // redirect('We e-mailed you a reset password link','success.php');
            return true;
        }else{

            redirect('Your email is invalid','edit-forgot-password.php');
        }
        
    }
?>