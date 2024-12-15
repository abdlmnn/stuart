<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    include_once 'controllers/RegisterController.php';
    include_once 'controllers/LoginController.php';
    include_once 'controllers/ResetPasswordController.php';
    include_once 'controllers/ForgotPasswordController.php';

    $register = new RegisterController;
    $login = new LoginController;
    $resetPassword =  new ResetPasswordController;
    $forgotPassword =  new ForgotPasswordController;

    // RESET PASSWORD USER
    if(isset($_POST['reset-button']))
    {
        $data = [
            'code'=> $_POST['inputCode'],
            'newPassword'=> $_POST['inputNewPassword']
        ];
        $confirmPassword = $_POST['inputConfirmPassword'];
        
        $code = $data['code'];

                               // confirmPassword came from my Class RegisterController
        $resultConfirmPassword = $register->confirmPassword($data,$confirmPassword);
        
        if($resultConfirmPassword){

                                 // newPassword came from my Class ResetPasswordController
            $resultResetPassword = $resetPassword->newPassword($data);

            // if the result reset password return true
            if($resultResetPassword){

                // setNull came from my Class ForgotPasswordController
                $forgotPassword->setNull($data);
                // this will set or update my userCode into null after a success reset password 
        
                redirect('You have reset your password successfully','view-login.php');
            }else{

                redirect('Something went wrong',"edit-reset-password.php?code=$code");
            }

        }else{

            redirect('Your New and Confirm password does not match',"edit-reset-password.php?code=$code");
        }

    }
    // RESET PASSWORD USER
    // SENDING EMAIL USER
    if(isset($_POST['send-button']))
    {
        $data = [
            'email'=> $_POST['inputEmail'],
            'code'=> mt_rand(100000, 999999)
        ];

                     // userExists came from my Class RegisterController
        $emailExists = $register->userExists($data);

        // it will check if the email already exists which is true
        if($emailExists){
                              // updateCode came from my Class ForgotPasswordController   
            $resultUpdateCode = $forgotPassword->updateCode($data);

            // if the code has been sent to the user it proceed to send a link for the exact user email
            if($resultUpdateCode){

                $mail = new PHPMailer(true);

                // Send email to the exact userEmail with a link for reset password
                try{

                    $_SESSION['reset_code'] = $data['code'];

                    $userEmail = $data['email'];
                    $code = $data['code'];

                    //Server settings
                    $mail->SMTPDebug = 0;                           // Enable verbose debug output, 1 for produciton , 2,3 for debuging in devlopment 
                    $mail->isSMTP();                                // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com';                 // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                         // Enable SMTP authentication
                    $mail->Username = 'legendsalih24@gmail.com';    // SMTP username
                    $mail->Password = 'vuuf yosu qkzr xsih';        // SMTP password
                    // $mail->SMTPSecure = 'tls';                   // Enable TLS encryption, `ssl` also accepted
                    $mail->SMTPSecure = 'ssl';                      // Enable TLS encryption, `ssl` also accepted
                    // $mail->Port = 587;   // for tls              // TCP port to connect to
                    $mail->Port = 465;

                    //Recipients
                    $mail->setFrom(
                            'legendsalih24@gmail.com', 
                            'Stuart Boutique'
                        );                                          // from who? 
                    $mail->addAddress($userEmail);         // Add a recipient

                    //Content
                    $mail->isHTML(true);                    // Set email format to HTML
                    $mail->Subject = 'Password reset link';
                    $mail->Body    = "
                                        <h2 style=' color: #111; 
                                                    text-align: center;
                                                  '
                                        >
                                                    Requested Password Reset
                                        </h2>

                                        <p style='  color: #111; 
                                                    text-align: center;
                                                    font-size: 15px;
                                                 '
                                        > 
                                                    Click the password reset button 
                                        </p>

                                        <div style='text-align: center;'>
                                        <a href='http://localhost/stuart/edit-reset-password.php?code=$code'> 
                                            <button 
                                                style=' background-color: #111; 
                                                        border: none; color: #fff; 
                                                        border-radius: 5px;
                                                        font-size: 15px; 
                                                        padding: 10px; 
                                                        cursor: pointer;
                                                      '
                                            > 
                                                    Password Reset
                                            </button> 
                                        </a> 
                                        </div>
                                     ";

                    // to solve a problem 
                    $mail->SMTPOptions = array(
                        'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                        )
                    );

                    $mail->send();

                    redirect('We have already sent you an e-mail','view-forgot-password.php');

                    // unset($code);

                }catch (Exception $e){

                    // Catch PHPMailer exceptions and display error
                    redirect('Email could not be sent. Error:'. $mail->ErrorInfo,'view-forgot-password.php');
                }

            }else{

                redirect('Something went wrong','view-forgot-password.php');
            }
  
        }else{

            // if the email does not exist, it will direct to reset-password page
            redirect('Your Email does not exist, Please Try again or Register the email','add-register.php');
        }
    }
    // SENDING EMAIL USER
    // LOGOUT USER
    if(isset($_POST['logout-button']))
    {
                      // userLogout came from my Class LoginController
        $resultLogout = $login->userLogout();

        if($resultLogout){

            unset($_SESSION['order']);
            
            // userLogout is true, it direct to login page
            redirect('You have logout successfully','view-login.php');
        }else{

            redirect('Something went wrong','view-customer.php');
        }
    }
    // LOGOUT USER
    // LOGIN USER
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

                redirect('You have logged in successfully','admin/view-dashboard.php');
            }elseif($_SESSION['user']['type'] == '0'){

                // This is for empty user Row 
                if(empty($_SESSION['user']['fullname']) || empty($_SESSION['user']['number']) || empty($_SESSION['user']['address']) || empty($_SESSION['user']['gender'])){

                    redirect('Proceed to fill up your information','add-info.php');
                }elseif(!empty($_SESSION['user']['fullname']) && !empty($_SESSION['user']['number']) && !empty($_SESSION['user']['address']) && !empty($_SESSION['user']['gender'])){

                    redirect('You have logged in successfully','view-customer.php');
                }
                
            };

        }else{

            // if the checkLogin is false or not register 
            redirect('Your Email and Password are invalid, Please Register','add-register.php');
        }
    }
    // LOGIN USER
    // ADD REGISTER USER
    if(isset($_POST['register-button']))
    {
        $registerData = [
            'email'=> $_POST['inputEmail'],
            'password'=> $_POST['inputPassword'],
        ];
        $confirmPassword = $_POST['inputConfirmPassword'];

                        // confirmPassword came from my Class RegisterController
        $resultPassword = $register->confirmPassword($registerData, $confirmPassword);

        // if the resultPassword is true
        if($resultPassword){

                        // userExists came from my Class RegisterController
            $resultUserExists = $register->userExists($registerData);
            
            // if the resultUserExists is true because the user exists
            if($resultUserExists){

                // it will direct to register page
                redirect('This email already exists','add-register.php');
            }else{

                            // registration came from my Class RegisterController
                $usersTable = $register->registration($registerData);

                // if the userTable is successfully inserted all the input values through user Table which is true
                if($usersTable){

                    // it will direct to process to login
                    redirect('You have successfully registered','view-login.php');
                }else{

                    redirect('Something went wrong','add-register.php');
                }

            }

        }else{

            // if the resultPassword is false because it does not match, it direct to register page
            redirect('Your Password and Confirm Password does not match',"add-register.php");
        }
    }
    // ADD REGISTER USER
?>