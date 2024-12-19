<?php
    $title = 'Register';
    
    include 'config/connect.php';

    include 'codes/authentication-code.php';

    $login->UserLoggedIn();

    include 'includes/header.php';
    include 'includes/navbar.php';

    include 'message.php';
?>
<section class="bg-image">
    <div class="body">

        <div class="box">

            <div class="box-title">
                <span class="title">Register</span>
            </div>

            <form action="" method="post">  

                <div class="row">
                    <i class="fas fa-envelope"></i>
                    <input type="email" placeholder="Email" class="input" name="inputEmail" required>
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="psw" placeholder="Password" class="input" name="inputPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
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
                
                <div class="row button">
                    <button type="submit" name="register-button" class="input button">Register</button>
                </div>

            </form>

        </div>

        <div id="message">
            <div class="message-container register">
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