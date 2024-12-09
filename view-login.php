<?php
    $title = 'Login';
    
    include 'config/connect.php';

    include 'codes/authentication-code.php';

    $login->userLoggedIn();

    include 'includes/header.php';
    include 'includes/navbar.php';
    
    include 'message.php';
?>
<section class="bg-image">
    <div class="body">

        <div class="box">

            <div class="box-title">
                <span class="title">Login</span>
            </div>

            <form action="" method="post">

                <div class="row">
                    <i class="fas fa-envelope"></i>
                    <input type="email" placeholder="Email" class="input" name="inputEmail" required autofocus>
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password"  class="input" name="inputPassword" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
                    <div class="eye-container" onclick="showPassword1()">
                        <i class="fa-solid fa-eye eye1" id="eyeOpen"></i>
                        <i class="fa-solid fa-eye-slash eye2" id="eyeClose"></i>
                    </div>
                    <!-- <div class="eye-container" >
                        <input type="checkbox" onclick="showPassword()" class="eye">
                    </div> -->
                </div>
                <div class="row">
                    <a href="<?= base_url('view-forgot-password.php') ?>" class="recover-pass">Forgot Password?</a>
                </div>
                <div class="row button">
                    <button type="submit" name="login-button" class="input button">Login</button>
                </div>

            </form>

        </div>

        <div id="message">
            <div class="message-container">
                <h4>Password must contain the following:</h4>
                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                <p id="number" class="invalid">A <b>number</b></p>
                <p id="length" class="invalid">Minimum <b>8 characters</b></p>
            </div>
        </div>
            
    </div>
</section>
<?php
    include 'includes/footer.php';
?>