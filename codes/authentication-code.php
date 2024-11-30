<?php
    include_once 'controllers/RegisterController.php';
    include_once 'controllers/LoginController.php';
    include_once 'controllers/ResetPasswordController.php';

    $register = new RegisterController;
    $login = new LoginController;
    $resetPassword =  new ResetPasswordController;

    // RESET PASSWORD
    if(isset($_POST['reset-password-button']))
    {
        $registerData = [
            'email'=> $_POST['inputEmail'],
            'newPassword'=> $_POST['inputNewPassword'],
        ];
        $confirmPassword = $_POST['inputConfirmPassword'];

                        // confirmPassword came from my Class RegisterController 
        $resultPassword = $register->confirmPassword($registerData,$confirmPassword);

        // if the resultPassword is true
        if($resultPassword){

                         // UserExists came from my Class RegisterController
            $emailExists = $register->UserExists($registerData);

            // it will check if the email already exists which is true
            if($emailExists){

                               // newPassword came from my Class ResetPasswordController 
                $successChange = $resetPassword->newPassword($registerData);

                // if the changeSuccess is true
                if($successChange){

                    // it direct to login page
                    redirect('Your Password has been successfully changed','view-login.php');
                }else{

                    // just incase something went wrong, it will direct to reset-password page
                    redirect('Something went wrong','edit-reset-password.php');
                }

            }else{

                // if the email does not exist, it will direct to reset-password page
                redirect('Your Email does not exist, Please Try again or Register the Email','add-register.php');
            }

        }else{

            // if the resultPassword is false because it does not match, it will direct to reset-password page
            redirect('Your New Password and Confirm Password does not match',"edit-reset-password.php");
        }
    }
    // RESET PASSWORD
    // LOGOUT
    if(isset($_POST['logout-button']))
    {
        // userLogout came from my Class LoginController
        $login->userLogout();

        // userLogout is true, it direct to login page
        redirect('You have logout successfully','view-login.php');
    }
    // LOGOUT
    // LOGIN
    if(isset($_POST['login-button']))
    {
        $loginData = [
            'email'=> $_POST['inputEmail'],
            'password'=> $_POST['inputPassword'],
        ];

                    // userLogin came from my Class LoginController 
        $checkLogin = $login->userLogin($loginData);

        // it check if my checkLogin is true or the email and password exists on my table
        if($checkLogin){
            
            // This is for admin redirect to admin page
            if($_SESSION['user']['type'] == '1'){
                redirect('You have login successfully','admin/view-dashboard.php');
                return true;
            };

            // This is for customer redirect to customer page
            if($_SESSION['user']['type'] == '0'){
                redirect('You have login successfully','view-customer.php');
                return true;
            };

        }else{

            // if the checkLogin is false or not register 
            redirect('Your Email and Password are invalid, Please Register','add-register.php');
            return false;
        }
    }
    // LOGIN
    // REGISTER
    if(isset($_POST['register-button']))
    {
        
        $registerData = [
            'fullname' => $_POST['inputFullname'],
            'number' => $_POST['inputNumber'],
            'address' => $_POST['inputAddress'],
            'gender'=> $_POST['inputGender'],
            'email'=> $_POST['inputEmail'],
            'password'=> $_POST['inputPassword'],
            
        ];
        $confirmPassword = $_POST['inputConfirmPassword'];

                        // confirmPassword came from my Class RegisterController
        $resultPassword = $register->confirmPassword($registerData, $confirmPassword);

        // if the resultPassword is true
        if($resultPassword){

                        // UserExists came from my Class RegisterController
            $resultUser = $register->UserExists($registerData);
            
            // if the resultUser is true because the user exists
            if($resultUser){

                // it will direct to register page
                redirect('This user already exists','add-register.php');
            }else{

                            // registration came from my Class RegisterController
                $usersTable = $register->registration($registerData);

                // if the userTable is successfully inserted all the input values through user Table which is true
                if($usersTable){

                    // it will direct to process to login
                    redirect('You have successfully registered','view-login.php');
                }else{

                    // just incase something went wrong, it will direct to register page
                    redirect('Something went wrong','add-register.php');
                }

            }

        }else{

            // if the resultPassword is false because it does not match, it direct to register page
            redirect('Your Password and Confirm Password does not match',"add-register.php");
        }
    }
    // REGISTER
?>