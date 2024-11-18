<?php
    // include 'config/connect.php';

    include_once 'controllers/RegisterController.php';

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