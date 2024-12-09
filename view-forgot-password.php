<?php
    $title = 'Forgot Password';
    
    include 'config/connect.php';

    include 'codes/authentication-code.php';

    $login->UserLoggedIn();

    include 'includes/header.php';
    include 'includes/navbar.php';
    
    include 'message.php';
?>
<div class="body">

    <div class="box">

        <div class="box-title">
            <span class="title">Forgot Password</span>
        </div>

        <form action="" method="post">

            <div class="row">
                <i class="fas fa-envelope"></i>
                <input type="email" placeholder="Email" class="input" name="inputEmail" required autofocus>
            </div>

            <div class="row">
                <a href="<?= base_url('view-login.php') ?>" class="recover-pass">Back to login?</a>
            </div>

            <div class="row button">
                <button type="submit" name="send-button" class="input button">Send</button>
            </div>

        </form>

    </div>
        
</div>
<?php
    include 'includes/footer.php';
?>