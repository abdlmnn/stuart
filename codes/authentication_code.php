<?php
    include_once 'controllers/RegisterController.php';
    include_once 'controllers/LoginController.php';

    $login = new LoginController;

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
            }else{
                redirect('You have login successfully','customer.php');
            }

        }else{
            redirect('Invalid Email and Password Try again','login.php');
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

        $register = new RegisterController;

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
            redirect('Password and Confirm password does not match',"register.php");
        }
    }
?>