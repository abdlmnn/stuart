<?php
    $title = 'Login';
    
    include 'config/connect.php';

    include 'codes/authentication-code.php';

    $login->UserLoggedIn();

    include 'includes/header.php';
    include 'includes/navbar1.php';
    
    include 'message.php';
?>
<div class="body">

    <div class="box">

        <div class="box-title">
            <span class="title">Reset Password</span>
        </div>

        <form action="" method="post">

            <div class="row">
                <i class="fas fa-envelope"></i>
                <input type="email" placeholder="Email" class="input" name="inputEmail" required autofocus>
            </div>

            <div class="row">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="New Password" class="input" name="inputNewPassword" required>
            </div>
            <div class="row">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Confirm Password" class="input" name="inputConfirmPassword" required>
            </div>

            <div class="row">
                <a href="<?= base_url('view-login.php') ?>" class="recover-pass">Back to login?</a>
            </div>

            <div class="row button">
                <button type="submit" name="reset-password-button" class="input">Reset</button>
            </div>

        </form>

    </div>
        
</div>
<?php
    include 'includes/footer.php';
?>