<?php
    include_once 'controllers/RegisterController.php';
    include_once 'controllers/LoginController.php';
    include_once 'controllers/ResetPasswordController.php';

    $register = new RegisterController;
    $login = new LoginController;
    $resetPassword =  new ResetPasswordController;

    if(isset($_POST['reset-password-button']))
    {
        $email = $_POST['inputEmail'];
        $newPassword = $_POST['inputNewPassword'];
        $confirmPassword = $_POST['inputConfirmPassword'];
        
        $resultPassword = $register->confirmPassword($newPassword,$confirmPassword);

        if($resultPassword){
            $emailExists = $register->UserExists($email);

            if($emailExists){
                $successChange = $resetPassword->newPassword($email,$newPassword);

                if($successChange){
                    redirect('Your Password has been successfully changed','login.php');
                }else{
                    redirect('Something went wrong','reset-password.php');
                }
            }else{
                redirect('Your Email does not exist, Please try again and register the email','reset-password.php');
            }
        }else{
            redirect('Your New Password and Confirm Password does not match',"reset-password.php");
        }
        
    }

    if(isset($_POST['logout-button']))
    {
        $checkLoggedOut = $login->userLogout();

        if($checkLoggedOut){
            redirect('You have logout successfully','login.php');
        }
    }

    if(isset($_POST['login-button']))
    {
        $email = $_POST['inputEmail'];
        $password = $_POST['inputPassword'];
        
        $checkLogin = $login->userLogin($email,$password);

        if($checkLogin){

            if($_SESSION['user']['type'] == '1'){
                redirect('You have login successfully','admin/dashboard.php');
            };
            

            if($_SESSION['user']['type'] == '0'){
                redirect('You have login successfully','customer.php');
            };

        }else{
            redirect('Your Email or Password are invalid, Please try again','login.php');
        }
    }

    if(isset($_POST['register-button']))
    {
        $fullname = $_POST['inputFullname'];
        $number = $_POST['inputNumber'];
        $address = $_POST['inputAddress'];
        $gender = $_POST['inputGender'];
        $email = $_POST['inputEmail'];
        $password = $_POST['inputPassword'];
        $confirmPassword = $_POST['inputConfirmPassword'];

        $resultPassword = $register->confirmPassword($password,$confirmPassword);

        if($resultPassword){
            $resultUser = $register->UserExists($email);

            if($resultUser){
                redirect('This user already exists','register.php');
            }else{
                $usersTable = $register->registration($fullname,$number,$address,$gender,$email,$password);

                if($usersTable){
                    redirect('You have successfully registered','login.php');
                }else{
                    redirect('Something went wrong','register.php');
                }
            }
        }else{
            redirect('Your Password and Confirm Password does not match',"register.php");
        }
    }
?>