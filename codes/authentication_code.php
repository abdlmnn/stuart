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
        $email = $_POST['inputEmail'];
        $newPassword = $_POST['inputNewPassword'];
        $confirmPassword = $_POST['inputConfirmPassword'];

                        // confirmPassword came from my Class RegisterController 
        $resultPassword = $register->confirmPassword($newPassword,$confirmPassword);

        // if the resultPassword is true
        if($resultPassword){

                         // UserExists came from my Class RegisterController
            $emailExists = $register->UserExists($email);

            // it will check if the email already exists which is true
            if($emailExists){

                               // newPassword came from my Class ResetPasswordController 
                $successChange = $resetPassword->newPassword($email,$newPassword);

                // if the changeSuccess is true
                if($successChange){

                    // Direct to login page
                    redirect('Your Password has been successfully changed','login.php');
                }else{

                    // Just incase something went wrong, it will direct to reset-password page
                    redirect('Something went wrong','reset-password.php');
                }

            }else{

                // if the email does not exist, it will direct to reset-password page
                redirect('Your Email does not exist, Please try again and register the email','reset-password.php');
            }

        }else{

            // if the resultPassword is false because it does not match, it direct to reset-password page
            redirect('Your New Password and Confirm Password does not match',"reset-password.php");
        }
    }
    // RESET PASSWORD
    // LOGOUT
    if(isset($_POST['logout-button']))
    {
        // userLogout came from my Class LoginController
        $login->userLogout();

        // userLogout is true, it direct to login page
        redirect('You have logout successfully','login.php');
    }
    // LOGOUT
    // LOGIN
    if(isset($_POST['login-button']))
    {
        $email = $_POST['inputEmail'];
        $password = $_POST['inputPassword'];

                    // userLogin came from my Class LoginController 
        $checkLogin = $login->userLogin($email,$password);

        // it check if my checkLogin is true or the email and password exists on my table
        if($checkLogin){
            //  This statement for userType it compared 0 or 1 

            // This is for admin redirect to admin page
            if($_SESSION['user']['type'] == '1'){
                redirect('You have login successfully','admin/dashboard.php');
                return true;
            };

            // This is for customer redirect to customer page
            if($_SESSION['user']['type'] == '0'){
                redirect('You have login successfully','customer.php');
                return true;
            };

        }else{

            // if the checkLogin is false or not register 
            redirect('Your Email and Password are invalid, Please Register','register.php');
            return false;
        }
    }
    // LOGIN
    // REGISTER
    if(isset($_POST['register-button']))
    {
        $fullname = $_POST['inputFullname'];
        $number = $_POST['inputNumber'];
        $address = $_POST['inputAddress'];
        $gender = $_POST['inputGender'];
        $email = $_POST['inputEmail'];
        $password = $_POST['inputPassword'];
        $confirmPassword = $_POST['inputConfirmPassword'];

                        // confirmPassword came from my Class RegisterController
        $resultPassword = $register->confirmPassword($password,$confirmPassword);

        // if the resultPassword is true
        if($resultPassword){

                        // UserExists came from my Class RegisterController
            $resultUser = $register->UserExists($email);
            
            // if the resultUser is true because the user exists
            if($resultUser){

                // it will direct to register page
                redirect('This user already exists','register.php');
            }else{

                            // registration came from my Class RegisterController
                $usersTable = $register->registration($fullname,$number,$address,$gender,$email,$password);

                // if the userTable is successfully inserted all the input values through user Table which is true
                if($usersTable){

                    // it will direct to process to login
                    redirect('You have successfully registered','login.php');
                }else{

                    // just incase something went wrong, it will direct to register page
                    redirect('Something went wrong','register.php');
                }

            }

        }else{

            // if the resultPassword is false because it does not match, it direct to register page
            redirect('Your Password and Confirm Password does not match',"register.php");
        }
    }
    // REGISTER
?>