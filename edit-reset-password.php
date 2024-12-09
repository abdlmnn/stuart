<?php
    $title = 'Password Reset';
    
    include 'config/connect.php';

    include 'codes/authentication-code.php';

    include_once 'controllers/ForgotPasswordController.php';

    $forgotPassword = new ForgotPasswordController;

    $login->UserLoggedIn();

    include 'includes/header.php';
    // include 'includes/navbar.php';
    
    include 'message.php';
?>
<div class="body">

    <div class="box">

        <div class="box-title">
            <span class="title">Password Reset</span>
        </div>

        <?php
            // trying to access the old password reset link
            if(!isset($_SESSION['code'])){
                
                exit("<p style='color:red; text-align: center;'>
                        You can't access this page again.
                    </p>"); 
            }else{

                // i get from my url code=
                $code = $_GET['code'];

                // when the password is done or regenerate another code for link
                if ($_SESSION['code'] !== $code) {

                    exit("<p style='color:red; text-align: center;'>
                            Your code is invalid, 
                            Please request a new password reset link. 
                            <b>Thank you:)</b>.
                        </p>");
                }

                                 // checkCode came from my Class ForgotPasswordController 
                $resultCheckCode = $forgotPassword->checkCode($code);

                // when the userCode and code is not the same or empty, comparing them to check if it is valid or invalid
                if(!$resultCheckCode){

                    exit("<p style='color:red; text-align: center;'>
                            Your code is invalid, 
                            Please request a new password reset link. 
                            <b>Thank you:)</b>
                        .</p>"); 
                }
            }
        ?>

        <form action="" method="post">

            <input type="hidden" name="inputCode" value="<?= $code ?>">

            <div class="row">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="New Password" class="input" name="inputNewPassword" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                <div class="eye-container" onclick="showPassword1()">
                    <i class="fa-solid fa-eye eye1" id="eyeOpen"></i>
                    <i class="fa-solid fa-eye-slash eye2" id="eyeClose"></i>
                </div>
            </div>

            <div class="row">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Confirm Password" class="input" name="inputConfirmPassword" id="confirm" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                <div class="eye-container" onclick="showPassword2()">
                    <i class="fa-solid fa-eye eye1" id="eyeOpen1"></i>
                    <i class="fa-solid fa-eye-slash eye2" id="eyeClose2"></i>
                </div>
            </div>

            <div id="message">
                <div class="message-container-two">
                    <h4>Password must contain the following:</h4>
                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                    <p id="number" class="invalid">A <b>number</b></p>
                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                </div>
            </div>

            <div class="row button">
                <button type="submit" name="reset-button" class="input button">Reset</button>
            </div>

        </form>

    </div>
        
</div>
<?php
    // include 'includes/footer.php';
?>